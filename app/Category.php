<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang;
use App;

class Category extends Model {

	protected $table = 'categories';

    public function items()
    {
        return $this->hasMany('App\Items', 'category_id', 'id')->where('status',1);
    }

	public function media()
	{
		return $this->belongsToMany('App\Media', 'categories_media', 'category_id', 'media_id');
	}

    public function main_image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

	public function gallery()
	{
		return $this->belongsToMany('App\Media', 'categories_media', 'category_id', 'media_id')->where('type','img');
	}

	public function staff()
	{
		return $this->belongsToMany('App\User', 'categories_user', 'category_id', 'user_id');
	}

	public function testimonials()
	{
		return $this->belongsToMany('App\Testimonial', 'categories_testimonial', 'category_id', 'testimonial_id');
	}

	public static function latestTopic($topic_id,$limit,$skip=0)
	{

		$children = array();
		$childrenTopics = Category::categoryChildren($topic_id,$children);

		if($childrenTopics) {
			array_push($childrenTopics,$topic_id);
		} else {
			$childrenTopics = array($topic_id);
		}

		return App\Items::whereIn('category_id',$childrenTopics)->orderBy('id','DESC')->where('status',1)->paginate($limit);

	}

	public static function categoryChildren($parent_id,&$children)
	{

		$results = Category::where('status', 1)->where('parent_id', $parent_id)->where('language', Lang::getLocale())->orderBy('order','ASC')->get();
		foreach($results as $result) {
			$children[] = $result->id;
			$subs = Category::where('parent_id',$result->id)->get();
			if(count($subs) > 0) {
				$new = Category::categoryChildren($result->id,$children);
			}
		}

		if (isset($children)) {
			return $children;
		};

	}

}
