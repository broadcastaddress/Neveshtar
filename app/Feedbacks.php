<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model {

    protected $fillable = ['email', 'name', 'message', 'user_id'];

	protected $table = 'feedbacks';

}
