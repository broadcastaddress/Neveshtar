<?php namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {

	protected $fillable = array('site_title','site_slogan','site_description','site_keywords','site_author','site_url','site_image','main_telephone','main_email','main_address','main_fax','short_about_us','social_facebook','social_google_plus','social_dribble','social_linkedin','social_twitter','social_skype','social_github','social_youtube','social_dropbox','privacy_policy','terms_of_service','map_latitude','map_longitude');

    protected $table = 'settings';

}