@extends('layout.main')

@section('mainLayout')
<div class="max-w-4xl mx-auto mt-10">
  <h1 class="text-2xl font-bold mb-6">Keranjang Belanja</h1>

  @if (session('success'))
    <div class="mb-4 bg-green-100 text-green-700 p-2 rounded">{{ session('success') }}</div>
  @endif

  @php
    $cart = session('cart', []);
    $total = 0;
  @endphp

  @if (!empty($cart))
    <table class="w-full table-auto border">
      <thead>
        <tr class="bg-gray-200">
          <th class="text-left px-2 py-1">Produk</th>
          <th class="text-left px-2 py-1">Qty</th>
          <th class="text-left px-2 py-1">Harga</th>
          <th class="text-left px-2 py-1">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cart as $item)
          @php
            $itemTotal = ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
            $total += $itemTotal;
          @endphp
          <tr class="border-t">
            <td class="px-2 py-1">{{ $item['name'] ?? '-' }}</td>
            <td class="px-2 py-1">{{ $item['quantity'] ?? 0 }}</td>
            <td class="px-2 py-1">Rp{{ number_format($item['price'] ?? 0, 0, ',', '.') }}</td>
            <td class="px-2 py-1">Rp{{ number_format($itemTotal, 0, ',', '.') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4 font-bold">
      Subtotal: Rp{{ number_format($total, 0, ',', '.') }} <br>
      Ongkir: Rp{{ number_format(4999, 0, ',', '.') }} <br>
      Total: Rp{{ number_format($total + 4999, 0, ',', '.') }}
    </div>

    <button onclick="document.getElementById('checkoutModal').classList.remove('hidden')"
      class="mt-4 bg-blue-700 hover:bg-blue-900 text-white py-2 px-4 rounded">
      Checkout
    </button>

    <form action="{{ route('cart.clear') }}" method="POST" class="mt-2">
      @csrf
      <button type="submit" class="text-red-600">Kosongkan Keranjang</button>
    </form>
  @else
    <p>Keranjang kosong.</p>
  @endif
</div>

<!-- Pop-Up Checkout Modal -->
<div id="checkoutModal" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center hidden z-50">
  <div class="bg-white p-6 rounded-lg w-96">
    <h2 class="text-xl font-semibold mb-4">Checkout</h2>
    <p>Terima kasih telah berbelanja!</p>
    <p>Total: Rp{{ number_format($total + 4999, 0, ',', '.') }}</p>
    <button class="mt-4 bg-green-700 hover:bg-green-900 text-white py-2 px-4 rounded"
      onclick="document.getElementById('checkoutModal').classList.add('hidden')">Tutup</button>
  </div>
</div>
@endsection
