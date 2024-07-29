<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class shopController extends Controller
{
    // Afficher le formulaire et les produits
    public function index()
    {
        $products = Product::all(); // Récupérer tous les produits
        return view('shop', compact('products'));
    }

    // Ajouter un nouveau produit
    
}
