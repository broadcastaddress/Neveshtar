<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang;
use App;

class Navigation extends Model {

    protected $table = 'categories';

    public function parent() {

        return $this->hasOne('App\Navigation', 'id', 'parent_id')
        			->select('id','title','slug','parent_id','type')
					->where('status',1)
        			->orderBy('order','asc')
        			->where('language',Lang::getLocale());
    }

    public function children() {

        return $this->hasMany('App\Navigation', 'parent_id', 'id')
        			->select('id','title','slug','parent_id','type')
					->where('status',1)
        			->orderBy('order','asc')
        			->where('language',Lang::getLocale());
    }

    public static function tree() {

        return static::with(implode('.', array_fill(0, 100, 'children')))
			        ->select('id','title','slug','parent_id','type')
        			->where('parent_id', '=', NULL)
        			->where('status',1)
        			->orderBy('order','asc')
        			->where('language',Lang::getLocale())->get();
    }

}
