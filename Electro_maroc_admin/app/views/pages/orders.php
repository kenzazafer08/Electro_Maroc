<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="overflow-x-auto w-full relative m-10 w-[95%]">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll-y">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Client
                </th>
                <th scope="col" class="py-3 px-6">
                    Liste de produit
                </th>
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
                <th scope="col" class="py-3 px-6">
                    Validation
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data['orders'] as $order):?>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?=$order->Nom?>
                </th>
                <td class="py-4 px-6">
                <ul>
                    <?php foreach($data['products'] as $product): ?>
                    <?php if($product->id_commande == $order->id_order ): ?>
                    <li><?= $product->name?></li>
                    <?php endif ?>
                    <?php endforeach ?>
                    
                </ul>
                </td>
                <td class="py-4 px-6">
                <?=$order->prix_total?>
                </td>
<?php if($order->etas == null):?>
                <td class="py-4 px-6">
<a href="<?=URLROOT?>dashboard/valid/<?=$order->id_order?>" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-edit"></i></a>
<a href="<?=URLROOT?>dashboard/annuler/<?=$order->id_order?>" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>                    
          </td>
         <?php elseif($order->etas == 1) :?> 
            <td class="py-4 px-6">
                <span class="text-green-500">Valider</span>
         </td>
         <?php else: ?>
            <td class="py-4 px-6">
                <span class="text-red-500">Annuler</span>
         </td>
        <?php endif ?> 
            </tr>
        <?php endforeach?>
   </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>