<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ChefController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Chef::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $deleteUrl = route('admin.chef.destroy', $row->id);

                    $actionBtn = "<button type='button' class='info btn btn-dark btn-sm' data-toggle='modal' data-target='#infoChef'><i class='fas fa-info'></i></button>
                                  <button type='button' data-toggle='modal' data-target='#editChef' class='edit btn btn-warning btn-sm'><i class='fas fa-pen'></i></button>
                                    <a href='$deleteUrl' class='btn btn-sm btn-danger delete' id='deleteUrl'><i class='fas fa-trash-alt'></i></a>
                                   ";
                    return $actionBtn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('chefs.index');
    }


    public function store(Request $request)
    {
//        dd($request->file('img'));
        $newImage = $request->file('img')->getClientOriginalName();
        $request->img->move(public_path('imageUploads'), $newImage);

        $chef = new Chef();
        $chef->full_name = $request['fname'];
        $chef->email = $request['email'];
        $chef->phone_number = $request['phone'];
        $chef->image = $newImage;
        $chef->save();
        session()->flash('success', 'Chef has been created');
        return redirect()->route('admin.chef.index');
    }


    public function update(Request $request)
    {
//        dd($request['editModalId']);
//        $newImage = $request->file('image')->getClientOriginalName();
//        $request->img->move(public_path('imageUploads'), $newImage);

        $chef = Chef::find($request['editModalId']);
        $chef->full_name = $request['fnameedit'];
        $chef->email = $request['emailedit'];
        $chef->phone_number = $request['phoneedit'];
//        $chef->image = $newImage;
        $chef->save();
        session()->flash('update', 'Chef has been updated');
        return redirect()->route('admin.chef.index');
    }

    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('admin.chef.index')->with('delete','Chef deleted successfully');
    }
}
