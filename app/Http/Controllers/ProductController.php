<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Validator;

class ProductController extends Controller
{
    public function admin()
{ 
     $categories = Category::all();
    return view('admin.admin', compact('categories'));
}

public function homepage()
{
    $products = Product::with('category')->get();
    return view('homepage', compact('products'));
}
    
    public function index(){
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request ->validate([
            'nama'=> 'required|string|max:255',
            'gambar'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048',
            'deskripsi'=> 'nullable|string',
            'category_id'=> 'required|exists:categories,id',
            'harga'=> 'required|numeric|min:0',
        ]);

        $path = $request -> file('gambar')->store('product', 'public');



        Product::create(['nama'=>$request->nama,
        'gambar'=>$path,
        'deskripsi'=>$request->deskripsi, 'category_id'=>
        $request->category_id,'harga'=>
        $request->harga,]);
        

        return redirect()->route('admin.index')->with('success', 'Produk berhasil ditambahkan');
    }
}
?>