<?php

use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/index/clear-cache', function() {
    echo $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'administrator'], function () {
    Route::group(['middleware' => ['auth','role:super-admin|admin']], function () {
        Route::get('/', [App\Http\Controllers\Administrator\IndexController::class, 'dashboard'])->name('admin-dashboard');
        
        //Users
        Route::get('/users', [App\Http\Controllers\Administrator\UserController::class, 'index'])->name('admin-users');

        // Leads
        Route::get('/leads/{type}', [App\Http\Controllers\Administrator\LeadController::class, 'index'])->name('admin-leads');
        //Page
        Route::get('/pages', [App\Http\Controllers\Administrator\PageController::class, 'index'])->name('admin-pages');
        Route::get('/add-page', [App\Http\Controllers\Administrator\PageController::class, 'Add'])->name('admin-add-page');
        Route::get('/view-page/{id}', [App\Http\Controllers\Administrator\PageController::class, 'show'])->name('admin-view-page');
        Route::post('/save-page', [App\Http\Controllers\Administrator\PageController::class, 'save'])->name('admin-save-page');
        Route::get('/delete-page/{id}', [App\Http\Controllers\Administrator\PageController::class, 'delete'])->name('admin-delete-page');

        //AdPage
        Route::get('/ad-pages', [App\Http\Controllers\Administrator\AdPageController::class, 'index'])->name('admin-ad-pages');
        Route::get('/add-ad-page', [App\Http\Controllers\Administrator\AdPageController::class, 'Add'])->name('admin-add-ad-page');
        Route::get('/view-ad-page/{id}', [App\Http\Controllers\Administrator\AdPageController::class, 'show'])->name('admin-ad-view-page');
        Route::post('/save-ad-page', [App\Http\Controllers\Administrator\AdPageController::class, 'save'])->name('admin-sad-ave-page');
        Route::get('/delete-ad-page/{id}', [App\Http\Controllers\Administrator\AdPageController::class, 'delete'])->name('admin-ad-delete-page');

        //Course Type
        Route::get('/course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'index'])->name('course-type');
        Route::get('/add-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'Add'])->name('admin-add-course-type');
        Route::get('/view-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'show'])->name('admin-show-course-type');
        Route::post('/save-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'save'])->name('admin-save-course-type');
        Route::get('/delete-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'delete'])->name('admin-delete-course-type');

        //Courses
        Route::get('/courses', [App\Http\Controllers\Administrator\CourseController::class, 'index'])->name('admin-courses');
        Route::get('/view-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'show'])->name('admin-show-course');
        Route::post('/save-course', [App\Http\Controllers\Administrator\CourseController::class, 'save'])->name('admin-save-course');
        Route::get('/delete-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'delete'])->name('admin-delete-course');

        //Subjects
        Route::get('/subjects', [App\Http\Controllers\Administrator\SubjectController::class, 'index'])->name('admin-subjects');
        Route::get('/add-subject', [App\Http\Controllers\Administrator\SubjectController::class, 'Add'])->name('admin-add-subject');
        Route::get('/view-subject/{id}', [App\Http\Controllers\Administrator\SubjectController::class, 'show'])->name('admin-show-subject');
        Route::post('/save-subject', [App\Http\Controllers\Administrator\SubjectController::class, 'save'])->name('admin-save-subject');
        Route::get('/delete-subject/{id}', [App\Http\Controllers\Administrator\SubjectController::class, 'delete'])->name('admin-delete-subject');

        //Topics
        Route::get('/topics', [App\Http\Controllers\Administrator\TopicController::class, 'index'])->name('admin-topics');
        Route::get('/add-topic', [App\Http\Controllers\Administrator\TopicController::class, 'Add'])->name('admin-add-topic');
        Route::get('/view-topic/{id}', [App\Http\Controllers\Administrator\TopicController::class, 'show'])->name('admin-show-topic');
        Route::post('/save-topic', [App\Http\Controllers\Administrator\TopicController::class, 'save'])->name('admin-save-topic');
        Route::get('/delete-topic/{id}', [App\Http\Controllers\Administrator\TopicController::class, 'delete'])->name('admin-delete-topic');

        //Recruiters
        Route::get('/recruiters', [App\Http\Controllers\Administrator\RecruiterController::class, 'index'])->name('admin-recruiters');
        Route::get('/add-recruiter', [App\Http\Controllers\Administrator\RecruiterController::class, 'add'])->name('admin-add-recruiter');
        Route::get('/view-recruiter/{id}', [App\Http\Controllers\Administrator\RecruiterController::class, 'show'])->name('admin-show-recruiter');
        Route::post('/save-recruiter', [App\Http\Controllers\Administrator\RecruiterController::class, 'save'])->name('admin-save-recruiter');
        Route::get('/delete-recruiter/{id}', [App\Http\Controllers\Administrator\RecruiterController::class, 'delete'])->name('admin-delete-recruiter');

        //Testimonials
        Route::get('/testimonials', [App\Http\Controllers\Administrator\TestimonialController::class, 'index'])->name('admin-testimonials');
        Route::get('/add-testimonial', [App\Http\Controllers\Administrator\TestimonialController::class, 'add'])->name('admin-add-testimonial');
        Route::get('/view-testimonial/{id}', [App\Http\Controllers\Administrator\TestimonialController::class, 'show'])->name('admin-show-testimonial');
        Route::post('/save-testimonial', [App\Http\Controllers\Administrator\TestimonialController::class, 'save'])->name('admin-save-testimonial');
        Route::get('/delete-testimonial/{id}', [App\Http\Controllers\Administrator\TestimonialController::class, 'delete'])->name('admin-delete-testimonial');

        //Faqs
        Route::get('/faqs', [App\Http\Controllers\Administrator\FaqController::class, 'index'])->name('admin-faqs');
        Route::get('/add-faq', [App\Http\Controllers\Administrator\FaqController::class, 'add'])->name('admin-add-faq');
        Route::get('/view-faq/{id}', [App\Http\Controllers\Administrator\FaqController::class, 'show'])->name('admin-show-faq');
        Route::post('/save-faq', [App\Http\Controllers\Administrator\FaqController::class, 'save'])->name('admin-save-faq');
        Route::get('/delete-faq/{id}', [App\Http\Controllers\Administrator\FaqController::class, 'delete'])->name('admin-delete-faq');

        // Media Module
        Route::get('/media', [App\Http\Controllers\Administrator\MediaController::class, 'index'])->name('admin-media');
        Route::get('/view-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'view'])->name('admin-view-file');
        Route::post('/upload', [App\Http\Controllers\Administrator\MediaController::class, 'save'])->name('admin-save-media');
        Route::post('/save-file', [App\Http\Controllers\Administrator\MediaController::class, 'updateFile'])->name('admin-save-file');
        Route::get('/delete-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'delete'])->name('admin-delete-file');
        Route::post('/search-media', [App\Http\Controllers\Administrator\MediaController::class, 'search'])->name('admin-search-media');

       //Coupon Code
        Route::get('/coupons', [App\Http\Controllers\Administrator\CouponController::class, 'index'])->name('admin-coupons');
        Route::get('/add-coupon', [App\Http\Controllers\Administrator\CouponController::class, 'add'])->name('admin-add-coupon');
        Route::get('/view-coupon/{id}', [App\Http\Controllers\Administrator\CouponController::class, 'show'])->name('admin-view-coupon');
        Route::post('/save-coupon', [App\Http\Controllers\Administrator\CouponController::class, 'save'])->name('admin-save-coupon');
        Route::get('/delete-coupon/{id}', [App\Http\Controllers\Administrator\CouponController::class, 'delete'])->name('admin-delete-coupon');
    
        // Sync With ERP
        Route::get('/sync-with-erp', [App\Http\Controllers\Administrator\SyncErpController::class, 'index'])->name('admin-sync-with-erp');
        Route::get('/sync-courses', [App\Http\Controllers\Administrator\SyncErpController::class, 'courses'])->name('admin-sync-courses');
        Route::get('/sync-fees', [App\Http\Controllers\Administrator\SyncErpController::class, 'fees'])->name('admin-sync-fees');
        Route::get('/sync-states', [App\Http\Controllers\Administrator\SyncErpController::class, 'states'])->name('admin-sync-states');
        Route::get('/sync-cities', [App\Http\Controllers\Administrator\SyncErpController::class, 'cities'])->name('admin-sync-cities');
        Route::get('/sync-highest-qualifications', [App\Http\Controllers\Administrator\SyncErpController::class, 'highestQualification'])->name('admin-sync-highest-qualifications');

        //Orders
        Route::get('/orders', [App\Http\Controllers\Administrator\OrderController::class, 'index'])->name('admin-orders');
        Route::get('/order/{id}', [App\Http\Controllers\Administrator\OrderController::class, 'show'])->name('admin-order-detail');
        Route::get('/admissions', [App\Http\Controllers\Administrator\OrderController::class, 'admissions'])->name('admin-admissions');
        
        Route::get('/settings', [App\Http\Controllers\Administrator\SettingController::class, 'show'])->name('admin-settings');
        Route::post('/save-settings', [App\Http\Controllers\Administrator\SettingController::class, 'save'])->name('admin-save-settings');
    });
});
Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('website');
Route::get('/{slug}', [App\Http\Controllers\PageController::class, 'index'])->name('page-view')->where('slug', '([A-Za-z0-9\-]+)');
Route::get('/ads/{slug}', [App\Http\Controllers\AdPageController::class, 'index'])->name('ad-page-view')->where('slug', '([A-Za-z0-9\-]+)');
Route::get('/courses/{slug}', [App\Http\Controllers\CourseController::class, 'view'])->name('view-courses');
Route::get('/category/{slug}', [App\Http\Controllers\CourseTypeController::class, 'view'])->name('category');

Route::post('/submit-mobile-otp', [App\Http\Controllers\IndexController::class, 'submitMobileOtp'])->name('submit-mobile-otp');
Route::post('/insert-lead-records', [App\Http\Controllers\IndexController::class, 'insertLeadRecord'])->name('insert-lead-records');
Route::post('/capture-lead', [App\Http\Controllers\IndexController::class, 'captureLead'])->name('capture-lead');
Route::post('/save-contact', [App\Http\Controllers\IndexController::class, 'saveContact'])->name('save-contact');
Route::post('/apply-coupon-code', [App\Http\Controllers\IndexController::class, 'applyCouponCode'])->name('apply-coupon-code');

//Cart
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/index/carts', [App\Http\Controllers\CartController::class, 'carts'])->name('carts');
Route::post('/remove-from-cart', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('remove-from-cart');

//Checkout 
Route::get('/cart/validate', [App\Http\Controllers\CheckoutController::class, 'studentValidate'])->name('validate');
Route::post('/validate-lead', [App\Http\Controllers\CheckoutController::class, 'validateLead'])->name('validate-lead');
Route::get('/cart/checkout', [App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout')->middleware('check_cart_item');
Route::post('/proceed-to-checkout', [App\Http\Controllers\CheckoutController::class, 'proceedToCheckout'])->name('proceed-to-checkout')->middleware('check_cart_item');
Route::get('/payemnt/order-success', [App\Http\Controllers\CheckoutController::class, 'orderSuccess'])->name('payment-order-success');
Route::get('/payemnt/order-failed', [App\Http\Controllers\CheckoutController::class, 'orderFailed'])->name('payment-order-failed');

//Payment
Route::get('/payment/success', [App\Http\Controllers\PaymentController::class, 'success'])->name('payment-success');
Route::get('/payment/failed', [App\Http\Controllers\PaymentController::class, 'failed'])->name('payment-failed');

Route::post('/get-city-by-state-id', [App\Http\Controllers\IndexController::class, 'getCitiesByStateId'])->name('get-city-by-state-id');
Route::get('/api/primary-menu', [App\Http\Controllers\ApiController::class, 'primaryMenu'])->name('api-primary-menu');
Route::get('/api/footer-menu', [App\Http\Controllers\ApiController::class, 'footerMenu'])->name('api-footer-menu');
Route::get('/api/courses', [App\Http\Controllers\ApiController::class, 'courses'])->name('api-courses');
Route::get('/api/institutes', [App\Http\Controllers\ApiController::class, 'institutes'])->name('api-institutes');
Route::get('/api/setting/{key}', [App\Http\Controllers\ApiController::class, 'setting'])->name('api-setting');