<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="w-full h-[450px] flex justify-center">
     <div class="h-auto w-[90%] shadow-lg overflow-y-scroll m-10 flex flex-col items-center ">
        <p class="text-black font-bold w-full text-center my-6">My wishlist <span class='text-purple-800 underline '> 4 items</span></p>
        
<div class="overflow-x-auto w-full relative ">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Consoles
                </th>
                <td class="py-4 px-6">
                <img src="<?=URLROOT?>/public/img/console.png" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Consoles
                </th>
                <td class="py-4 px-6">
                <img src="<?=URLROOT?>/public/img/console.png" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Consoles
                </th>
                <td class="py-4 px-6">
                <img src="<?=URLROOT?>/public/img/console.png" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                Consoles
                </th>
                <td class="py-4 px-6">
                <img src="<?=URLROOT?>/public/img/console.png" class="w-[100px] h-[100px] rounded-full"/>
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-shopping-cart"></i></a>
                    <a href="#" class="font-medium text-purple-600 hover:underline p-4"><i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

     </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>