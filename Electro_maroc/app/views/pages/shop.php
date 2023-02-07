<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="w-full flex flex-col items-center justify-around">
    <div class="m-10 w-[90%] text-while flex justify-around items-center h-24">
<div class="">
    <label class="mr-2">Categories </label>
    <select id="categories" class="p-2 w-94 shadow-md focus:outline-none focus:ring-purple-300">
        <option>All </option>
		<?php foreach ($data['categorie'] as $categorie) : ?>

        <option value="<?=$categorie->id_cat?>"><?= $categorie->nom?></option>

		<?php endforeach ?>
    </select>
</div> 
<div class="">
    <label class="mr-2">Trié par </label>
    <select  id="Tri" class="p-2 shadow-md focus:outline-none focus:ring-purple-300">
        <option>Nouvauté</option>
        <option value="1">Prix bas a elevé</option>
        <option value="2">Prix elevé a bas</option>
    </select>
</div>
</div>
<div  class="min-h-[400px] w-[90%] flex flex-col items-center justify-center mb-8">
<div id="productsContainer"class="grid grid-cols-4 gap-y-10 w-full h-auto" >
    

    
	<?php foreach ($data['products'] as $product) : ?>
	<form action="<?=URLROOT?>/client/Addtocart/<?=$product->id?>" method="POST"><div class="w-64 h-94 rounded-sm flex flex-col justify-around border border:black items-center hover:shadow-2xl hover:duration-1000">
	<div class="text-xl font-bold text-center m-4 text-purple-900"><?=$product->name?></div>
		   <img src="<?=Imagepath?>/<?=$product->image?>" class="w-2/4 h-1/3"/>
		   <div class="text-center mx-2"><?=$product->description?></div>
		   <div class="font-extrabold text-center m-4 "><?=$product->prix?> DH</div>
           <input type="number" class="w-[20%] p-1" name="quantity" value="1">
           <div class="flex justify-center w-full m-0">
           <button type="submit" href="" class="w-1/4 px-6 py-2 mb-2 text-md text-white hover:bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-shopping-cart"></i></button>
           <a href="#_" class="w-1/4 px-6 py-2 mb-2 text-md text-white hover:bg-purple-800 hover:text-white text-purple-900 border border-white text-center rounded-xl"><i class="fa fa-heart"></i></a>
		</div></form>
		</div><?php endforeach ?>
	</div>
</div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>