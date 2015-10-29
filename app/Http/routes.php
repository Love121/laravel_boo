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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
	return 'hello World!';
});
Route::get('/hello/{name}', 'Hello@show');*/

Route::get('/', function(){
    return 'hello WOlrd!';
});

Route::get('/products', 'Front@products');

Route::get('/products/details/{id}', 'Front@products_details');

Route::get('/product/categories', 'Front@product_categories');

Route::get('/products/brands', 'Front@product_brands');

Route::get('/blog', 'Front@blog');

Route::get('blog/post/{id}', 'Front@blog_post');

Route::get('/contact-us', 'Front@contact_us');

Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::post('/cart','Front@cart');
Route::get('/checkout','Front@checkout');
Route::get('/search/{query}','Front@search');

Route::get('blade', function(){
	$drinks = array('vodka', 'whisky', 'red-wine');
	return view('page', array('name' => 'The Raven', 'day' => 'Friday', 'drinks' => $drinks));
});

Route::get('/insert', function() {
    App\Category::create(array('name' => 'oky'));
    return 'category added';
});

Route::get('/read', function() {
    $category = new App\Category();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '<br/>';
    }
});

Route::get('/update', function() {
    $category = App\Category::find(1);
    $category->name = 'metals';
    $category->save();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '
';
    }
});

Route::get('/delete', function() {
    $category = App\Category::find(10);
    $category->delete();
    
    $data = $category->all(array('name','id'));

    foreach ($data as $list) {
        echo $list->id . ' ' . $list->name . '
';
    }
});