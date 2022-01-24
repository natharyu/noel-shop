var clicks = 1;
function add() {
  clicks += 1;
  document.getElementById("count").innerHTML = clicks;

  var productPrice = document.getElementById("price").dataset.price;
  var result;
  result = Number(productPrice) * clicks;
  document.getElementById("result").innerHTML = result;
  document.getElementById("quantity").value = clicks;
}
function less() {
  let i;
  i = clicks;
  if (i > 0) {
    clicks -= 1;
    document.getElementById("count").innerHTML = clicks;

    var productPrice = document.getElementById("price").dataset.price;
    var result;
    result = Number(productPrice) * Number(clicks);
    document.getElementById("result").innerHTML = result;
    document.getElementById("quantity").value = clicks;
  }
}

function reset() {
  $("#count").innerHTML = 1;
}
