<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/sidebar.php'; ?>
<?php echo '<span class="text-green-600 font-bold text-lg text-center mt-4">'.$data['add'].'</span>' ?> 
<div class="flex justify-center items-center w-full h-screen">

<div class="bg-white rounded-2xl shadow-2xl w-[80%] h-[90%] flex flex-col justify-around items-center">

<form class="w-[90%]" action="<?=URLROOT?>dashboard/edit/<?=$data['id']?>" method="POST" enctype="multipart/form-data">
  <div class="relative z-0 mb-6 w-full group">
      <input type="text" name="name" value="<?=$data['name']?>" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-purple-500 focus:outline-none focus:ring-0 focus:border-purple-600 peer" placeholder=" " required />
      <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-purple-600 peer-focus:dark:text-purple-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Product Name</label>
  </div>
  <div class="relative z-0 mb-6 w-full group">
      <input type="text" name="disc" value="<?=$data['disc']?>" id="disc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-purple-500 focus:outline-none focus:ring-0 focus:border-purple-600 peer" placeholder=" " required />
      <label for="disc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-purple-600 peer-focus:dark:text-purple-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Discription</label>
  </div>
  <label class="block mb-2 text-sm font-medium text-gray-500 " for="small_size">Image</label>
  <input class="hidden" name="img" value="<?$data['image']?>"/>
<input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="small_size" name="image" type="file">

    <div class="relative z-0 mb-6 w-full group">
        <input type="text"  name="prix" value="<?=$data['prix']?> "id="prix" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-purple-500 focus:outline-none focus:ring-0 focus:border-purple-600 peer" placeholder=" " required />
        <label for="prix" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-purple-600 peer-focus:dark:text-purple-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Prix</label>
    </div>
<label for="cat" class="sr-only">Categorie</label>
  <select name="cat" class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500">
<option selected value="<?= $data['cat']  ?>"><?= $data['cat_name'] ?></option>
<?php foreach($data['categories'] as $categorie) :?>
    <?php if($data['cat_name'] !=  $categorie->nom ):?>
        <option value="<?= $categorie->id_cat ?>"><?= $categorie->nom; ?></option>
 <?php endif ?>
 <?php endforeach;?>
</select>
  <button type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>
</form>
<?php require APPROOT . '/views/inc/footer.php'; ?>