<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product; // Assuming your Product model is in the App\Models namespace

class ProductController extends Controller
{
    public function insertProduct(Request $request)
    {
        // Example using raw query
        DB::statement("insert into products (id, name, price) values (1, 'ASUS', 15000000)");

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product inserted successfully'], 201);
        }

        return redirect()->route('products.index')->with('success', 'Product inserted successfully');
    }

    public function getAllProducts(Request $request)
    {
        $prods = DB::table('products')->get();

        if ($request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'list' => $prods,
        ]);

        return view('products.index', ['products' => $prods]);
    }

    public function index(Request $request)
    {
        // Get all products
        $products = Product::all();
    
        if ($request->is('api')) {
            return response()->json([
                'error' => false,
                'list' => $products,
            ]);
        }
    
        // Return a view with all products
        return view('products.index', compact('products'));
    }
    
    

    public function show(Request $request, $id)
    {
        // Get one product by ID
        $product = Product::find($id);

        if ($request->expectsJson()) {
            return response()->json($product);
        }

        // Return a view with the product details
        return view('products.show', compact('product'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Create and save the new product
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        if (request()->segment(1) == 'api') return response()->json([
            'error' => false,
            'message' => 'Product created successfully',
        ], 200);

        // Redirect back to the product list or show success message
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function destroy(Request $request, $id)
    {
        // Delete product
        Product::destroy($id);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Product deleted successfully']);
        }

        // Redirect back to the product list or show success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function create(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Form for creating a product not available via API'], 400);
        }

        // Return a view containing the form for creating a new product
        return view('products.create');
    }
}
