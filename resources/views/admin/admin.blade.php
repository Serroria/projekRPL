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

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Nama Produk:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}" required>
    </div>

    <div>
        <label>Gambar Produk:</label><br>
        <input type="file" name="gambar" required>
    </div>

    <div>
        <label>Deskripsi Produk:</label><br>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
    </div>

    <div>
        <label>Kategori Produk:</label><br>
        <select name="category_id" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="{{ old('harga') }}" required>
    </div>

    <button type="submit">Tambah Produk</button>
</form>
</body>
</html>