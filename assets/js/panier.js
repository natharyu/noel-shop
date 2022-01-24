//local storage du panier pour tout le monde

// id est addToCart; (dans le shop et product
let addToCart = document.getElementById("addToCart");
let myCart = document.getElementById("myCart");
let shopCategory = document.getElementById("ShopCategory");
let divCart = document.getElementById("cart");
let viewCart = document.getElementById("viewCart");
let totalPriceDiv = document.getElementById("totalPriceDiv");

function displayCart() {
  myCart.style.display = "block";
}

function hideCart() {
  myCart.style.display = "none";
}

function displayShopCategory() {
  shopCategory.style.display = "block";
}

function hideShopCategory() {
  shopCategory.style.display = "none";
}

// addToCart.addEventListener("submit", addProductToCart(productName));

function addProductToCart() {
  let ownCart = JSON.parse(localStorage.getItem("ownCart"));

  if (ownCart == null) {
    ownCart = [];
  }

  let productId = this.dataset.id;
  let productName = this.dataset.name;
  let productPrice = this.dataset.price;
  let productStock = this.dataset.stock;
  let productImage = this.dataset.image;

  let product = {
    id: productId,
    name: productName,
    image: productImage,
    price: productPrice,
    stock: productStock,
  };
  console.log(product);
  ownCart.push(product);
  localStorage.setItem("ownCart", JSON.stringify(ownCart));
  displayDivCart();
}

function displayDivCartOnLoad() {
  let ownCart = JSON.parse(localStorage.getItem("ownCart"));
  if (ownCart == null) {
    ownCart = [];
  }

  viewCart.innerHTML = "";
  for (let i = 0; i < ownCart.length; i++) {
    viewCart.innerHTML += `<div class="divCart">
    <h3>${ownCart[i].name}</h3>
    <p><img src="./assets/images/shop/${ownCart[i].image}"></p>
    <p>Prix : ${ownCart[i].price}€</p>
    <p>${ownCart[i].stock} en stock</p>
    <button class="button" onclick="removeProductToCart(${i})">Supprimer</button>
    </div>`;
  }
  totalPriceDiv.innerHTML = "";
  let totalPrice = 0;
  for (let i = 0; i < ownCart.length; i++) {
    totalPrice += parseInt(ownCart[i].price);
  }
  totalPriceDiv.innerHTML = `<h2>Prix total : ${totalPrice}€</h2>`;
}

function displayDivCart() {
  let ownCart = JSON.parse(localStorage.getItem("ownCart"));
  if (ownCart == null) {
    ownCart = [];
  }

  divCart.innerHTML = "";
  for (let i = 0; i < ownCart.length; i++) {
    divCart.innerHTML += `<div class="column divCart">
        <h3>${ownCart[i].name}</h3>
        <p>Prix : ${ownCart[i].price}€</p>
        <p>${ownCart[i].stock} en stock</p>
        <button class="button" onclick="removeProductToCart(${i})">Supprimer</button>
       </div>`;
  }
}

function removeProductToCart(index) {
  let ownCart = JSON.parse(localStorage.getItem("ownCart"));
  ownCart.splice(index, 1);
  localStorage.setItem("ownCart", JSON.stringify(ownCart));
  displayDivCart();
  displayDivCartOnLoad();
}

document.addEventListener("DOMContentLoaded", function () {
  let addToCartBtns = document.querySelectorAll(".addToCartBtn");
  for (let i = 0; i < addToCartBtns.length; i++) {
    addToCartBtns[i].addEventListener("click", addProductToCart);
  }
  displayDivCart();
  displayDivCartOnLoad();
});

$(document).ready(function () {
  $("#recapValidate").on("click", function (addtoCart) {
    $("#recapCart").empty();
    addtoCart.preventDefault();

    $.ajax({
      dataType: "json",
      type: "POST",
      url: "handlers/cart.php",
      data: { cart: localStorage.getItem("ownCart") },
      success: function (data) {
        $("#recapCart").append(
          `<div>
                <h2>La commande a été éffectuée, notre équipe est sur le coup</h2>
                <div class="column">
                  <p>Le N° de votre commande est : ${data}</p>
                  <p></p>
                  <a class="buttonMyOrders" href="index.php?view=front/account-orders"><i class="fas fa-list-ul fa-2x"></i> Voir mes commandes <i class="fas fa-list-ul fa-2x"></i></a>
                </div>
            </div>`
        );
      },
      error: function (error) {
        console.log(error.responseText);
      },
    });
    localStorage.clear();
  });
});
