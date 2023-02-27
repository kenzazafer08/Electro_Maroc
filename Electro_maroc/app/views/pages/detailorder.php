<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="h-min-screen flex justify-center items-center w-ful ">
<div class="mt-10 h-[90%] flex flex-col justify-around border-1.5 border-gray-800 shadow-sm w-[80%] hover:shadow-sm">
    <div class="mt-20 flex w-full justify-around items-center" > 
        <div class="font-bold text-2xl">Your Infomrations :
        <p class="font-light text-sm">Name : <?=$data['Nom']?></p>
        <p class="font-light text-sm">Phone : <?=$data['tele']?></p>
        <p class="font-light text-sm">Email : <?=$data['email']?></p>
        <p class="font-light text-sm">Adress : <?=$data['Adress']?></p></div>
        <div class="font-bold text-2xl">Order status :
        <?php if($data['etas'] == NULL) { 
       echo' <p class="font-light text-sm">Etas : <span class="text-gray-800">On hold</span></p>';
        }elseif($data['etas'] == 1)  {
           echo' <p class="font-light text-sm">Etas : <span class="text-green-800"> Valid</span></p>';
         }else { 
            echo '<p class="font-light text-sm">Etas : <span class="text-red-800">ANNULER</span></p>';
         } ?>
        <p class="font-bold text-xl text-red-800">Total : <?=$data['total']?> DH</p>
        <p class="text-sm font-light"> Date : <?=$data['date']?></p>
    </div></div>
<div class="">  
        <table class="mt-10 min-h-[200px] w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Quantité
                </th>
                <th scope="col" class="py-3 px-6">
                    Prix quantité
                </th>
            </tr>
        </thead>
        <tbody id="products">
            
            <?php foreach ($data['products'] as $product) : ?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
               <?=$product['name']?>
                </th>
                <td class="py-4 px-6">
                <img src="<?=Imagepath?>/<?=$product['image']?>" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                <?=$product['quantity']?>
                </td>
                <td class="py-4 px-6">
                <?=$product['prix']?> DH
                </td>
            </tr>
            <?php endforeach ?>
            
        </tbody>
    </table>
</div>
<div class="my-10 flex w-full justify-around items-center font-bold"><a href="<?=URLROOT?>/client/shop/"  class="m-auto m-5 text-white bg-purple-900 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Ok</a></div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>