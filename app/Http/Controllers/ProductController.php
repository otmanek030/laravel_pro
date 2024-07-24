<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        return view("layout.product");
    }

    public function productPost(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Fixed validation key
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = 'assets/image';
            $file->move(public_path($path), $fileName);

            $imagePath = $path . '/' . $fileName;
        } else {
            $imagePath = null;
        }

        \App\Livewire\Product::create([
            'product_name' => $request->product_name,
            'image' => $imagePath,
        ]);

        return redirect('/product')->with('status', 'Product added successfully!');
    }
}
