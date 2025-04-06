<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageCategory;
use Toastr;
class PageCategoryController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:page-category-list|page-category-create|page-category-edit|page-category-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:page-category-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:page-category-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:page-category-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = PageCategory::orderBy('id','DESC')->get();
        return view('backEnd.createpage.category.index',compact('data'));
    }
    public function create()
    {
        $categories = PageCategory::orderBy('id','DESC')->select('id','name')->get();
        return view('backEnd.createpage.category.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        PageCategory::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('page_category.index');
    }
    
    public function edit($id)
    {
        $edit_data = PageCategory::find($id);
        return view('backEnd.createpage.category.edit',compact('edit_data'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $update_data = PageCategory::find($request->id);
        $input = $request->all();
               $input['status'] = $request->status?1:0;
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('page_category.index');
    }
 
    public function inactive(Request $request)
    {
        $inactive = PageCategory::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = PageCategory::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = PageCategory::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
