<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TableInvoiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//insert


//list
Route::view('list','tablelist');



//data insert
Route::get('/insert',[InvoiceController::class,'insert_form']);
Route::post('/insert',[InvoiceController::class,'insertdata']);

//data list
Route::get('/list', [InvoiceController::class,'userlist']);

//delete data
Route::get('/delete/{id}',[InvoiceController::class,'delete']);

//update
Route::get('update/{id}',[InvoiceController::class,'edit']);
Route::post('update/{id}',[InvoiceController::class,'updates']);



//invoice form

//invoice data insert
Route::get('/invoiceinsert',[TableInvoiceController::class,'table_form']);
Route::post('/invoiceinsert',[TableInvoiceController::class,'tableinsert']);

//list invoice
// Route::view('invoicelist', 'invoicelist');
Route::get('invoicelist',[TableInvoiceController::class,'invoicetable']);

//delete invoice
Route::get('/deleteinvoice/{id}',[TableInvoiceController::class,'invoicedelete']);


//update invoice
Route::get('updateinvoice/{id}',[TableInvoiceController::class,'editinvoice']);
Route::post('updateinvoice/{id}',[TableInvoiceController::class,'updateinvoice']);


//invoice page
//company name
 Route::get('invoice',[TableInvoiceController::class,'showcustomer']);

Route::get('invoicepages/{id}',[TableInvoiceController::class,'invoicebill']);

