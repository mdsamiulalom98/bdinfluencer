<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Toastr;
use Str;

class SubscriptionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:subscription-list|subscription-create|subscription-edit|subscription-delete', ['only' => ['index','store']]);
         $this->middleware('permission:subscription-create', ['only' => ['create','store']]);
         $this->middleware('permission:subscription-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:subscription-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $show_data = Subscriber::orderBy('id','DESC')->get();
        return view('backEnd.subscription.index',compact('show_data'));
    }
     public function edit($id)
    {
        $edit_data = Subscriber::find($id);
        return view('backEnd.subscription.edit',compact('edit_data'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
            'customer_ip' => 'required',
        ]);
        $input = $request->except('hidden_id');
        $input['status'] = $request->status==1?'1':'0';
        $update_data = Subscriber::find($request->hidden_id);
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('subscriptions.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Subscriber::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Subscriber::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Subscriber::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
