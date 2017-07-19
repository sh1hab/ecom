<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Category;
use App\products;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        return view('admin.index');
    }

    public function create()
    {
        $category=category::pluck('id','name');

        return view('admin.products.create')->withCategory($category);
    }

    public function store(Request $request)
    {

        $formInput=$request->all();

// validation
        $this->validate($request,array(

            'name'=>'required | max:20',
            'descreption'=>'required',


            ));

// image upload
        if( $request->hasFile('image') )
        {
            $image_name=time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $image_name);
            $formInput['image']=$image_name;
        }
        
// mass assignment
        $data=products::create($formInput);

        Session::flash('success','Product Added');

        return redirect()->route('admin.index');
        

    }

    public function show($id)
    {
        //
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
