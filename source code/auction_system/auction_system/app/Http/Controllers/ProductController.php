<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product,User};
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*', 'users.name')
            ->get();
        // $products = Product::orderBy('id','desc')->paginate(5);

        return view('products.index', ['products' => $products])
               ->with('i', (request()->input('page', 1) - 1) * 5);
    

    }





    public function create()
    {

        $users = Auth::user();
        return view('products.create',compact('users'));
    }


    public function store(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $request->validate([
            'name_product' => 'required|max:200',
            'description' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }




    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }


    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}
