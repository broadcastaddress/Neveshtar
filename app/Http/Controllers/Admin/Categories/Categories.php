<?php namespace App\Http\Controllers\Admin\Categories;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $fillable = array('title', 'subtitle', 'intro', 'quote', 'quote_author', 'description', 'image_id', 'video_id', 'parent_id', 'slug', 'language', 'order', 'status', 'access_level', 'user_id');

    protected $table = 'categories';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users');
    }

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

	public function gallery()
	{
		return $this->belongsToMany('App\Media', 'categories_media', 'category_id', 'media_id');
	}

}