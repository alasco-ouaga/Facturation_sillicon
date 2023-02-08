<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BeginPaymentController;
use App\Http\Controllers\Frontend\ChoiceSliceController;
use App\Http\Controllers\Frontend\ChoiceServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use App\Mail\TestMail;
use App\Http\Controllers\ListingPaymentController;
use GuzzleHttp\Middleware;
use Svg\Tag\Group;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\CompanyController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/noconnect', [App\Http\Controllers\HomeController::class, 'noconnect'])->name('noconnect');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'admin_logout'])->name('admin_logout');
Route::get("/view/admin",[UsersController::class, "view_admin"])->name("view_admin");
Route::get("/view/secretaire",[UsersController::class, "view_secretaire"])->name("view_secretaire");
Route::post("/save/update/admin",[UsersController::class, "save_update_users"])->name("save_update_users");
Route::post("/update_users",[UsersController::class, "update_users"])->name("update_users");






Route::middleware('auth')->group(function(){


    Route::middleware('administrateur')->group(function(){

        // Users
        Route::get("/create_users",[UsersController::class, "create"])->name("create_users");
        Route::post("/save_users",[UsersController::class, "save_users"])->name("save_users");
        Route::get("/view_info",[UsersController::class, "view_info"])->name("view_info");

       /*  company */
       Route::get("/view/company",[CompanyController::class, "get_company"])->name("get_company");
       Route::get("/get",[CompanyController::class, "get_phone"])->name("get_phone");
       Route::get("/update",[CompanyController::class, "go_to_update"])->name("go_to_update");
       Route::post("/update",[CompanyController::class, "save_update_company"])->name("save_update_company");
       Route::get("/get/logo",[CompanyController::class, "get_logo"])->name("get_logo");
       Route::post("/save/logo",[CompanyController::class, "save_company_image"])->name("save_company_image");

       //phones
       Route::get("/show/phone",[CompanyController::class, "get_phone_of_structure"])->name("get_phone_of_structure");
       Route::get("/getInputToAddPhoneNumber",[CompanyController::class, "getInputToAddPhoneNumber"])->name("getInputToAddPhoneNumber");
       Route::get("/add/phone/{number}",[CompanyController::class, "add_phone_for_company"])->name("add_phone_for_company");
       Route::get("/get/phone/number/{id}",[CompanyController::class, "get_phone_number"])->name("get_phone_number");
       Route::post("/save/phone/number",[CompanyController::class, "save_update_number"])->name("save_update_number");
       Route::get("/delete/phone/number/{id}",[CompanyController::class, "delete_number"])->name("delete_number");
       Route::get("/confirm/delete/phone/{id}",[CompanyController::class, "confirmDeleteNnumber"])->name("confirmDeleteNnumber");


    });


    Route::middleware('moderateur')->group(function(){
        // Users
        Route::get("/view_info",[UsersController::class, "view_info"])->name("view_info");
        Route::post("/delete/user",[UsersController::class, "delete_user"])->name("delete_user");
        Route::post("/blocked_users",[UsersController::class, "blocked_users"])->name("blocked_users");
        Route::post("/authorize_users",[UsersController::class, "authorize_users"])->name("authorize_users");
    });

    Route::middleware('agents')->group(function(){

        //Création de recus
        Route::get("/create_invoice",[InvoiceController::class, "index"])->name("create_invoice");
        Route::post("/save_invoice",[InvoiceController::class, "save_invoice"])->name("save_invoice");
        Route::get("/pay_invoice",[InvoiceController::class, "pay_invoice"])->name("pay_invoice");
        Route::get("/view/invoice",[InvoiceController::class, "view_invoice"])->name("view_invoice");
        Route::post("/view_update_invoice",[InvoiceController::class, "view_update_invoice"])->name("view_update_invoice");
        Route::post("/save_update_invoice",[InvoiceController::class, "save_update_invoice"])->name("save_update_invoice");
        Route::post("/delete_invoice",[InvoiceController::class, "delete_invoice"])->name("delete_invoice");
        Route::post("/find_one_invoice",[InvoiceController::class, "find_one_invoice"])->name("find_one_invoice");
        Route::post("/save_update_invoice",[InvoiceController::class, "save_update_invoice"])->name("save_update_invoice");
        Route::post("/view_invoice_info",[InvoiceController::class, "view_invoice_info"])->name("view_invoice_info");
        Route::post("/search",[InvoiceController::class, "search_invoice"])->name("search_invoice");
        Route::get("/get/search",[InvoiceController::class, "get_search"])->name("get_search");
        Route::get("/view/invoice/data/{invoice_id}",[PaymentController::class, "get_invoice_data"])->name("get_invoice_data");
        Route::get("/view/payment/data/{payment_id}",[PaymentController::class, "get_payment_data"])->name("get_payment_data");
        Route::post("/payment/update",[PaymentController::class, "get_update_form"])->name("get_update_form");
        Route::post("/update/save",[PaymentController::class, "payment_update_save"])->name("payment_update_save");
        Route::post("/get/payment/data",[PaymentController::class, "get_a_payment"])->name("get_a_payment");
        Route::get("/payment/search",[PaymentController::class, "search_payment_form"])->name("search_payment_form");
        Route::post("/search/payment",[PaymentController::class, "search_a_payment"])->name("search_a_payment");
        Route::post("/search//payed/invoice",[PaymentController::class, "search_notpayed_invoice"])->name("search_notpayed_invoice");
        
        //payment de recu
        Route::get("/beging_payment",[PaymentController::class, "beging_payment"])->name("beging_payment");
        Route::get("/get/payment",[PaymentController::class, "get_payment"])->name("get_payment");
        Route::post("/create_payment",[PaymentController::class, "create_payment"])->name("create_payment");
        Route::post("/pay_invoice",[PaymentController::class, "pay_invoice"])->name("pay_invoice");
        Route::get("/recu",[PaymentController::class, "recu"])->name("recu_essai");

        //profile
        Route::get("/get/profil",[UsersController::class, "get_user_profil"])->name("get_user_profil");
        Route::get("/update/profil",[UsersController::class, "update_user_profil"])->name("update_user_profil");
        Route::post("/save/user/image",[UsersController::class, "save_user_image"])->name("save_user_image");
        Route::post("/save/update/data",[UsersController::class, "save_user_update_data"])->name("save_user_update_data");
        Route::get("/get/update/user",[UsersController::class, "get_update_user"])->name("get_update_user");


    });

});





