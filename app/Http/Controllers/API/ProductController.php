<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::select('nama', 'price', 'description')->get();
        return response()->json($product, 200);
    }

    public function store(Request $request)
    {
        $store = Product::create($request->all());
        if ($store) {
            return response()->json([
                "Nama" => $request->nama,
                "Price" => $request->price,
                "Description" => $request->description
            ]);
        } else {
            return response()->json(['error' => 'Data gagal di create.'], 401);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "Nama" => $product->nama,
            "Price" => $product->price,
            "Description" => $product->description
        ]);
    }

    public function update(Request $request, $id)
    {
        $update = Product::updateOrCreate(['id' => $id], $request->all());
        $product = Product::select('nama', 'price', 'description')->get();

        if ($update) {
            return response()->json($product, 200);
        } else {
            return response()->json(['error' => 'Data gagal di update.'], 401);
        }
    }

    public function destroy($id)
    {
        $destroy = Product::find($id);
        $destroy->delete();
        $product = Product::select('nama', 'price', 'description')->get();

        if ($destroy) {
            return response()->json($product, 200);
        } else {
            return response()->json(['error' => 'Data gagal di hapus.'], 401);
        }
    }
}
