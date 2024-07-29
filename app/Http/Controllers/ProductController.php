<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Afficher le formulaire et les produits
    public function index()
    {
        $products = Product::all(); // Récupérer tous les produits
        return view('product', compact('products'));
    }

    // Ajouter un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('image');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public/products/', $fileName);

          // Debug: Check file path
          if ($path) {
            echo "File stored at: " . $path;
        } else {
            echo "Failed to store file.";
        }

        Product::create([
            'name' => $request->input('pro_name'),
            'photo' => $fileName,
        ]);

        return redirect()->route('product.index');
    }

}
