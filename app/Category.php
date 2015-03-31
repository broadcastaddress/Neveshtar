<?php namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
