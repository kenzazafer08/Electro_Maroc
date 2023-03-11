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
  $('#products').on('click', '.plus', function(){
    const currentVal = parseInt($(this).prev('.quantity').val());
    const client = $(this).data('client');
    const produit = $(this).data('produit');
    const newVal = currentVal + 1;
    $(this).prev('.quantity').val(newVal);
    console.log(newVal);
    console.log(client);
    console.log(produit);
    $.ajax({
      url: 'http://localhost/Electro_maroc/pages/quantity/',
      method: 'POST',
      data: JSON.stringify({
        'client': client,
        'produit': produit,
        'quantity': newVal
      }),
      success: function(data) {
        const test = JSON.parse(data);
        console.log(test);
        displayCart(test);
        displaytotal(test);
      }
    });
  });

  $('#products').on('click', '.minus', function(){
    const currentVal = parseInt($(this).next('.quantity').val());
    const client = $(this).data('client');
    const produit = $(this).data('produit');
    const total = document.getElementById('total').innerHTML;
    const newVal = currentVal - 1;
    if (newVal >= 1) {
      $(this).next('.quantity').val(newVal);
      console.log(newVal);
      console.log(client);
      console.log(produit);
      console.log(total)
      $.ajax({
        url: 'http://localhost/Electro_maroc/pages/quantity/',
        method: 'POST',
        data: JSON.stringify({
          'client': client,
          'produit': produit,
          'quantity': newVal
        }),
        success: function(data) {
          const test = JSON.parse(data);
          console.log(test);
          // Call a function to display updated cart data
          displayCart(test);
          displaytotal(test);
        }
      });
    }
  });

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
});
})

function displayProducts(products){
  const cont = document.querySelector("#productsContainer")
  cont.innerHTML = ''
  
  products.forEach(product => {
    if(product.Pdelete == 1){
      cont.innerHTML += `
      <div class="w-64 h-80 rounded-sm flex flex-col justify-around border border:black items-center hover:shadow-2xl hover:duration-1000">
	<div class="text-xl font-bold text-center m-4 text-purple-900">${product.name}</div>
		   <img src="http://localhost/Electro_Maroc_admin/public/img/upload/${product.image}?>" class="w-16 h-24"/>
		   <div class="text-center mx-2">${product.description}</div>
		   <div class="font-extrabold text-center m-4 ">${product.prix} DH</div>
           <div class="flex justify-center w-full m-0">
           <a href="http://localhost/Electro_Maroc/client/Addtocart/${product.id}" class="w-1/4 px-6 py-2 mb-2 text-md text-white bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-shopping-cart"></i></a>
           <a href="http://localhost/Electro_Maroc/client/details/${product.id}" class="w-1/4 px-6 py-2 mb-2 text-md text-white bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-info"></i></a>
		</div></div>
      `
    }
  });
}
function displayCart(products){
    const cont = document.querySelector("#products")
    cont.innerHTML = ''
  
    products.forEach(product => {
        cont.innerHTML += `
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                ${product.name}
                </th>
                <td class="py-4 px-6">
                <img src="http://localhost/Electro_Maroc_admin/public/img/upload/${product.image}?>" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                ${product.prix} DH
                </td>
                <td class="py-4 px-6"> 
                <button class="minus" data-client="${product.id_client}" data-produit="${product.id_product}">-</button>
                <input type="text" class="quantity w-8 border-0" min="1" value="${product.quantity}">
                <button class="plus" data-client="${product.id_client}" data-produit="${product.id_product}">+</button>
                </td>
                <td class="py-4 px-6">
                ${product.prix_q} DH
                </td>
                <td class="py-4 px-6">
    
                    <a href="http://localhost/Electro_maroc/client/deleteproduct/${product.id}" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        `
    });
}
function displaytotal(products){
  const total = document.getElementById("total")
  total.innerHTML = ''
  let t = 0
  products.forEach(product => {
    console.log(product.prix)
    t += parseInt(product.prix_q)
});
total.innerHTML += `Total : ${t}`
}


