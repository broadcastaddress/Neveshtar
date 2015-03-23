<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model {

	protected $table = 'items';

	public function tags()
	{
		return $this->belongsToMany('App\Tags', 'item_tag', 'item_id', 'tag_id');
	}

    public function comments()
    {
        return $this->hasMany('App\Comments', 'item_id', 'id')->where('status',1)->where('parent_id',null);
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

}
