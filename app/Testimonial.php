<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {

	protected $table = 'testimonials';

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'author_image');
    }

}
