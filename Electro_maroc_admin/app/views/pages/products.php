<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php echo '<span class="text-green-600 font-bold text-lg text-center mt-4">'.$data['delete'].'</span>' ?> 
<div class="overflow-x-auto w-full relative my-10 mx-5 w-[95%]">
    <table class="w-[98%] text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll-y">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>
                <th scope="col" class="py-3 px-6">
                    Categorie
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data['products'] as $product) :?> 
            <?php if($product->Pdelete == 1) :?>
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?=$product->name?>
                </th>
                <td class="py-4 px-6">
                <img src=" <?=Imagepath."/".$product->image?>" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                <?=$product->nom?>
                </td>
                <td class="py-4 px-6">
                <?=$product->prix?> DH
                </td>
                <td class="py-4 px-6">
                
</div>
<a href="<?=URLROOT?>dashboard/edit/<?=$product->id?>" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-edit"></i></a>
<a href="<?=URLROOT?>dashboard/delete/<?=$product->id?>" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>                    
                </td>
            </tr>
            <?php endif ?>
        <?php endforeach ?>    
   </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>