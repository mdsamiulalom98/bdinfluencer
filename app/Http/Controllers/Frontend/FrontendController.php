<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\CreatePage;
use App\Models\Blog;
use App\Models\Subscriber;
use App\Models\Comment;
use Session;
use Toastr;

class FrontendController extends Controller
{
    public function index()
    {
        $hero_section_posts = Post::select('id', 'slug', 'title', 'image', 'status', 'views')->where('status', 1)->latest()->limit(3)->get();

        $trending_posts = Post::select('id', 'slug', 'title', 'image', 'status', 'views')->orderBy('views', 'DESC')->limit(6)->where(['status' => 1])->get();

        $home_category_posts = Category::where(['front_view' => 1, 'status' => 1])
            ->select('id', 'sort', 'parent_id', 'name', 'slug', 'image', 'status', 'front_view')
            ->orderBy('id', 'ASC')
            ->with(['posts'])
            ->get()
            ->map(function ($query) {
                $query->setRelation('posts', $query->posts->take(5));
                return $query;
            });
        $featured_home_posts = Post::select('id', 'slug', 'title', 'image', 'status', 'featured')->where(['status' => 1, 'featured' => 1])->get();

        $latest_home_blogs = Post::where('status', 1)->select('id', 'slug', 'title', 'image', 'status', 'featured')->latest()->limit(10)->get();
        $latest_sidebar_blogs = Post::select('id', 'slug', 'title', 'image', 'status', 'featured')->where('status', 1)->limit(4)->latest()->get();
        $popular_sidebar_blogs = Post::select('id', 'slug', 'title', 'image', 'status', 'featured')->where(['status' => 1, 'popular' => 1])->limit(4)->latest()->get();
        $home_categories = Category::select('id', 'sort', 'parent_id', 'name', 'slug', 'image', 'status', 'front_view')->where('status', 1)->get();
        $feature__post = Post::select('id', 'slug', 'title', 'image', 'status', 'featured')->where(['status' => 1, 'featured' => 1])->limit(10)->get();
        $subscriber = Subscriber::where('customer_ip', request()->ip())->first();
        return view('frontEnd.layouts.pages.index', compact('hero_section_posts', 'trending_posts', 'home_category_posts', 'latest_home_blogs', 'latest_sidebar_blogs', 'popular_sidebar_blogs', 'home_categories', 'feature__post', 'subscriber'));
    }

    public function category($slug, Request $request)
    {

        $category = Category::where(['slug' => $slug, 'status' => 1])->first();
        $posts = Post::where(['status' => 1, 'category_id' => $category->id])
            ->orderBy('id', 'DESC')->select('id', 'slug', 'title', 'image', 'status', 'category_id');

        if ($request->keyword) {
            $posts = $posts->where('name', 'LIKE', '%' . $request->keyword . "%");
        }

        $posts = $posts->paginate(2);

        $home_categories = Category::where('status', 1)->get();
        $latest_sidebar_blogs = Post::where('status', 1)->select('id', 'slug', 'title', 'image', 'status', 'featured')->limit(4)->latest()->get();
        $popular_sidebar_blogs = Post::where(['status' => 1, 'popular' => 1])->select('id', 'slug', 'title', 'image', 'status', 'featured')->limit(4)->latest()->get();
        //feature post
        $feature__post = Post::where(['status' => 1, 'featured' => 1])->select('id', 'slug', 'title', 'image', 'status', 'featured')->limit(4)->get();
        // return $posts;
        $impposts = Post::where(['status' => 1, 'trending' => 1])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->select('id', 'title', 'slug')
            ->get();
        return view('frontEnd.layouts.pages.category', compact('category', 'posts', 'impposts', 'feature__post', 'popular_sidebar_blogs', 'latest_sidebar_blogs', 'home_categories'));
    }


    public function postdetails($slug, Request $request)
    {
        $post = Post::where(['slug' => $slug, 'status' => 1])->first();
        $post->views += 1;
        $post->save();
        $category = Category::where('id', $post->category_id)->first();
        $posts = Post::where(['status' => 1, 'category_id' => $post->category_id])
            ->orderBy('id', 'DESC')
            ->select('id', 'title', 'slug', 'category_id', 'image');

        $posts = $posts->paginate(24);
        $comments = Comment::whereNull('parent_id')->where('commentable_id', $post->id)->with('replies')->get();
        // return $comments;
        Session::put('slug', $slug);
        return view('frontEnd.layouts.pages.postdetail', compact('post', 'posts', 'category', 'comments'));
    }


    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $posts = Post::where(['status' => 1])
            ->orderBy('id', 'DESC');

        if ($request->keyword) {
            $posts = $posts->where('title', 'LIKE', '%' . $request->keyword . "%");
        }

        $posts = $posts->paginate(2);

        $home_categories = Category::where('status', 1)->get();
        $latest_sidebar_blogs = Post::where('status', 1)->limit(4)->latest()->get();
        $popular_sidebar_blogs = Post::where(['status' => 1, 'popular' => 1])->limit(4)->latest()->get();
        //feature post
        $feature__post = Post::where(['status' => 1, 'featured' => 1])->get();

        $impposts = Post::where(['status' => 1, 'trending' => 1])
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->select('id', 'title', 'slug')
            ->get();
        return view('frontEnd.layouts.pages.search', compact('keyword', 'posts', 'impposts', 'feature__post', 'popular_sidebar_blogs', 'latest_sidebar_blogs', 'home_categories'));
    }

    public function contact(Request $request)
    {
        return view('frontEnd.layouts.pages.contact');
    }

    public function page($slug)
    {
        $page = CreatePage::where('slug', $slug)->firstOrFail();
        return view('frontEnd.layouts.pages.page', compact('page'));
    }
    public function ourblogs()
    {
        $blogs = Post::where('status', 1)->paginate(2);
        $home_categories = Category::where('status', 1)->get();
        $feature__post = Post::where(['status' => 1, 'featured' => 1])->get();
        $popular_sidebar_blogs = Post::where(['status' => 1, 'popular' => 1])->limit(4)->latest()->get();
        $latest_sidebar_blogs = Post::where('status', 1)->limit(4)->latest()->get();
        return view('frontEnd.layouts.pages.blogs', compact('blogs', 'home_categories', 'feature__post', 'popular_sidebar_blogs', 'latest_sidebar_blogs'));
    }

    public function ourblogdetails($slug, $id)
    {
        $details = Blog::where(['id' => $id, 'slug' => $slug])->first();
        return view('frontEnd.layouts.pages.blogdetails', compact('details'));
    }


    public function addsubscriber(Request $request)
    {
        $existingSubscriber = Subscriber::where('email', $request->email)->first();
        if ($existingSubscriber) {
            $existingSubscriber->customer_ip = $request->ip();
            $existingSubscriber->save();
            Toastr::error('You have already subscribed to our newsletter', 'Oops');
            return redirect()->back();
        } else {
            $store = new Subscriber();
            $store->customer_ip = $request->ip();
            $store->email = $request->email;
            $store->status = 0;
            $store->save();
            Toastr::success('Your email subscribed successfully');
            return redirect()->back();
        }
    }


}
