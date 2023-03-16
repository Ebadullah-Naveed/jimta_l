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

Route::get('/post', function () {
    return view('post');
})->name('blog')->middleware('auth');

Route::get('/product', function () {
    return view('product');
})->middleware('auth')->name('product');

Route::get('/user', function () {
    return view('user');
})->name('userdet')->middleware('auth');

Route::get('/dashboard/investment', function () {
    return view('investment-package');
})->name('investmentdet')->middleware('auth');

Route::get('/category', function () {
    return view('category');
})->middleware('auth')->name('category');

Route::get('/transferlog', function () {
    return view('transferlog');
})->middleware('auth')->name('transferlog');

Route::get('/createrecord', function () {
    return view('create_record');
})->middleware('auth')->name('createrecord');

Route::get('/withdraw/request', function () {
    return view('withdrawrequest');
})->middleware('auth')->name('withreq');

Route::get('/dashboard/jimtacoin', function () {
    return view('jimtacoins');
})->middleware('auth')->name('jimtacoins');

Route::get('/bank/detail', function () {
    return view('bank-detail');
})->middleware('auth')->name('bankdet');

Route::get('/dashboard/walletwithdraw', function () {
    return view('withreq');
})->middleware('auth')->name('withreq');

Route::get('/fund/request', function () {
    return view('req-fund-f');
})->middleware('auth')->name('fundreqf');

Route::get('/dashboard/fundreq', function () {
    return view('fund-req');
})->middleware('auth')->name('fundreq');

Route::get('/investor/information', function () {
    return view('investmentinformation');
})->middleware('auth')->name('investorinfo');

Route::get('/service/center', function () {
    return view('service-center');
})->middleware('auth')->name('servicecenterf');

Route::get('/dashboard/service/center', function () {
    return view('servicecenter');
})->middleware('auth')->name('servicecenter');

Route::get('/dash', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/ordertodeliver', function () {
    return view('ordertodeliver');
})->middleware('auth')->name('ordertodeliver');

Route::get('/dashboard/code', function () {
    return view('code');
})->middleware('auth')->name('code');

Route::get('/dashboard/passwordchange', function () {
    return view('passwordchange');
})->middleware('auth')->name('passwordchange');

Route::get('/referal', function () {
    return view('referal');
})->middleware('auth')->name('referal');
Route::get('/shop', function () {
    return view('shop');
})->name('shop')->middleware('auth');
Route::get('/product/detail/{slug}', function () {
    return view('productdetail');
})->name('product.detail')->middleware('auth');
Route::get('/product/detail/{slug}', [App\Http\Controllers\ProdDet::class, 'productDet'])->name('product.detail');
Route::get('/service/register', function () {
    return view('service-register');
})->name('sr');
Route::get('/', function () {
    return view('homepage');
})->name('home')->middleware('auth');
Route::get('/confirmdelivery', function () {
    return view('confirmdelivery');
})->name('confirmdelivery')->middleware('auth');

Route::get('/investment', function () {
    return view('investment');
})->name('investment')->middleware('auth');

Route::get('/package', function () {
    return view('packages');
})->name('packages')->middleware('auth');


Route::get('/gen/code', function () {
    return view('codef');
})->name('codef')->middleware('auth');


Route::get('/user/account', function () {
    return view('useraccount');
})->name('useraccount')->middleware('auth');

Route::get('/subscribe/package', function () {
    return view('subscriberf');
})->name('subscriberf')->middleware('auth');

Route::get('/addbalance', function () {
    return view('addbalance');
})->name('addbalance')->middleware('auth');

Route::get('/reflogs', function () {
    return view('reflogs');
})->name('reflogs')->middleware('auth');

Route::get('/investment/log', function () {
    return view('il');
})->name('il')->middleware('auth');

Route::get('/cart', function () {
    return view('carts');
})->name('cart');
Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/checkout', [App\Http\Controllers\ProductController::class, 'checkout'])->name('checkout')->middleware('auth');

Auth::routes();

Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('homes');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact')->middleware('auth');


