<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<div class="overflow-x-auto w-full relative m-10 w-[95%]">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-scroll-y">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Phone
                </th>
                <th scope="col" class="py-3 px-6">
                    Adress
                </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data['clients'] as $client) :?> 
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?=$client->Nom?>
                </th>
                <td class="py-4 px-6">
                <?=$client->tele?>
                </td>
                <td class="py-4 px-6">
                <?=$client->email?>
                </td>
                <td class="py-4 px-6">
                <?=$client->Adress?>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>