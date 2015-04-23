<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model {

	protected $table = 'items';

	public function tags()
	{
		return $this->belongsToMany('App\Tags', 'item_tag', 'item_id', 'tag_id');
	}

	public function media()
	{
		return $this->belongsToMany('App\Media', 'item_media', 'item_id', 'media_id');
	}

    public function main_image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

    public function category()
    {
	    return $this->belongsTo('App\Category');
    }

	public function gallery()
	{
		return $this->belongsToMany('App\Media', 'item_media', 'item_id', 'media_id')->where('type','img');
	}

    public function comments()
    {
        return $this->hasMany('App\Comments', 'item_id', 'id')->where('status',1)->where('parent_id',null);
    }

    public function comments_count()
    {
        return $this->hasMany('App\Comments', 'item_id', 'id')->where('status',1)->select(array('id'));
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
