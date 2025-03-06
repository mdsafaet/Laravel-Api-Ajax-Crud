<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $product =Product::all();
      return response()->json([
        'message' => 'Total Product'.count($product),
        'data' => $product,
        'status' => true
    ], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
       
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'quantity'=>'required',
        ]);

        if($validator->passes()){
            
            $product =new Product();
            $product->name=$request->name;
            $product->price=$request->price;
            $product->image = $request->file('image')->store('products', 'public');
            $product->quantity=$request->quantity;
            $product->save();

            return response()->json([
                'message' => 'Product Created Successfully',
                'data' => $product,
                'status' => true
            ], 201);
        }
        else{
                return response()->json([
                    'message' => 'Validation Errors',
                    'errors' => $validator->errors(),
                    'status' => false
                ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found',
                'status' => false
            ], 404);
        }
        return response()->json([
            'message' => 'Product Found Successfully',
            'data' => $product,
            'status' => true
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found',
                'status' => false
            ], 404);
        }
    
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'price'    => 'required',
            'image'    => 'nullable',
            'quantity' => 'required',
        ]);
    
        if ($validator->passes()) {
    

            $product->name = $request->name;
            $product->price = $request->price;

            if ($request->hasFile('image')) {
                if ($product->image && Storage::disk('public')->exists($product->image)) {
                    Storage::disk('public')->delete($product->image);
                }
                $product->image = $request->file('image')->store('products', 'public');
            }

            $product->quantity = $request->quantity;
    
      
            $product->save();
    
            return response()->json([
                'message' => 'Product Updated Successfully',
                'data'    => $product,
                'status'  => true
            ], 200);  
        } 
        else {
            return response()->json([
                'message' => 'Validation Errors',
                'errors'  => $validator->errors(),
                'status'  => false
            ], 422);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found',
                'status' => false
            ], 404);
        }  
        $product->delete(); 
        return response()->json([
            'message' => 'Product Deletd Successfully',
            'data'    => $product,
            'status'  => true
        ], 200);     
    }
    
}
