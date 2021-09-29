<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $deleteUrl = route('admin.category.destroy', $row->id);

                    $actionBtn = "<button type='button' class='info btn btn-dark btn-sm' data-toggle='modal' data-target='#infocategory'><i class='fas fa-info'></i></button>
                                  <button type='button' data-toggle='modal' data-target='#editcategory' class='edit btn btn-warning btn-sm'><i class='fas fa-pen'></i></button>
                                    <a href='$deleteUrl' class='btn btn-sm btn-danger delete' id='deleteUrl'><i class='fas fa-trash-alt'></i></a>
                                   ";
                    return $actionBtn;

                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Category.index');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();
        session()->flash('success', 'Category has been created');
        return redirect()->route('admin.categorie.index');
    }


    public function update(Request $request)
    {
//        dd($request['editModalId']);
        $category = Category::find($request['editModalId']);
        $category->name = $request['editModalName'];
        $category->description = $request['editModalDescription'];
        $category->save();
        session()->flash('update', 'Category has been updated');
        return redirect()->route('admin.categorie.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categorie.index')->with('delete','Category deleted successfully');
    }
}
