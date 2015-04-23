<?php namespace App\Http\Controllers\Admin\Testimonials;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {

	protected $fillable = array('name', 'title', 'description', 'author_image');

    protected $table = 'testimonials';

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'author_image');
    }

}