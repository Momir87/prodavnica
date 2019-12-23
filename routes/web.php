<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//pages routes

Route::get('/about', 'PagesController@getAbout')->name('about');
Route::get('/contact', 'PagesController@getContact')->name('contact');
Route::get('/', 'PagesController@getIndex')->name('home');
Route::get('/home', 'PagesController@getIndex')->name('home');

//categories routes
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{id}', 'CategoriesController@show')->name('categories.products');

//products routes
Route::get('/products/{id}', 'ProductsController@show')->name('products.show');

//blog routes
Route::get('/blog', 'BlogsController@index')->name('blog');
Route::get('/blog/{id}', 'BlogsController@show');

//messages routes
Route::post('/contact', 'MessagesController@store');
Route::post('/subscribe', 'MessagesController@subscribe')->name('subscribe');

Auth::routes();
//ulogovani korisnik
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::post('/update', 'HomeController@update')->name('profile.update');
Route::get('/order', 'HomeController@order')->name('order');
Route::get('/dashboard/order-show', 'HomeController@orderShow')->name('order.show');
Route::get('/dashboard/profile', 'HomeController@editProfile')->name('profile.edit');
Route::get('/dashboard/bills', 'HomeController@orderStatus')->name('order.bill');

//admin route
//users
Route::get('/dashboard/users', 'AdminController@index')->name('admin.users');
Route::get('/users/{id}', 'AdminController@userEdit')->name('admin.editUser');
Route::post('/update-user', 'AdminController@updateUser')->name('admin.updateUser');
Route::get('/user-delete/{id}', 'AdminController@deleteUser')->name('admin.deleteUser');
//products
Route::get('/products-all', 'ProductsController@productsAll')->name('admin.products');
Route::get('/products-edit/{id}', 'ProductsController@edit')->name('admin.editProduct');
Route::get('/products-delete/{id}', 'ProductsController@destroy')->name('admin.deleteProduct');
Route::get('/create-product', 'ProductsController@create')->name('admin.createProduct');
Route::post('/products-update', 'ProductsController@update')->name('admin.updateProduct');
Route::post('/add-product', 'ProductsController@store')->name('admin.saveProduct');
//categories
Route::get('/categories-all', 'CategoriesController@categoriesAll')->name('admin.categories');
Route::get('/create-category', 'CategoriesController@create')->name('admin.createCategory');
Route::get('/category-edit/{id}', 'CategoriesController@edit')->name('admin.editCategory');
Route::get('/category-delete/{id}', 'CategoriesController@destroy')->name('admin.deleteCategory');
Route::post('/category-update', 'CategoriesController@update')->name('admin.updateCategory');
Route::post('/add-category', 'CategoriesController@store')->name('admin.saveCategory');
//bills
Route::get('/orders-all', 'AdminController@orders')->name('admin.orders');
Route::get('/order-accept/{id}', 'AdminController@acceptOrder')->name('admin.acceptOrder');
Route::get('/order-delete/{id}', 'AdminController@deleteOrder')->name('admin.deleteOrder');
//messages
Route::get('/message-show', 'MessagesController@showMessages')->name('admin.showMessages');
Route::get('/message-delete/{id}', 'MessagesController@destroy')->name('admin.deleteMessage');
//subscription
Route::get('/subscribe-show', 'MessagesController@showSubscribe')->name('admin.showSubscribe');
Route::get('/subscribe-delete/{id}', 'MessagesController@deleteSubscribe')->name('admin.deleteSubscribe');
//cart routes
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');
Route::get('/cart-remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/cart-update-inc/{id}', 'CartController@updateInc')->name('cart.updateInc');
Route::get('/cart-update-dec/{id}', 'CartController@updateDec')->name('cart.updateDec');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');

//search
Route::get('/search','PagesController@search');

//mail
// Route::get('sendbasicemail','MailController@basic_email');
// Route::get('sendhtmlemail','MailController@html_email');
// Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/send/email', 'MailController@mail');
