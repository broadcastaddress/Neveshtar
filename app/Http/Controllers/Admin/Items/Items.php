<?php namespace App\Http\Controllers\Admin\Items;

use Illuminate\Database\Eloquent\Model;
use App;

class Items extends Model {

	protected $fillable = array('title', 'subtitle', 'intro', 'quote', 'quote_author', 'description', 'image_id', 'video_id', 'category_id', 'slug', 'language', 'status', 'access_level', 'user_id', 'type');

    protected $table = 'items';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users', 'id', 'user_id');
    }

	public function tags()
	{
		return $this->belongsToMany('App\Tags', 'item_tag', 'item_id', 'tag_id');
	}

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

	public function gallery()
	{
		return $this->belongsToMany('App\Media', 'item_media', 'item_id', 'media_id');
	}

}