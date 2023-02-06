$(document).ready(function(){
  $('#categories').change(function(){
      const name = $('#categories').val()
      console.log(name)
      $.ajax({
          url : 'http://localhost/Electro_maroc/pages/categorie/'+name,
          method: 'GET',
          success : function(data){
              console.log(data);
              const products = JSON.parse(data)
              displayProducts(products)
          }
      })
  })
  $('#Tri').change(function(){
    const name = $('#Tri').val()
    console.log(name)
    $.ajax({
        url : 'http://localhost/Electro_maroc/pages/Tri/'+name,
        method: 'GET',
        success : function(data){
            console.log(data);
            const products = JSON.parse(data)
            displayProducts(products)
        }
    })
})
})

function displayProducts(products){
  const cont = document.querySelector("#productsContainer")
  cont.innerHTML = ''

  products.forEach(product => {
      cont.innerHTML += `
      <div class="w-64 h-80 rounded-sm flex flex-col justify-around border border:black items-center hover:shadow-2xl hover:duration-1000">
	<div class="text-xl font-bold text-center m-4 text-purple-900">${product.name}</div>
		   <img src="http://localhost/Electro_Maroc_admin/public/img/upload/${product.image}" class="w-2/4 h-1/3"/>
		   <div class="text-center mx-2">${product.description}</div>
		   <div class="font-extrabold text-center m-4 ">${product.prix} DH</div>
		   <div class="flex justify-center w-full m-0">
           <a href="http://localhost/Electro_Maroc/client/Addtocart/${product.id}" class="w-1/4 px-6 py-2 mb-2 text-md text-white hover:bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-shopping-cart"></i></a>
           <a href="#_" class="w-1/4 px-6 py-2 mb-2 text-md text-white hover:bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-heart"></i></a>
		</div></div> </div>
      `
  });
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