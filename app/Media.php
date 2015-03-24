<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

    protected $fillable = ['type', 'url', 'title', 'user_id'];

	protected $table = 'media';

}
