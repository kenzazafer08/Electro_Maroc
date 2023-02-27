<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="h-[500px] flex justify-center items-center">
<div class="w-full h-full flex justify-around items-center">
    <div class="h-full w-1/3" > 
        <img class="m-10" src="<?=Imagepath?>/<?=$data['product']->image?>"/>
    </div>
    <div class=""> 
        <p class="font-bold text-2xl"><?=$data['product']->description?></p>
        <p class="font-light text-xl"><?=$data['product']->name?></p>
        <p class="font-light text-lG"><?=$data['product']->nom?></p>
        <p class="font-bold text-2xl text-red-800"><?=$data['product']->prix?> DH</p>
        <p class="p-10"></p>
        <a href="<?=URLROOT?>/client/Addtocart/<?=$data['product']->id?>" class="mt-10 w-1/4 px-6 py-2 mb-2 text-md text-white bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-shopping-cart"></i> Add to cart</a>
    </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>