<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function admin()
{
    // return view('admin.admin');
    // $categories = Category::all();
    // return view('admin.admin', compact('categories'));
     $categories = Category::all();
    return view('admin.tambah', compact('categories'));
}

public function homepage()
{
    $products = Product::with('category')->get();
    return view('homepage', compact('products'));
}
    // public function index(){
    //     $products = Product::with('category')->get();
    //     return view('products.index', compact('products'));
    // }

    // public function create(){
    //     $categories = Category::all();
    //     return view('products.create', compact('categories'));
    // }
    public function store(Request $request)
    {
        $request ->validate([
            'name'=> 'required|string|max:255',
            'gambar'=>'required|image|mimes:jpeg, png, jpg, gif, svg|max:2048',
            'deskripsi'=> 'nullable|string',
            'category_id'=> 'required|exist:categories,id',
            'harga'=> 'required|numeric|min:0',
        ]);

        $path = $request -> file('gambar')->store('product', 'public');

        Product::create(['nama'=>$request->nama,
        'gambar'=>$path,
        'deskripsi'=>$request->deskripsi, 'category_id'=>
        $request->category_id,'harga'=>
        $request->harga,]);
        

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan');
    }
}
?>