<?php

use App\Livewire\AboutPage;
use App\Livewire\AccountPage;
use App\Livewire\BrandPage;
use App\Livewire\CheckoutPage;
use App\Livewire\CheckoutSuccessPage;
use App\Livewire\CollectionPage;
use App\Livewire\ContactPage;
use App\Livewire\Home;
use App\Livewire\PrivacyPage;
use App\Livewire\ProductPage;
use App\Livewire\SearchPage;
use App\Livewire\TermsPage;
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

Route::get('/', Home::class);

Route::get('/collections/{slug}', CollectionPage::class)->name('collection.view');

Route::get('/products/{slug}', ProductPage::class)->name('product.view');

Route::get('/brands/{slug}', BrandPage::class)->name('brand.view');

Route::get('search', SearchPage::class)->name('search.view');

Route::get('checkout', CheckoutPage::class)->name('checkout.view');

Route::get('checkout/success', CheckoutSuccessPage::class)->name('checkout-success.view');

Route::get('contact-us', ContactPage::class)->name('contact');

Route::view('about-us', 'pages.about')->name('about');

Route::view('privacy-policy', 'pages.privacy')->name('privacy');

Route::view('terms-of-use', 'pages.terms')->name('terms');

/** Account routes */

Route::get('my-account', AccountPage::class)->middleware(['auth', 'verified'])->name('account');

/** Auth routes */

require __DIR__.'/auth.php';