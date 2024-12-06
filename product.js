// Define a function to save the cart data to Local Storage
function saveCartToLocalStorage() {
  localStorage.setItem("cartItems", JSON.stringify(itemsAdded));
}

// Define a function to retrieve the cart data from Local Storage
function loadCartFromLocalStorage() {
  const cartData = localStorage.getItem("cartItems");
  if (cartData) {
    itemsAdded = JSON.parse(cartData);
    // Clear the current cart content
    const cartContent = cart.querySelector(".cart-content");
    cartContent.innerHTML = "";
    // Loop through the itemsAdded array and display the items in the cart
    itemsAdded.forEach((item) => {
      const cartBoxElement = CartBoxComponent(
        item.title,
        item.price,
        item.imgSrc
      );
      let newNode = document.createElement("div");
      newNode.innerHTML = cartBoxElement;
      cartContent.appendChild(newNode);
    });
  }
  const totalElement = cart.querySelector(".total-price");
  totalElement.innerHTML = "Rs." + localStorage.getItem("total");
}
// product cart

const cartIcon = document.querySelector("#cart-icon");
const cart = document.querySelector(".cart");
const closeCart = document.querySelector("#cart-close");

cartIcon.addEventListener("click", () => {
  cart.classList.add("active");
  loadCartFromLocalStorage();
  addEvents();
});

closeCart.addEventListener("click", () => {
  cart.classList.remove("active");
});

// Start when the document is ready
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", start);
} else {
  start();
}


function start() {
  addEvents();
}

// Update and save
function update() {
  addEvents();
  updateTotal();
  saveCartToLocalStorage();
}


function addEvents() {
  // remove item from cart
  let cartRemove_btns = document.querySelectorAll(".cart-remove");
  console.log(cartRemove_btns);
  cartRemove_btns.forEach((btn) => {
    btn.addEventListener("click", handle_removeCartItem);
  });

  //Changing items quantity
  let cartQuantity_inputs = document.querySelectorAll(".cart-quantity");
  cartQuantity_inputs.forEach((input) => {
    input.addEventListener("change", handle_changeItemQuantity);
  });

  // adding items to cart
  let addCart_btns = document.querySelectorAll(".add-cart");
  addCart_btns.forEach((btn) => {
    btn.addEventListener("click", handle_addCartItem);
  });

  // buy order
  const buy_btn = document.querySelector(".btn-buy");
  buy_btn.addEventListener("click", handle_buyOrder);
}

// handling events function
let itemsAdded = [];
function handle_addCartItem() {
  let product = this.parentElement;
  let title = product.querySelector(".product-title").innerHTML;
  let price = product.querySelector(".product-price").innerHTML;
  let imgSrc = product.querySelector(".product-img").src;
  console.log(title, price, imgSrc);

  let newToAdd = {
    title,
    price,
    imgSrc,
  };

  // handle item is already there been added
  if (itemsAdded.find((el) => el.title == newToAdd.title)) {
    alert("This Item Is Already Exist!");
    return;
  } else {
    itemsAdded.push(newToAdd);
  }

  // add products to cart
  let cartBoxElement = CartBoxComponent(title, price, imgSrc);
  let newNode = document.createElement("div");
  newNode.innerHTML = cartBoxElement;
  const cartContent = cart.querySelector(".cart-content");
  cartContent.appendChild(newNode);

  update();
}

function handle_removeCartItem() {
  console.log("remove clicked");

  this.parentElement.remove();
  itemsAdded = itemsAdded.filter(
    (el) =>
      el.title !=
      this.parentElement.querySelector(".cart-product-title").innerHTML
  );

  update();
}

function handle_changeItemQuantity() {
  if (isNaN(this.value) || this.value <= 1) {
    this.value = 1;
  }
  this.value = Math.floor(this.value); // to keep it integer

  update();
}

function handle_buyOrder() {
  if (itemsAdded.length <= 0) {
    alert(
      "There is No Order to Place Yet! \nPlease try to Make an Order first."
    );
    return;
  }
  const cartContent = cart.querySelector(".cart-content");
  cartContent.innerHTML = "";
  alert("Your Order is Placed Successfully :)");
  itemsAdded = [];

  update();
}

// update and remainder function

function updateTotal() {
  let cartBoxes = document.querySelectorAll(".cart-box");
  const totalElement = cart.querySelector(".total-price");
  let total = 0;
  cartBoxes.forEach((cartBox) => {
    let priceElement = cartBox.querySelector(".cart-price");
    let price = parseFloat(priceElement.innerHTML.replace("Rs.", ""));
    let quantity = cartBox.querySelector(".cart-quantity").value;
    total += price * quantity;
  });
  // keep two digits after the decimal point
  total = total.toFixed(2);

  totalElement.innerHTML = "Rs." + total;
  localStorage.setItem("total", total);
}

// connect to html 
function CartBoxComponent(title, price, imgSrc) {
  return `
    <div class="cart-box">
        <img src=${imgSrc} alt="" class="cart-img">
        <div class="detail-box">
            <div class="cart-product-title">${title}</div>
            <div class="cart-price">${price}</div>
            <input type="number" value="1" class="cart-quantity">
        </div>
        <!-- REMOVE CART  -->
        <i class='bx bxs-trash-alt cart-remove'></i>
    </div>`;
}