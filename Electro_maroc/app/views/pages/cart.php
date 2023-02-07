<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="w-full h-[450px] flex justify-center">
     <div class="h-auto w-[90%] shadow-lg overflow-y-scroll m-10 flex flex-col items-center ">
        <p class="text-black font-bold w-full text-center my-6">My Cart</p>   
<div class="overflow-x-auto w-full relative ">
    <table class="min-h-[200px] w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantité
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($data['cart'] as $cart) : ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               <?=$cart->name?>
                </th>
                <td class="py-4 px-6">
                <img src="<?=Imagepath?>/<?=$cart->image?>" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                <?=$cart->prix?> DH
                </td>
                <td class="py-4 px-6"> 
                <?=$cart->quantity?>
                </td>
                <td class="py-4 px-6">
    
                    <a href="<?=URLROOT?>/client/deleteproduct/<?=$cart->id_product?>?>" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
   
</div>
<a href="<?=URLROOT?>/client/confirm/"  class="m-auto m-5 text-white bg-purple-900 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Confirmer</a>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>