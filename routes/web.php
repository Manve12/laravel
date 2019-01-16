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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

//Invoice routes
Route::get('/invoices', 'InvoiceController@index')->middleware('auth');
Route::post('/invoices', 'InvoiceController@store')->middleware('auth');
Route::get('invoices/{invoice}', 'InvoiceController@show');
Route::patch('/invoices/{invoice}/edit', 'InvoiceController@update')->middleware('auth');
Route::delete('/invoices/{invoice}/delete', 'InvoiceController@destroy')->middleware('auth');
//Ticket routes
Route::post('/tickets', 'TicketController@store')->middleware('auth');
Route::patch('/tickets/{ticket}/complete', 'TicketController@update')->middleware('auth');
//TicketReply routes
Route::get('/tickets/{ticket}/replies', 'TicketReplyController@index');
Route::post('/tickets/{ticket}/reply', 'TicketReplyController@store')->middleware('auth');
//Task routes
//Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@store')->middleware('auth');
Route::get('/tasks/{task}', 'TaskController@show');
Route::patch('/tasks/{task}/complete', 'TaskController@update')->middleware('auth');
Route::patch('/tasks/{task}/edit', 'TaskController@edit')->middleware('auth');
Route::delete('/tasks/{task}/delete', 'TaskController@destroy')->middleware('auth');

//Other routes
Route::get('/staff', 'StaffController@index')->middleware('auth');
Route::get('/support', 'SupportController@index')->middleware('auth'); // TODO: Replace with post as support is now on the home page
Route::get('/portal', 'PortalController@index')->middleware('auth');

//API
Route::get('/api/staff', 'API\StaffController@index');
Route::post('/api/staff/update', 'API\StaffController@update');
