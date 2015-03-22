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
	Route::get('/', [
	    'as' => 'WelcomeController', 'uses' => 'WelcomeController@index'
	]);
    Route::resource('c', 'CategoryController');
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

	    // Categories
	    Route::resource('categories', 'Admin\Categories\CategoriesController');
	    Route::post('categories/ajax_table', 'Admin\Categories\CategoriesController@ajax_table');
	    Route::post('categories/actions', 'Admin\Categories\CategoriesController@actions');

	    // Items
	    Route::get('items/tags', 'Admin\Items\ItemsController@tags');
	    Route::get('items/categories', 'Admin\Items\ItemsController@categories');
	    Route::resource('items', 'Admin\Items\ItemsController');
	    Route::post('items/ajax_table', 'Admin\Items\ItemsController@ajax_table');
	    Route::post('items/actions', 'Admin\Items\ItemsController@actions');
	});

});