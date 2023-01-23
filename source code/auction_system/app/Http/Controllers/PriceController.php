<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Models\{Product,User};
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $products = DB::table('products')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->select('products.*', 'users.name')
        ->get();
        $search = $request->q;
        if($search!=""){
            $products = Product::where(function ($query) use ($search){
                $query->where('name_product', 'like', '%'.$search.'%') ;
                    
            })
            ->paginate(2);
            $products->appends(['q' => $search]);
        }
        else{
            $products = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*', 'users.name')
            ->get();
        }

        // return view('users.index', compact('users'));

        return view('product', ['products'=>$products])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function price()

    {
        $prices = DB::table('prices')
            ->join('users', 'prices.user_id', '=', 'users.id')
            ->join('products', 'prices.product_id', '=', 'products.id')
            ->select('prices.*', 'users.name','products.name_product','products.image')
            ->get();

        // $products = Product::orderBy('id','desc')->paginate(5);

        return view('prices', ['prices' => $prices])
               ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(Product $product)
    {


        return view('show_product',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $users = Auth::user();
        // $products = Product::all();

        // return view('show_product',compact('users','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = User::findOrFail($request->user_id);
        $product = Product::findOrFail($request->product_id);


        $request->validate([
            'price' => 'required|max:200',

        ]);
  
        $input = $request->all();
  
      
    
        Price::create($input);
     
        return redirect()->route('product')
                        ->with('success','Price Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    // public function show(Price $price)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {

        $price->delete();
     
        return redirect()->route('prices')
                        ->with('success','Product deleted successfully');
    }
}
