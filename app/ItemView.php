<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use App;
use Lang;
use DB;

class ItemView extends Model {

	protected $table = 'item_view';

    public function item() {
	    return $this->hasOne('App\Items','id','item_id');
    }

	public static function difference($days,$limit=5) {

		$date = new DateTime;
		$date->modify('-'.$days.' days');
		$formatted_date = $date->format('Y-m-d H:i:s');

		$items = App\Items::where('language', Lang::getLocale())->where('status',1)->select('id')->get();
		$items = $items->toArray();
		return static::where('created_at','>=',$formatted_date)->whereIn('item_id',$items)->select(array('item_view.item_id', DB::raw('COUNT(item_view.item_id) as count')))->groupBy('item_id')->take($limit)->orderBy('count','DESC')->get();


	}

}
