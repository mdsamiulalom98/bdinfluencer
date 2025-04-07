<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use App\Models\Post;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Subscriber;
use Toastr;
use File;
use Str;
use Image;
use DB;

class PostController extends Controller
{
    public function getSubcategory(Request $request)
    {
        $subcategory = DB::table("subcategories")
            ->where("category_id", $request->category_id)
            ->pluck('subcategoryName', 'id');
        return response()->json($subcategory);
    }

    public function getChildcategory(Request $request)
    {
        $childcategory = DB::table("childcategories")
            ->where("subcategory_id", $request->subcategory_id)
            ->pluck('childcategoryName', 'id');
        return response()->json($childcategory);
    }

    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $per_page = $request->input('per_page', 25);
        if ($request->keyword) {
            $data = Post::orderBy('id', 'DESC')->where('title', 'LIKE', '%' . $request->keyword . "%")->with('category')->paginate($per_page);
        } else {
            $data = Post::orderBy('id', 'DESC')->with('category')->paginate($per_page);
        }

        return view('backEnd.post.index', compact('data', 'per_page'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', '=', '0')->where('status', 1)->select('id', 'name', 'status')->with('childrenCategories')->get();

        return view('backEnd.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        // image with intervention
        $image = $request->file('image');
        if ($image) {
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/post/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = "";
            $height = "";
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
        } else {
            $imageUrl = null;
        }

        $last_id = Post::orderBy('id', 'desc')->select('id')->first();
        $last_id = $last_id ? $last_id->id + 1 : 1;
        $input = $request->except('files');

        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $request->title . '-' . $last_id));

        $input['status'] = $request->status ? 1 : 0;
        $input['image'] = $imageUrl;
        $blog = Post::create($input);

        $subscribers = Subscriber::where('status', 1)->get();
        foreach ($subscribers as $user) {
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'post_title' => $request->title,
                'post_slug' => $input['slug'],
                'post_image' => $imageUrl,
                'author' => $request->author_id,
            ];

            Mail::to($data['email'])->queue(new SubscriberMail($data));
        }

        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $edit_data = Post::find($id);
        $categories = Category::where('parent_id', '=', '0')->where('status', 1)->select('id', 'name', 'status')->get();
        return view('backEnd.post.edit', compact('edit_data', 'categories'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
            'description' => 'required',
        ]);

        $update_data = Post::find($request->id);
        $input = $request->except('files');

        $image = $request->file('image');
        if ($image) {
            // image with intervention
            $name = time() . '-' . $image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp', $name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/post/';
            $imageUrl = $uploadpath . $name;
            $img = Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = "";
            $height = "";
            $img->height() > $img->width() ? ($width = null) : ($height = null);
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        } else {
            $input['image'] = $update_data->image;
        }

        $input['slug'] = strtolower(preg_replace('/\s+/', '-', $request->title . '-' . $update_data->id));
        $input['status'] = $request->status ? 1 : 0;
        $update_data->update($input);
        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('posts.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Post::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }

    public function active(Request $request)
    {
        $active = Post::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $delete_data = Post::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }

    public function update_trending(Request $request)
    {
        $products = Post::whereIn('id', $request->input('post_ids'))->update(['trending' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Hot deals product status change']);
    }

    public function update_popular(Request $request)
    {
        $products = Post::whereIn('id', $request->input('post_ids'))->update(['popular' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Popular Post status change']);
    }

    public function update_feature(Request $request)
    {
        $products = Post::whereIn('id', $request->input('post_ids'))->update(['featured' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Feature product status change']);
    }

    public function update_status(Request $request)
    {
        $products = Post::whereIn('id', $request->input('post_ids'))->update(['status' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Product status change successfully']);
    }
}
