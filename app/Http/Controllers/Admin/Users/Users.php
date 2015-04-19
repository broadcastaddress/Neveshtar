<?php namespace App\Http\Controllers\Admin\Users;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

	protected $fillable = array('name', 'title', 'intro', 'facebook', 'twitter', 'google_plus', 'linkedin', 'email', 'profile_image', 'password', 'status');

    protected $table = 'users';

    public function image()
    {
        return $this->hasOne('App\Media', 'id', 'profile_image');
    }

}