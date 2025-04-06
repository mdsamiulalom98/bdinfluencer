<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CreatePageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BannerCategoryController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PressmediaController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\MemberController;

Auth::routes();

Route::get('/cc', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::post('/comments', [MemberController::class, 'store'])->name('comments.store');
Route::post('/replies', [MemberController::class, 'storeReply'])->name('replies.store');

Route::get('login/{provider}/redirect', [MemberController::class, 'loginredirect'])->name('social.login');
Route::get('/login/{provider}/callback', [MemberController::class, 'logincallback'])->name('social.redirect');

Route::group(['namespace'=>'Frontend'], function() {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('category/{category}', [FrontendController::class, 'category'])->name('category');
    Route::get('trending-products', [FrontendController::class, 'trendings'])->name('trendings');
    Route::get('search', [FrontendController::class, 'search'])->name('search');
    Route::get('post-details/{slug}', [FrontendController::class, 'postdetails'])->name('post.details');    
    Route::get('blogs', [FrontendController::class, 'ourblogs'])->name('ourblogs');
    Route::get('quick-view', [FrontendController::class, 'quickview'])->name('quickview');
    Route::get('site/contact-us', [FrontendController::class, 'contact'])->name('contact');
    Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('page');
    Route::post('subscriber/store', [FrontendController::class, 'addsubscriber'])->name('subscriber.store');
});

// unathenticate admin route
Route::group(['namespace'=>'Admin','prefix'=>'admin'], function() {
    Route::get('locked', [DashboardController::class, 'locked'])->name('locked');
    Route::post('unlocked', [DashboardController::class, 'unlocked'])->name('unlocked');
});

// auth route

Route::group(['namespace'=>'Admin','middleware' => ['auth','lock'],'prefix'=>'admin'], function() {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [DashboardController::class, 'changepassword'])->name('change_password');
    Route::post('new-password', [DashboardController::class, 'newpassword'])->name('new_password');

    // users route 
    Route::get('users/manage', [UserController::class,'index'])->name('users.index');
    Route::get('users/create', [UserController::class,'create'])->name('users.create');
    Route::post('users/save', [UserController::class,'store'])->name('users.store');
    Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::post('users/update', [UserController::class,'update'])->name('users.update');
    Route::post('users/inactive', [UserController::class,'inactive'])->name('users.inactive');
    Route::post('users/active', [UserController::class,'active'])->name('users.active');
    Route::post('users/destroy', [UserController::class,'destroy'])->name('users.destroy');
    
    // roles
    Route::get('roles/manage', [RoleController::class,'index'])->name('roles.index');
    Route::get('roles/{id}/show', [RoleController::class,'show'])->name('roles.show');
    Route::get('roles/create', [RoleController::class,'create'])->name('roles.create');
    Route::post('roles/save', [RoleController::class,'store'])->name('roles.store');
    Route::get('roles/{id}/edit', [RoleController::class,'edit'])->name('roles.edit');
    Route::post('roles/update', [RoleController::class,'update'])->name('roles.update');
    Route::post('roles/destroy', [RoleController::class,'destroy'])->name('roles.destroy');

    // permissions
    Route::get('permissions/manage', [PermissionController::class,'index'])->name('permissions.index');
    Route::get('permissions/{id}/show', [PermissionController::class,'show'])->name('permissions.show');
    Route::get('permissions/create', [PermissionController::class,'create'])->name('permissions.create');
    Route::post('permissions/save', [PermissionController::class,'store'])->name('permissions.store');
    Route::get('permissions/{id}/edit', [PermissionController::class,'edit'])->name('permissions.edit');
    Route::post('permissions/update', [PermissionController::class,'update'])->name('permissions.update');
    Route::post('permissions/destroy', [PermissionController::class,'destroy'])->name('permissions.destroy');

    // categories
    Route::get('categories/manage', [CategoryController::class,'index'])->name('categories.index');
    Route::get('categories/{id}/show', [CategoryController::class,'show'])->name('categories.show');
    Route::get('categories/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('categories/save', [CategoryController::class,'store'])->name('categories.store');
    Route::get('categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
    Route::post('categories/update', [CategoryController::class,'update'])->name('categories.update');
    Route::post('categories/inactive', [CategoryController::class,'inactive'])->name('categories.inactive');
    Route::post('categories/active', [CategoryController::class,'active'])->name('categories.active');
    Route::post('categories/destroy', [CategoryController::class,'destroy'])->name('categories.destroy');
    Route::post('categories/sort', [CategoryController::class,'sort'])->name('categories.sort');


    // pixels
    Route::get('pixels/manage', [PixelsController::class,'index'])->name('pixels.index');
    Route::get('pixels/{id}/show', [PixelsController::class,'show'])->name('pixels.show');
    Route::get('pixels/create', [PixelsController::class,'create'])->name('pixels.create');
    Route::post('pixels/save', [PixelsController::class,'store'])->name('pixels.store');
    Route::get('pixels/{id}/edit', [PixelsController::class,'edit'])->name('pixels.edit');
    Route::post('pixels/update', [PixelsController::class,'update'])->name('pixels.update');
    Route::post('pixels/inactive', [PixelsController::class,'inactive'])->name('pixels.inactive');
    Route::post('pixels/active', [PixelsController::class,'active'])->name('pixels.active');
    Route::post('pixels/destroy', [PixelsController::class,'destroy'])->name('pixels.destroy');
 
    // attribute
    Route::get('press-medias/manage', [PressmediaController::class,'index'])->name('pressmedias.index');
    Route::get('press-medias/{id}/show', [PressmediaController::class,'show'])->name('pressmedias.show');
    Route::get('press-medias/create', [PressmediaController::class,'create'])->name('pressmedias.create');
    Route::post('press-medias/save', [PressmediaController::class,'store'])->name('pressmedias.store');
    Route::get('press-medias/{id}/edit', [PressmediaController::class,'edit'])->name('pressmedias.edit');
    Route::post('press-medias/update', [PressmediaController::class,'update'])->name('pressmedias.update');
    Route::post('press-medias/inactive', [PressmediaController::class,'inactive'])->name('pressmedias.inactive');
    Route::post('press-medias/active', [PressmediaController::class,'active'])->name('pressmedias.active');
    Route::post('press-medias/destroy', [PressmediaController::class,'destroy'])->name('pressmedias.destroy');


   
    // product
    Route::get('posts/manage', [PostController::class,'index'])->name('posts.index');
    Route::get('posts/{id}/show', [PostController::class,'show'])->name('posts.show');
    Route::get('posts/create', [PostController::class,'create'])->name('posts.create');
    Route::post('posts/save', [PostController::class,'store'])->name('posts.store');
    Route::get('posts/{id}/edit', [PostController::class,'edit'])->name('posts.edit');
    Route::post('posts/update', [PostController::class,'update'])->name('posts.update');
    Route::post('posts/inactive', [PostController::class,'inactive'])->name('posts.inactive');
    Route::post('posts/active', [PostController::class,'active'])->name('posts.active');
    Route::post('posts/destroy', [PostController::class,'destroy'])->name('posts.destroy');
    Route::get('posts/image/destroy', [PostController::class,'imgdestroy'])->name('posts.image.destroy');
    Route::get('posts/price/destroy', [PostController::class,'pricedestroy'])->name('posts.price.destroy');
    Route::get('posts/update-trending', [PostController::class,'update_trending'])->name('posts.update_trending');
    Route::get('posts/update-popular', [PostController::class,'update_popular'])->name('posts.update_popular');
    Route::get('posts/update-feature', [PostController::class,'update_feature'])->name('posts.update_feature');
    Route::get('posts/update-status', [PostController::class,'update_status'])->name('posts.update_status');
    

    // settings route 
    Route::get('settings/manage', [GeneralSettingController::class,'index'])->name('settings.index');
    Route::get('settings/create', [GeneralSettingController::class,'create'])->name('settings.create');
    Route::post('settings/save', [GeneralSettingController::class,'store'])->name('settings.store');
    Route::get('settings/{id}/edit', [GeneralSettingController::class,'edit'])->name('settings.edit');
    Route::post('settings/update', [GeneralSettingController::class,'update'])->name('settings.update');
    Route::post('settings/inactive', [GeneralSettingController::class,'inactive'])->name('settings.inactive');
    Route::post('settings/active', [GeneralSettingController::class,'active'])->name('settings.active');
    Route::post('settings/destroy', [GeneralSettingController::class,'destroy'])->name('settings.destroy');

     // settings route 
    Route::get('social-media/manage', [SocialMediaController::class,'index'])->name('socialmedias.index');
    Route::get('social-media/create', [SocialMediaController::class,'create'])->name('socialmedias.create');
    Route::post('social-media/save', [SocialMediaController::class,'store'])->name('socialmedias.store');
    Route::get('social-media/{id}/edit', [SocialMediaController::class,'edit'])->name('socialmedias.edit');
    Route::post('social-media/update', [SocialMediaController::class,'update'])->name('socialmedias.update');
    Route::post('social-media/inactive', [SocialMediaController::class,'inactive'])->name('socialmedias.inactive');
    Route::post('social-media/active', [SocialMediaController::class,'active'])->name('socialmedias.active');
    Route::post('social-media/destroy', [SocialMediaController::class,'destroy'])->name('socialmedias.destroy');

     // contact route 
    Route::get('contact/manage', [ContactController::class,'index'])->name('contact.index');
    Route::get('contact/create', [ContactController::class,'create'])->name('contact.create');
    Route::post('contact/save', [ContactController::class,'store'])->name('contact.store');
    Route::get('contact/{id}/edit', [ContactController::class,'edit'])->name('contact.edit');
    Route::post('contact/update', [ContactController::class,'update'])->name('contact.update');
    Route::post('contact/inactive', [ContactController::class,'inactive'])->name('contact.inactive');
    Route::post('contact/active', [ContactController::class,'active'])->name('contact.active');
    Route::post('contact/destroy', [ContactController::class,'destroy'])->name('contact.destroy');

     // banner category route 
    Route::get('banner-category/manage', [BannerCategoryController::class,'index'])->name('banner_category.index');
    Route::get('banner-category/create', [BannerCategoryController::class,'create'])->name('banner_category.create');
    Route::post('banner-category/save', [BannerCategoryController::class,'store'])->name('banner_category.store');
    Route::get('banner-category/{id}/edit', [BannerCategoryController::class,'edit'])->name('banner_category.edit');
    Route::post('banner-category/update', [BannerCategoryController::class,'update'])->name('banner_category.update');
    Route::post('banner-category/inactive', [BannerCategoryController::class,'inactive'])->name('banner_category.inactive');
    Route::post('banner-category/active', [BannerCategoryController::class,'active'])->name('banner_category.active');
    Route::post('banner-category/destroy', [BannerCategoryController::class,'destroy'])->name('banner_category.destroy');

    // banner  route 
    Route::get('banner/manage', [BannerController::class,'index'])->name('banners.index');
    Route::get('banner/create', [BannerController::class,'create'])->name('banners.create');
    Route::post('banner/save', [BannerController::class,'store'])->name('banners.store');
    Route::get('banner/{id}/edit', [BannerController::class,'edit'])->name('banners.edit');
    Route::post('banner/update', [BannerController::class,'update'])->name('banners.update');
    Route::post('banner/inactive', [BannerController::class,'inactive'])->name('banners.inactive');
    Route::post('banner/active', [BannerController::class,'active'])->name('banners.active');
    Route::post('banner/destroy', [BannerController::class,'destroy'])->name('banners.destroy');
    
     // page category route 
    Route::get('page-category/manage', [PageCategoryController::class,'index'])->name('page_category.index');
    Route::get('page-category/create', [PageCategoryController::class,'create'])->name('page_category.create');
    Route::post('page-category/save', [PageCategoryController::class,'store'])->name('page_category.store');
    Route::get('page-category/{id}/edit', [PageCategoryController::class,'edit'])->name('page_category.edit');
    Route::post('page-category/update', [PageCategoryController::class,'update'])->name('page_category.update');
    Route::post('page-category/inactive', [PageCategoryController::class,'inactive'])->name('page_category.inactive');
    Route::post('page-category/active', [PageCategoryController::class,'active'])->name('page_category.active');
    Route::post('page-category/destroy', [PageCategoryController::class,'destroy'])->name('page_category.destroy');
    
    // contact route 
    Route::get('page/manage', [CreatePageController::class,'index'])->name('pages.index');
    Route::get('page/create', [CreatePageController::class,'create'])->name('pages.create');
    Route::post('page/save', [CreatePageController::class,'store'])->name('pages.store');
    Route::get('page/{id}/edit', [CreatePageController::class,'edit'])->name('pages.edit');
    Route::post('page/update', [CreatePageController::class,'update'])->name('pages.update');
    Route::post('page/inactive', [CreatePageController::class,'inactive'])->name('pages.inactive');
    Route::post('page/active', [CreatePageController::class,'active'])->name('pages.active');
    Route::post('page/destroy', [CreatePageController::class,'destroy'])->name('pages.destroy');


    // blog category routes
    Route::get('blog-category/manage', [BlogCategoryController::class,'index'])->name('blog_category.index');
    Route::get('blog-category/create', [BlogCategoryController::class,'create'])->name('blog_category.create');
    Route::post('blog-category/save', [BlogCategoryController::class,'store'])->name('blog_category.store');
    Route::get('blog-category/{id}/edit', [BlogCategoryController::class,'edit'])->name('blog_category.edit');
    Route::post('blog-category/update', [BlogCategoryController::class,'update'])->name('blog_category.update');
    Route::post('blog-category/inactive', [BlogCategoryController::class,'inactive'])->name('blog_category.inactive');
    Route::post('blog-category/active', [BlogCategoryController::class,'active'])->name('blog_category.active');
    Route::post('blog-category/destroy', [BlogCategoryController::class,'destroy'])->name('blog_category.destroy');

    // blog  routes
    Route::get('blog/manage', [BlogController::class,'index'])->name('blogs.index');
    Route::get('blog/create', [BlogController::class,'create'])->name('blogs.create');
    Route::post('blog/save', [BlogController::class,'store'])->name('blogs.store');
    Route::get('blog/{id}/edit', [BlogController::class,'edit'])->name('blogs.edit');
    Route::post('blog/update', [BlogController::class,'update'])->name('blogs.update');
    Route::post('blog/inactive', [BlogController::class,'inactive'])->name('blogs.inactive');
    Route::post('blog/active', [BlogController::class,'active'])->name('blogs.active');
    Route::post('blog/destroy', [BlogController::class,'destroy'])->name('blogs.destroy');

    // subscription route 
    Route::get('subscription/manage', [SubscriptionController::class,'index'])->name('subscriptions.index');
    Route::get('subscription/{id}/edit/', [SubscriptionController::class,'edit'])->name('subscriptions.edit');
    Route::post('subscription/update', [SubscriptionController::class,'update'])->name('subscriptions.update');
    Route::post('subscription/inactive', [SubscriptionController::class,'inactive'])->name('subscriptions.inactive');
    Route::post('subscription/active', [SubscriptionController::class,'active'])->name('subscriptions.active');
    Route::post('subscription/destroy', [SubscriptionController::class,'destroy'])->name('subscriptions.destroy');

});