<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function show_products(){
        $products = Products::with('user')->where('status_products','tersedia')->get();

        $data = [];
        foreach($products as $products) {

            array_push($data,[
                'idproducts' =>$products->idproducts,
                'judul' => $products->judul,
                'gambar' => url($products->gambar),
                'name' => $products->user->nama,
            ]);
        }

        return response()->json($data,200);
    }

}
