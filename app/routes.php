<?php

Route::get('/', array('as' => 'teach', 'uses' => 'TeachController@index'));
Route::get('/search', array('as' => 'getSearch', 'uses' => 'SearchController@getSearch'));
Route::get('/about/company', array('as' => 'company', 'uses' => 'TeachController@company'));
Route::get('/about/teacher', array('as' => 'teacher', 'uses' => 'TeachController@showTeach'));
Route::get('/about/teachprexprt', array('as' => 'teachPrExprt', 'uses' => 'TeachController@teachPerExpert'));
Route::get('/course', array('as' => 'course', 'uses' => 'TeachController@course'));
Route::get('/payment', array('as' => 'payment', 'uses' => 'PaymentController@index'));
Route::get('/payments', array('as' => 'showPayment', 'uses' => 'PaymentController@showPayment'));
Route::get('/contact', array('as' => 'contact', 'uses' => 'ContactController@getContact'));
Route::get('/contact/{id}', array('as' => 'contactId', 'uses' => 'ContactController@getContactId'));

Route::post('/contact', array('before'=>'csrf', 'as'=>'contact', 'uses' => 'ContactController@postContact'));
    


?>