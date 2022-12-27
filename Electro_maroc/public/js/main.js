function show(){
    var more = document.getElementById("show-more");
    var newp = document.getElementById("new");
    more.style.display = "inline";
    newp.style.display = "none";
}
function hide(){
    var more = document.getElementById("show-more");
    var newp = document.getElementById("new");
    more.style.display = "none";
    newp.style.display = "inline";
}


  function incrementQuantity() {
    const quantityElement = document.getElementById("quantity");
    let quantity = parseInt(quantityElement.value);
    quantity += 1;
    quantityElement.value = quantity;
  }
  
  function decrementQuantity() {
    const quantityElement = document.getElementById("quantity");
    let quantity = parseInt(quantityElement.value);
    if (quantity > 1) {
      quantity -= 1;
      quantityElement.value = quantity;
    }
  }