Route::get('/wallet/checkout/{amounts}/{delivery}', [App\Http\Controllers\HomeController::class, 'walletCheckout'])->name('wallet.pay')->middleware('auth');


Route::get('/service/registration', [App\Http\Controllers\Auth\RegisterController::class, function(){
    return view('auth.service_register');
}])->name('service.registration');

Route::post('/service/register', [App\Http\Controllers\Auth\RegisterController::class, 'Screate'])->name('service.register')->middleware('auth');

Route::get('/user/referal/{id}', [App\Http\Controllers\ReferalController::class, 'referrerReg'])->name('refbonus');


Route::get('add-to-cart/{id}/{quantity}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::patch('update-cart', [App\Http\Controllers\ProductController::class, 'update'])->name('update.cart')->middleware('auth');
Route::delete('remove-from-cart', [App\Http\Controllers\ProductController::class, 'remove'])->name('remove.from.cart')->middleware('auth');
Route::get('add-to-checkout/{id}', [App\Http\Controllers\ProductController::class, 'addToCheckout'])->name('add.to.checkout')->middleware('auth');
Route::get('/congrate', [App\Http\Controllers\HomeController::class, 'congrate'])->name('congrate')->middleware('auth');
Route::get('/invest/return', [App\Http\Controllers\HomeController::class, 'investReturn'])->name('invest')->middleware('auth');
Route::get('/invest/return/mistake', [App\Http\Controllers\HomeController::class, 'investmentReturnAfterMistake'])->name('investmentReturnAfterMistake')->middleware('auth');


Route::get('/howtomem', [App\Http\Controllers\howtomem::class, 'howtomem'])->name('howtomem');
Route::get('/how-to-regi-ser-cen', [App\Http\Controllers\howtomem::class, 'serviceagent'])->name('serviceagent');
Route::get('/about', [App\Http\Controllers\howtomem::class, 'about'])->name('about');
Route::get('/jimtaecosystem', [App\Http\Controllers\howtomem::class, 'jimtaecosystem'])->name('jimtaecosystem');
Route::get('/jimtacoin', [App\Http\Controllers\howtomem::class, 'jimtacoin'])->name('jimtacoin');
Route::get('/pvpoint', [App\Http\Controllers\howtomem::class, 'pvpoint'])->name('pvpoint');
Route::get('/shoppingpoints', [App\Http\Controllers\howtomem::class, 'shoppingpoints'])->name('shoppingpoints');
Route::get('/bonuspoint', [App\Http\Controllers\howtomem::class, 'bonuspoint'])->name('bonuspoint');
Route::get('/referralsystem', [App\Http\Controllers\howtomem::class, 'referralsystem'])->name('referralsystem');
Route::get('/servicecenterc', [App\Http\Controllers\howtomem::class, 'servicecenterc'])->name('servicecenterc');
Route::get('/faq', [App\Http\Controllers\howtomem::class, 'faq'])->name('faq');
Route::get('/terms', [App\Http\Controllers\howtomem::class, 'terms'])->name('terms');
Route::get('/jimtacoinsdesc', [App\Http\Controllers\howtomem::class, 'jimtacoinsdesc'])->name('jimtacoinsdesc');
Route::get('/realstate', [App\Http\Controllers\howtomem::class, 'realstate'])->name('realstate');
Route::get('/training', [App\Http\Controllers\howtomem::class, 'training'])->name('training');
Route::get('/hotelreservation', [App\Http\Controllers\howtomem::class, 'hotelreservation'])->name('hotelreservation');
Route::get('/transport', [App\Http\Controllers\howtomem::class, 'transport'])->name('transport');
Route::get('/thecnicalsupport', [App\Http\Controllers\howtomem::class, 'thecnicalsupport'])->name('thecnicalsupport');
Route::get('/returnexchange', [App\Http\Controllers\howtomem::class, 'returnexchange'])->name('returnexchange');
Route::get('/privacy', [App\Http\Controllers\howtomem::class, 'privacy'])->name('privacy');
Route::get('/paymentmethod', [App\Http\Controllers\howtomem::class, 'paymentmethod'])->name('paymentmethod');