<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(
array(
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localizationRedirect' ]
),
function()
{

    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::get('/', 'WelcomeController@index');
	Route::get('home', 'HomeController@index');
	Route::get('category', 'CategoryController@index');
	Route::get('categoryItem', 'CategoryItemController@index');
	Route::get('about', 'AboutController@index');
	Route::get('services', 'ServicesController@index');
	Route::get('portfolio', 'PortfolioController@index');
	Route::get('portfolioItem', 'PortfolioItemController@index');
	Route::get('prices', 'pricesController@index');
	Route::get('faq', 'FaqController@index');
	Route::get('gallery', 'GalleryController@index');
	Route::get('search', 'SearchController@index');
	Route::get('careers', 'CareersController@index');
	Route::get('sitemap', 'SitemapController@index');
	Route::get('contact', 'ContactController@index');

	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);

	Route::group(array('middleware' => 'auth', 'prefix' => 'admin'), function()
	{
	    // Example route with an admin prefix
	    Route::get('/', array('uses' => 'Admin\AdminController@index'));
	    Route::resource('categories', 'Admin\CategoriesController');
	});

});