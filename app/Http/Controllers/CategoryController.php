<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DB;

class CategoryController extends Controller
{

    public function index()
    {
        $categories=category::all();

        return view('admin.categories.index',compact('categories'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $this->validate($request, array(
            'name' => 'required',
            ) );

        Category::create($request->all());

        return redirect()->route('categories.index');

    }

    public function show($id)
    {
        //$products=DB::table('categories')->find($id)->products;
        $products=Category::find($id)->products;
        $categories=category::all();

        return view('admin.categories.index',compact(['categories','products']));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
