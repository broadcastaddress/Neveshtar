<?php namespace App\Http\Controllers\Admin\Images;

use Illuminate\Database\Eloquent\Model;

class Images extends Model {

	protected $fillable = array('title');

    protected $table = 'media';

}