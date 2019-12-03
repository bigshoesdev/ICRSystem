<?php

$_SESSION['intercrone_value'] = 0.28;
$_SESSION['intercrone_fee_percent'] = 5;

Auth::routes();

Route::get('/', 'SiteController@home')->name('home');
Route::get('/news/view/{slug}', 'NewsController@newsView')->name('news.view');

Route::group(['middleware' => 'web', 'namespace' => 'Auth'], function () {
    Route::get('/verify/user/{token}', 'RegisterController@verify')->name('verify');
    Route::get('/verify/logout', 'RegisterController@verifyLogout')->name('verifyLogout');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');

    Route::get('profile/kyc', 'ProfileController@kyc')->name('profile.kyc');
    Route::post('profile/kyc1/submit', 'ProfileController@kyc1Submit')->name('profile.kyc1.submit');
    Route::post('profile/kyc2/submit', 'ProfileController@kyc2Submit')->name('profile.kyc2.submit');

    Route::post('profile/2fa/enable', 'ProfileController@enableTwoFactor')->name('profile.enableTwoFactor');
    Route::post('profile/2fa/disable', 'ProfileController@disableTwoFactor')->name('profile.disableTwoFactor');
    Route::post('profile/2fa/renew', 'ProfileController@renew2FASecretCode')->name('profile.renew2FASecretCode');

    Route::get('supports', 'SupportsController@index')->name('supports');
    Route::get('supports/view/{ticket}', 'SupportsController@show')->name('supports.view');
    Route::get('supports/create', 'SupportsController@create')->name('supports.create');
    Route::get('supports/close/{id}', 'SupportsController@close')->name('supports.close');
    Route::post('supports/create', 'SupportsController@store')->name('supports.post');
    Route::post('supports/message/{ticket}', 'SupportsController@message')->name('supports.message');

    Route::get('news', 'NewsController@index')->name('news');

    Route::get('deposit', 'DepositController@index')->name('deposit');
    Route::get('exchange', 'ExchangeController@index')->name('exchange');
});


Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('dashboard', 'DashboardController@index')->name('index');

    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::get('user/delete/{id}', 'UserController@destroy')->name('user.delete');
    Route::post('user/update/{id}', 'UserController@update')->name('user.update');
    Route::post('user/create/store', 'UserController@store')->name('user.store');
    Route::get('user/create/admin/{id}', 'UserController@admin')->name('user.admin.create');
    Route::get('user/remove/admin/{id}', 'UserController@adminRemove')->name('user.admin.remove');

    Route::resource('news', 'PostController', ['names' => [
        'index' => 'post.index',
        'create' => 'post.create',
        'store' => 'post.store',
        'edit' => 'post.edit'
    ]]);

    Route::get('news/delete/{id}', ['uses' => 'PostController@destroy', 'as' => 'post.delete']);
    Route::post('news/update/{id}', ['uses' => 'PostController@update', 'as' => 'post.update']);
    Route::get('news/kill/{id}', ['uses' => 'PostController@kill', 'as' => 'post.kill']);

    Route::resource('category', 'CategoryController', ['names' => [
        'index' => 'category.index',
        'create' => 'category.create',
        'store' => 'category.store',
        'edit' => 'category.edit'
    ]]);

    Route::post('category/update/{id}', ['uses' => 'CategoryController@update', 'as' => 'category.update']);
    Route::get('category/delete/{id}', ['uses' => 'CategoryController@destroy', 'as' => 'category.delete']);

    Route::get('tag', ['uses' => 'TagController@index', 'as' => 'tag.index']);
    Route::get('tag/edit/{id}', ['uses' => 'TagController@edit', 'as' => 'tag.edit']);
    Route::post('tag/update/{id}', ['uses' => 'TagController@update', 'as' => 'tag.update']);
    Route::post('tag/store', ['uses' => 'TagController@store', 'as' => 'tag.store']);
    Route::get('tag/delete/{id}', ['uses' => 'TagController@destroy', 'as' => 'tag.destroy']);

    Route::get('support', 'SupportController@open')->name('support.open');
    Route::get('support/closed', 'SupportController@index')->name('support.closed');
    Route::get('support/view/{ticket}', 'SupportController@show')->name('support.view');
    Route::post('support/message/{ticket}', 'SupportController@store')->name('support.post');

    Route::get('admin/kyc/identity', 'KYCController@kyc')->name('kyc');
    Route::get('admin/kyc/address', 'KYCController@kyc2')->name('kyc2');
    Route::get('admin/kyc/show/{id}', 'KYCController@show')->name('kyc.show');
    Route::get('admin/kyc2/show/{id}', 'KYCController@show2')->name('kyc2.Show');
    Route::get('admin/kyc/identity/verify/accept/{id}', 'KYCController@KycAccept')->name('kyc.accept');
    Route::get('admin/kyc/identity/verify/reject/{id}', 'KYCController@KycReject')->name('kyc.reject');
    Route::get('admin/kyc/address/verify/accept/{id}', 'KYCController@Kyc2Accept')->name('kyc2.accept');
    Route::get('admin/kyc/address/verify/reject/{id}', 'KYCController@Kyc2Reject')->name('kyc2.reject');

});