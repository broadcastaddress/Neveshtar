<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model {

    protected $table = 'tbl_currency';

    public function main_image()
    {
        return $this->hasOne('App\Media', 'id', 'image_id');
    }

    public function latest_data()
    {
        return $this->hasMany('App\CurrencyData', 'currency_id', 'id')->orderBy('id','DESC')->take(2);
    }

}
