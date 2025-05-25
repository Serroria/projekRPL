

@extends('layout.adminlayout')
  
@section('content')
<h1>Tambah Produk Baru</h1>
  <!-- Error messages -->
@if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!--form-->

<form action="{{ route($editProduct ? 'products.update' : 'products.store', $editProduct ? $editProduct->id : '') }}" method="POST" enctype="multipart/form-data">
    @csrf
     @if ($editProduct)
        @method('PUT')
    @endif
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $editProduct->nama ?? '') }}" required>
    </div>

    <div>
        <label>Gambar Produk:</label><br>
       <input type="file" name="gambar" {{ $editProduct ? '' : 'required' }}>

    </div>

    <div>
        <label>Deskripsi Produk:</label><br>
        <textarea name="deskripsi">{{ old('deskripsi', $editProduct->deskripsi ?? '') }}</textarea>
    </div>

    <div>
        <label>Kategori Produk:</label><br>
        <select name="category_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $editProduct->category_id ??'') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="{{ old('harga') }}" required>
    </div>

    {{-- <div> --}}
    {{-- <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ old('stok', $editProduct->stok ?? 0) }}" required>
</div> --}}


    <button type="submit">Tambah Produk</button>
</form>

<!--daftar produk-->
<div class="container-table">
<table class="table-produk">
    <tr>
        <th>#</th>
        <th>Gambar</th>
        <th>Nama</th>
        {{-- <th>Stok</th> --}}
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    <tbody>
        @forelse($products as $product)

        <tr>
            <td data-th="No">{{ $loop->iteration }}</td>
            <td data-th="Gambar">
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama }}" width="60">
            </td>
            <td data-th="Nama">{{ $product->nama}}</td>
            {{-- <td data-th="Stok">{{ $product->stok }}</td> --}}

            <td data-th="Desc">{{ Str::limit($product->deskripsi, 50)}}</td>
            <td data-th="Kategori">{{$product->category->nama??'-' }}</td>
            <td data-th="Harga">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>

            <td data-th="Aksi" >
                <a href="{{ route('admin', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            </form>
            </td>


        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada produk.</td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>

<!-- Tambahkan pagination di sini -->
<div style="margin-top: 20px;">
    {{ $products->links() }}
</div>

@endsection

