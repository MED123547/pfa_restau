<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $deleteUrl = route('admin.menu.destroy', $row->id);

                    $actionBtn = "<button type='button' class='info btn btn-dark btn-sm' data-toggle='modal' data-target='#infoMenu'><i class='fas fa-info'></i></button>
                                  <button type='button' data-toggle='modal' data-target='#editMenu' class='edit btn btn-warning btn-sm'><i class='fas fa-pen'></i></button>
                                    <a href='$deleteUrl' class='btn btn-sm btn-danger delete' id='deleteUrl'><i class='fas fa-trash-alt'></i></a>
                                   ";
                    return $actionBtn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Menu.index', [
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $newImage = $request->file('img')->getClientOriginalName();
        $request->img->move(public_path('imageUploads'), $newImage);
        $menu = new Menu();
        $menu->name = $request['name'];
        $menu->description = $request['description'];
        $menu->price = $request['price'];
        $menu->category_id = $request['productAddMenu'];
        $menu->image = $newImage;
        $menu->save();
        session()->flash('success', 'Menu has been created');
        return redirect()->route('admin.menu.index');
    }


    public function update(Request $request)
    {
//        dd($request['editModalId']);
//        dd($request->file('img'));
//        $newImage = $request->file('img')->getClientOriginalName();
//        $request->img->move(public_path('imageUploads'), $newImage);
        $menu = Menu::find($request['editModalId']);
        $menu->name = $request['editModalName'];
        $menu->description = $request['editModalDescription'];
        $menu->price = $request['editModalPrice'];
        $menu->category_id = $request['productEditMenu'];
//        $menu->image = $newImage;
        $menu->save();
        session()->flash('update', 'Menu has been updated');
        return redirect()->route('admin.menu.index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('delete','Menu deleted successfully');
    }
}
