<?php

/** Create alias for Router. */
use Core\Router;
use Helpers\Hooks;

/** Get the Router instance. */
$router = Router::getInstance();

/** Define static routes. */


// Default Page Routing
Router::any('/admin/user', 'App\Controllers\User@index');
Router::any('/admin/role', 'App\Controllers\Role@index');

Router::any('/admin','App\Controllers\Dashboard@index');
Router::any('/admin/','App\Controllers\Dashboard@index');
Router::get('/admin/profile', 'App\Controllers\Profile@profile');
Router::get('/admin/change-password', 'App\Controllers\Profile@changePassword');
Router::post('/user/change-profile','App\Controllers\Profile@updateProfile');
Router::post('/user/changeMyPassword','App\Controllers\Profile@changeMyPassword');
Router::get('/home','App\Controllers\HomeIndex@index');
Router::get('/','App\Controllers\HomeIndex@index');

//Login User
Router::get('/user/login', 'App\Controllers\HomeIndex@loginAndSignUpPage');

//Login Admin
Router::post('/login', 'App\Controllers\Login@login');
Router::post('/admin/login','App\Controllers\Login@loginConsole');
Router::get('/admin/login','App\Controllers\Login@index');
Router::get('/admin/logout','App\Controllers\Login@logOutAdmin');
Router::get('/logout','App\Controllers\Login@logOut');


//Role Admin Action
Router::get('/role/getAll', 'App\Controllers\Role@getAll');
Router::post('/role/add', 'App\Controllers\Role@add');
Router::post('/role/delete', 'App\Controllers\Role@delete');
Router::get('/role/get', 'App\Controllers\Role@get');
Router::get('/role/checkCode', 'App\Controllers\Role@checkCode');
Router::post('/role/update', 'App\Controllers\Role@update');


//File Action
Router::post('/file/checkDocument', 'App\Controllers\File@checkDocument');
Router::post('/file/checkImage', 'App\Controllers\File@checkImage');
//Role Admin Action
Router::get('/file/getAll', 'App\Controllers\File@getAll');
Router::post('/file/add', 'App\Controllers\File@add');
Router::post('/file/delete', 'App\Controllers\File@delete');
Router::get('/file/get', 'App\Controllers\File@get');
Router::post('/file/update', 'App\Controllers\File@update');

//User Admin Action
Router::get('/user/getAll', 'App\Controllers\User@getAll');
Router::get('/user/getUserByCode', 'App\Controllers\User@getUserByCode');
Router::post('/user/add', 'App\Controllers\User@add');
Router::post('/user/delete', 'App\Controllers\User@delete');
Router::get('/user/get', 'App\Controllers\User@get');
Router::post('/user/update', 'App\Controllers\User@update');
Router::get('/user/checkEmail','App\Controllers\User@checkEmailExist');
Router::get('/user/checkUser','App\Controllers\User@checkUsernameExist');
Router::get('/user/checkPassword','App\Controllers\User@checkPasswordExist');
Router::post('/user/createStudent','App\Controllers\User@createStudent');
Router::get('/user/reloadMkcoor','App\Controllers\Faculty@reloadMkcoor');


/** End default routes */

/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');
/** End Module routes. */

/** If no route found. */
Router::error('Core\Error@index');

/** Execute matched routes. */
$router->dispatch();
