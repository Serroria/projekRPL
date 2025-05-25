 let cart = [];

  window.addToCart = function(productId, productName, price) { // <-- Change here
  const existing = cart.find(p => p.id === productId);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ id: productId, name: productName, price, qty: 1 });
  }
  renderCart();
};

window.renderCart = function() { // <-- Change here
 
  let content = '';
  let subtotal = 0;
  cart.forEach((item) => {
    subtotal += item.qty * item.price;
    content += `
      <div class="flex justify-between">
        <span>${item.name} x ${item.qty}</span>
        <span>Rp${(item.qty * item.price).toLocaleString()}</span>
      </div>`;
  });

};

window.toggleCheckout = function() { // <-- Change here
  document.getElementById('checkoutModal').classList.toggle('hidden');
// };

//   document.getElementById('cartItems').innerHTML = content;
//   document.getElementById('cartSubtotal').innerText = 'Rp' + subtotal.toLocaleString();
  
//   const ongkir = 4999;
//   const total = subtotal + ongkir;
//   document.getElementById('totalHarga').innerText = 'Rp' + total.toLocaleString();

//   document.getElementById('checkoutModal').classList.remove('hidden');
// }


//   function toggleCheckout() {
//     document.getElementById('checkoutModal').classList.toggle('hidden');
//   }

//   function showCartPopup() {
//   document.getElementById('checkoutModal').classList.remove('hidden');
// }


//   function closeCartPopup() {
//     document.getElementById('checkoutModal').classList.add('hidden');
//   }

// In cart.js
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
      const productId = button.dataset.productId;
      const productName = button.dataset.productName;
      const price = parseFloat(button.dataset.price);
      addToCart(productId, productName, price);
    });
  });
});

// Notifikasi
  showNotification(`${productName} berhasil ditambahkan ke keranjang!`);
  renderCart();
};

// Fungsi notifikasi
function showNotification(message) {
  const notif = document.createElement('div');
  notif.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-slide-in';
  notif.textContent = message;
  
  document.body.appendChild(notif);
  
  setTimeout(() => {
    notif.classList.add('animate-slide-out');
    setTimeout(() => notif.remove(), 500);
  }, 2000);

  window.checkout = function() {
  if(cart.length === 0) return;
  
  // Notifikasi checkout berhasil
  showNotification('Checkout berhasil! Struk akan dicetak...');
  
  // Generate struk
  const strukContent = `
    <div class="p-4 print:block" id="struk">
      <h2 class="text-2xl font-bold mb-4">Struk Pembelian</h2>
      <div class="mb-4">
        ${cart.map(item => `
          <div class="flex justify-between mb-2">
            <span>${item.name} x${item.qty}</span>
            <span>Rp${(item.price * item.qty).toLocaleString()}</span>
          </div>
        `).join('')}
      </div>
      <hr class="my-2">
      <p class="font-bold text-lg">Total: Rp${(parseInt(document.getElementById('totalHarga').innerText.replace(/\D/g, ''))).toLocaleString()}</p>
      <p class="mt-4 text-gray-500 text-sm">Terima kasih telah berbelanja!</p>
    </div>
  `;

  // Tampilkan struk dalam jendela cetak
  const printWindow = window.open('', '_blank');
  printWindow.document.write(`
    <html>
      <head>
        <title>Struk Pembelian</title>
        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <body class="p-4">${strukContent}</body>
    </html>
  `);
  printWindow.document.close();
  printWindow.print();
  
  // Kosongkan keranjang dan tutup modal
  cart = [];
  toggleCheckout();
  renderCart();
};
}
