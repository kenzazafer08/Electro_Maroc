<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="w-full h-[450px] flex justify-center">
     <div class="h-auto w-[90%] shadow-lg overflow-y-scroll m-10 flex flex-col items-center ">
        <p class="text-black font-bold w-full text-center my-6">My Orders</p>
        
<div class="overflow-x-auto w-full relative ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Products
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
                <th scope="col" class="py-3 px-6">
                    Etas
                </th>
                <th scope="col" class="py-3 px-6">
                    details
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $order) :?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                 <?php foreach($order['products'] as $product) :?>
                  <?=$product['name'] ?></br>
                    <?php endforeach ?>
                </th>
                <td class="py-4 px-6">
                <?=$order['date']?>
                </td>
                <td class="py-4 px-6">
                <?=$order['total']?> DH
                </td>
                <td class="py-4 px-6">
                    <?php if($order['etas'] == null){?>
                        <span class="font-bold text-gray-600">ON HOLD</span>
                    <?php }else if($order['etas'] == 0){?>
                        <span class="font-bold text-red-600">ANNULER</span>
                    <?php }else{ ?>
                        <span class="font-bold text-green-600">Valider</span>
                    <?php } ?>
                </td>
                <td class="py-4 px-6">
                <a href="<?=URLROOT?>/client/detailorder/<?=$order['id']?>" class="w-1/4 px-6 py-2 mb-2 text-md text-white bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-info"></i></a>
                </td>
            </tr>
            <?php endforeach?>

        </tbody>
    </table>
</div>

     </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>