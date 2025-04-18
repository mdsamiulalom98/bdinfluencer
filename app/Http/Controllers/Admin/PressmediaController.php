<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pressmedia;
use Image;
use File;
use Toastr;

class PressmediaController extends Controller
{    
    public function index(Request $request)
    {
        $data = Pressmedia::orderBy('id','DESC')->get();
        return view('backEnd.pressmedia.index',compact('data'));
    }
    
    public function create()
    {
        return view('backEnd.pressmedia.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required',
        ]);
        // image with intervention 
        $image = $request->file('image');
        $name =  time().'-'.$image->getClientOriginalName();
        $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
        $name = strtolower(preg_replace('/\s+/', '-', $name));
        $uploadpath = 'public/uploads/pressmedia/';
        $imageUrl = $uploadpath.$name; 
        $img=Image::make($image->getRealPath());
        $img->encode('webp', 90);
        $width = 210;
        $height = 210;
        $img->height() > $img->width() ? $width=null : $height=null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($imageUrl);

        $input = $request->all();
        $input['image'] = $imageUrl;
        Pressmedia::create($input);
        Toastr::success('Success','Data insert successfully');
        return redirect()->route('pressmedias.index');
    }
    
    public function edit($id)
    {
        $edit_data = Pressmedia::find($id);
        return view('backEnd.pressmedia.edit',compact('edit_data'));
    }
    
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $update_data = Pressmedia::find($request->id);
        $input = $request->all();
        $image = $request->file('image');
        if($image){
            // image with intervention 
            $name =  time().'-'.$image->getClientOriginalName();
            $name = preg_replace('"\.(jpg|jpeg|png|webp)$"', '.webp',$name);
            $name = strtolower(preg_replace('/\s+/', '-', $name));
            $uploadpath = 'public/uploads/pressmedia/';
            $imageUrl = $uploadpath.$name; 
            $img=Image::make($image->getRealPath());
            $img->encode('webp', 90);
            $width = 210;
            $height = 210;
            $img->height() > $img->width() ? $width=null : $height=null;
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($imageUrl);
            $input['image'] = $imageUrl;
            File::delete($update_data->image);
        }else{
            $input['image'] = $update_data->image;
        }
        $input['status'] = $request->status?1:0;
        $update_data->update($input);

        Toastr::success('Success','Data update successfully');
        return redirect()->route('pressmedias.index');
    }
 
    public function inactive(Request $request)
    {
        $inactive = Pressmedia::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success','Data inactive successfully');
        return redirect()->back();
    }

    public function active(Request $request)
    {
        $active = Pressmedia::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success','Data active successfully');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $delete_data = Pressmedia::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success','Data delete successfully');
        return redirect()->back();
    }
}
