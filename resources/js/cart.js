 let cart = [];

  function addToCart(productId, productName, price) {
    const existing = cart.find(p => p.id === productId);
    if (existing) {
      existing.qty += 1;
    } else {
      cart.push({ id: productId, name: productName, price, qty: 1 });
    }
    renderCart();
  }

  function renderCart() {
    let content = '';
    let subtotal = 0;
    cart.forEach((item, index) => {
      subtotal += item.qty * item.price;
      content += `
        <div class="flex justify-between">
          <span>${item.name} x ${item.qty}</span>
          <span>Rp${(item.qty * item.price).toLocaleString()}</span>
        </div>`;
    });
    document.getElementById('cartItems').innerHTML = content;
    document.getElementById('cartSubtotal').innerText = 'Rp' + subtotal.toLocaleString();
    document.getElementById('checkoutModal').classList.remove('hidden');
  }

  function toggleCheckout() {
    document.getElementById('checkoutModal').classList.toggle('hidden');
  }