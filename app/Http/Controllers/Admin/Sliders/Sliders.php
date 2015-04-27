<?php namespace App\Http\Controllers\Admin\Sliders;

use Illuminate\Database\Eloquent\Model;
use App;

class Sliders extends Model {

	protected $fillable = array('title', 'subtitle', 'url', 'image_id', 'language', 'status', 'access_level', 'user_id');

    protected $table = 'sliders';

    public function user()
    {
        return $this->hasOne('App\Http\Controllers\Admin\Users\Users', 'id', 'user_id');
    }

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

}