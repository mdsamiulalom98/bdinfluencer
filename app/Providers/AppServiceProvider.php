<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\GeneralSetting;
use App\Models\Category;
use App\Models\SocialMedia;
use App\Models\Contact;
use App\Models\PageCategory;
use App\Models\User;
use App\Models\Banner;
use App\Models\CreatePage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $generalsetting = GeneralSetting::where('status',1)->limit(1)->first();
        view()->share('generalsetting',$generalsetting); 

        $sidecategories = Category::where('parent_id','=','0')->where('status',1)->select('id','name','slug','status','image')->get();
        view()->share('sidecategories',$sidecategories); 
        
        $menucategories = Category::where('status',1)->select('id','name','slug','status','image')->orderBy('sort', 'ASC')->get();
        view()->share('menucategories',$menucategories); 

        $contact = Contact::where('status',1)->first();
        view()->share('contact',$contact); 

        $socialicons = SocialMedia::where('status',1)->get();
        view()->share('socialicons',$socialicons);

        $pagecategories = PageCategory::where('status',1)->limit(3)->with('pages')->get();
        view()->share('pagecategories',$pagecategories);

        $post_gallery = Banner::where(['status'=>1, 'category_id'=>6])->limit(8)->get();
        view()->share('post_gallery',$post_gallery);

        $CreatePage = CreatePage::where(['status'=>1])->limit(5)->latest()->get();
        view()->share('CreatePage',$CreatePage);

        $users = User::get();
        view()->share('users', $users);
        
    }
}
