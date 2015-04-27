<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model {

	protected $table = 'sliders';

    public function main_image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

}
