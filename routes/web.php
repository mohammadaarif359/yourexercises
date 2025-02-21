<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');*/

// web route
Route::get('/','PageController@home')->name('home');
Route::get('/about','PageController@about')->name('about');
Route::get('/pricing','PageController@pricing')->name('contact');
Route::get('/book-a-demo','PageController@demo')->name('book-a-demo');
Route::get('/features','PageController@features')->name('features');
Route::get('/contact','PageController@contact')->name('contact');
Route::get('/privacy-policy','PageController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-condition','PageController@termsCondition')->name('terms-condition');
Route::get('/sign-in','PageController@signIn')->name('sign-in');
Route::post('/contact-inquiry','PageController@contactInquiry')->name('contact-inquiry');
Route::post('/demo-inquiry','PageController@demoInquiry')->name('demo-inquiry');
Route::get('/feature/{slug}','PageController@featureDetail')->name('feature.detail');

// admin login route
Route::get('/login','Admin\AuthController@showLoginForm')->name('login');
Route::post('/login','Admin\AuthController@login')->name('login');
Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
Route::get('/password/request','Admin\ForgotPasswordController@passwordRequest')->name('password.request');
Route::post('/password/email','Admin\ForgotPasswordController@passwordRequestEmail')->name('password.email');
Route::get('/password/reset/{token}','Admin\ForgotPasswordController@passwordReset')->name('password.reset');
Route::post('/password/update','Admin\ForgotPasswordController@passwordResetUpdate')->name('password.update');

// admin after login route
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function(){
	
	// dashboard
	Route::get('/dashboard','Admin\DashboardController@index')->name('dashboard');
	
	// user
	Route::get('/user','Admin\UserController@index')->name('user');
	Route::get('/user/add','Admin\UserController@add')->name('user.add');
	Route::post('/user/store','Admin\UserController@store')->name('user.store');
	Route::get('/user/edit/{id}','Admin\UserController@edit')->name('user.edit');
	Route::post('/user/update','Admin\UserController@update')->name('user.update');
	Route::get('/user/delete/{id}','Admin\UserController@delete')->name('user.delete');
	Route::get('/user/export','Admin\UserController@export')->name('user.export');
	
	// push notification
	Route::get('/notification','Admin\NotificationController@index')->name('notification');
	Route::get('/notification/add','Admin\NotificationController@add')->name('notification.add');
	Route::post('/notification/store','Admin\NotificationController@store')->name('notification.store');
	Route::get('/notification/edit/{id}','Admin\NotificationController@edit')->name('notification.edit');
	Route::post('/notification/update','Admin\NotificationController@update')->name('notification.update');
	Route::get('/notification/delete/{id}','Admin\NotificationController@delete')->name('notification.delete');
	
	// cms
	Route::get('/cms-page','Admin\CmsPageController@index')->name('cms-page');
	Route::get('/cms-page/add','Admin\CmsPageController@add')->name('cms-page.add');
	Route::post('/cms-page/store','Admin\CmsPageController@store')->name('cms-page.store');
	Route::get('/cms-page/edit/{id}','Admin\CmsPageController@edit')->name('cms-page.edit');
	Route::post('/cms-page/update','Admin\CmsPageController@update')->name('cms-page.update');
	Route::get('/cms-page/delete','Admin\CmsPageController@delete')->name('cms-page.delete');
	
	// category
	Route::get('/category','Admin\CategoryController@index')->name('category');
	Route::get('/category/add','Admin\CategoryController@add')->name('category.add');
	Route::post('/category/store','Admin\CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
	Route::post('/category/update','Admin\CategoryController@update')->name('category.update');
	Route::get('/category/export','Admin\CategoryController@export')->name('category.export');

	// subategory
	Route::get('/subcategory','Admin\SubcategoryController@index')->name('subcategory');
	Route::get('/subcategory/add','Admin\SubcategoryController@add')->name('subcategory.add');
	Route::post('/subcategory/store','Admin\SubcategoryController@store')->name('subcategory.store');
	Route::get('/subcategory/edit/{id}','Admin\SubcategoryController@edit')->name('subcategory.edit');
	Route::post('/subcategory/update','Admin\SubcategoryController@update')->name('subcategory.update');
	Route::get('/subcategory/delete/{id}','Admin\SubcategoryController@delete')->name('subcategory.delete');
	Route::get('/subcategory/export','Admin\SubcategoryController@export')->name('subcategory.export');
	Route::post('/subcategory/by/category','Admin\SubcategoryController@byCategory')->name('subcategory.by.category');

	// exercise
	Route::get('/exercise','Admin\ExerciseController@index')->name('exercise');
	Route::get('/exercise/add','Admin\ExerciseController@add')->name('exercise.add');
	Route::post('/exercise/store','Admin\ExerciseController@store')->name('exercise.store');
	Route::get('/exercise/edit/{id}','Admin\ExerciseController@edit')->name('exercise.edit');
	Route::post('/exercise/update','Admin\ExerciseController@update')->name('exercise.update');
	Route::post('/exercise/by/subcategory','Admin\ExerciseController@bySubcategory')->name('exercise.by.subcategory');
	// Route::get('/subcategory/export','Admin\SubcategoryController@export')->name('subcategory.export');

	// exerise attachment
	Route::get('/exercise/attachment/{exercise_id}','Admin\ExerciseAttachmentController@index')->name('exercise.attachment');
	Route::post('/exercise/attachment/store','Admin\ExerciseAttachmentController@store')->name('exercise.attachment.store');
	Route::get('/exercise/attachment/edit/{id}','Admin\ExerciseAttachmentController@edit')->name('exercise.attachment.edit');
	Route::post('/exercise/attachment/update','Admin\ExerciseAttachmentController@update')->name('exercise.attachment.update');
	Route::get('/exercise/attachment/delete/{id}','Admin\ExerciseAttachmentController@delete')->name('exercise.attachment.delete');

	// plan
	Route::get('/plan','Admin\PlanController@index')->name('plan');
	Route::get('/plan/add','Admin\PlanController@add')->name('plan.add');
	Route::post('/plan/store','Admin\PlanController@store')->name('plan.store');
	Route::get('/plan/edit/{id}','Admin\PlanController@edit')->name('plan.edit');
	Route::post('/plan/update','Admin\PlanController@update')->name('plan.update');
	Route::get('/plan/export','Admin\PlanController@export')->name('plan.export');

	// inquiry
	Route::get('/inquiry/demo','Admin\InquiryController@inquiryDemo')->name('inquiry.demo');
	// Route::get('/inquiry/demo/export','Admin\InquiryController@inquiryDemoExport')->name('inquiry.demo.export');

	// module
	Route::match(['get', 'post', 'options'], 'module/{module}', 'Admin\ModuleController@index')->name('module');
	Route::get('/module/{module}/export','Admin\ModuleController@export')->name('module.export');
});
