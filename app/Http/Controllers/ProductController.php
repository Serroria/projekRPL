<?php
// app/Http/Controllers/ProductController.php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

use Validator;

class ProductController extends Controller
{
    public function admin($id=null)
{ 
     $categories = Category::all();
     $products = Product::with('category')->get();
     $editProduct = null;

     if($id){
        $editProduct = Product::findOrFail($id);
     }
    
    return view('admin.admin', compact('categories', 'products', 'editProduct'));
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



        Product::create([
        'nama'=>$request->nama,
        'gambar'=>$path,
        'deskripsi'=>$request->deskripsi, 
        'category_id'=> $request->category_id,
        'harga'=> $request->harga,]);
        

        return redirect()->route('admin')->with('success', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nama'=> 'required|string|max:255',
        'gambar'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'deskripsi'=> 'nullable|string',
        'category_id'=> 'required|exists:categories,id',
        'harga'=> 'required|numeric|min:0',
    ]);

    $product = Product::findOrFail($id);

    $data = [
    'nama' => $request->nama,
    'deskripsi' => $request->deskripsi,
    'category_id' => $request->category_id,
    'harga' => $request->harga,
];

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('product', 'public');
        $product->gambar = $path;
    }

  $product->update($data);

    return redirect()->route('admin')->with('success', 'Produk berhasil diperbarui');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('products.edit', compact('product', 'categories'));
}
public function destroy($id)
{
    $product = Product::findOrFail($id);
    
    // jika ingin hapus gambar juga:
    if ($product->gambar && Storage::disk('public')->exists($product->gambar)) {
        Storage::disk('public')->delete($product->gambar);
    }

    $product->delete();

    return redirect()->route('admin')->with('success', 'Produk berhasil dihapus');
}


}


?>