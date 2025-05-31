// Select DOM elements
const iconCart = document.querySelector('.iconCart');
const cart = document.querySelector('.cart');
const container = document.querySelector('.container');
const close = document.querySelector('.close');

// Toggle cart visibility
iconCart.addEventListener('click', function () {
    const isCartHidden = cart.style.right === '-100%';
    cart.style.right = isCartHidden ? '0' : '-100%';
    container.style.transform = isCartHidden ? 'translateX(-400px)' : 'translateX(0)';
});

close.addEventListener('click', function () {
    cart.style.right = '-100%';
    container.style.transform = 'translateX(0)';
});

let products = [];

// Fetch product data
// fetch('product.json')
//     .then(response => response.json())
//     .then(data => {
//         products = data;
//         addDataToHTML();
//     });

function addDataToHTML() {
    const listProductHTML = document.querySelector('.listProduct');
    listProductHTML.innerHTML = '';

    if (products && products.length > 0) {
        products.forEach(product => {
            const newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.innerHTML = `
                <img src="${product.image}" alt="">
                <h2>${product.name}</h2>
                <div class="price">$${product.price}</div>
                <button onclick="addCart(${product.id})">Add To Cart</button>
            `;
            listProductHTML.appendChild(newProduct);
        });
    }
}

let listCart = [];

function checkCart() {
    const cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        try {
            listCart = JSON.parse(cookieValue.split('=')[1]);
        } catch (error) {
            listCart = [];
        }
    }
}

checkCart();

function addCart(idProduct) {
    const product = products.find(p => p.id === idProduct);
    if (!product) return;

    const productInCart = listCart.find(p => p && p.id === idProduct);
    if (!productInCart) {
        const newProduct = { ...product, quantity: 1 };
        listCart.push(newProduct);
    } else {
        productInCart.quantity++;
    }

    saveCartToCookie();
    addCartToHTML();
}

function saveCartToCookie() {
    document.cookie = `listCart=${JSON.stringify(listCart)}; expires=Thu, 31 Dec 2025 23:59:59 UTC; path=/;`;
}

function addCartToHTML() {
    const listCartHTML = document.querySelector('.listCart');
    const totalHTML = document.querySelector('.totalQuantity');
    let totalQuantity = 0;

    listCartHTML.innerHTML = '';

    listCart.forEach(product => {
        if (product) {
            const newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.innerHTML = `
                <img src="${product.image}" alt="">
                <div class="content">
                    <div class="name">${product.name}</div>
                    <div class="price">$${product.price} / 1 product</div>
                </div>
                <div class="quantity">
                    <button onclick="changeQuantity(${product.id}, '-')">-</button>
                    <span class="value">${product.quantity}</span>
                    <button onclick="changeQuantity(${product.id}, '+')">+</button>
                </div>
            `;
            listCartHTML.appendChild(newCart);
            totalQuantity += product.quantity;
        }
    });

    totalHTML.innerText = totalQuantity;
}

function changeQuantity(idProduct, type) {
    const product = listCart.find(p => p && p.id === idProduct);
    if (!product) return;

    if (type === '+') {
        product.quantity++;
    } else if (type === '-') {
        product.quantity--;
        if (product.quantity <= 0) {
            listCart = listCart.filter(p => p.id !== idProduct);
        }
    }

    saveCartToCookie();
    addCartToHTML();
}
