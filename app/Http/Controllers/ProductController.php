<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('created_at', 'desc');

        if ($request->filter) {
            $products->where('name', 'like', "%$request->filter%")
                     ->orWhere('description', 'like', "%$request->filter%");
        }

        $html = "";

        foreach ($products->get() as $prod) {
            $html .= "
            <div class='p-4 rounded bg-gray-200 w-full'>
            <img src='$prod->imgUrl' style='width: 100px; height: auto;' class='mb-4'>
            <h3 class='text-2xl'>$prod->name</h3>
            <hr class='my-2'>
            <p class='italic text-gray-500'>$prod->description</p>
            <div class='text-4xl text-red-600 mt-4 self-end'>$prod->price</div>
        </div>
        ";
        }

        return $html;
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'imgUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if($validator->fails()) {
            $products = Product::orderBy('created_at', 'desc');
            return view('pages.product-error', ['errors'=>$validator->errors(), 'products'=>$products]);
        }
        
        Product::create($request->all());

        $products = Product::orderBy('created_at', 'desc');
        
        return view('pages.product-message', ['products'=>$products]);
    }
    
}
