<?php require APPROOT . '/views/inc/style.php'; ?>
<body class="font-sans text-sm w-full">
  <div class=" w-full bg-purple-800 h-10 text-white flex justify-around items-center ">
    <div><i class="fa fa-phone"></i>+212634047964</div>
    <div><div class="hidden md:inline">Get 50% off on selected items</div> </div>
  </div>
  <div class="h-16 w-full bg-gray-100 drop-shadow-xl flex justify-around items-center ">
    <div class="flex justify-begin items-center text-purple-800 w-42 font-bold">
    <img src="<?=URLROOT?>/public/img/Electro.png" class="w-16 h-16"/><p>Electro Maroc</p></div>
    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800" type="button">Categorie<svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
<div id="dropdownDivider" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 animate-none" aria-labelledby="dropdownDividerButton">
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Informatique</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">TV-Photo-Video-Audio</a>
      </li>
      <li>
        <a href="#" class="blok py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Jeu & Consols</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Smartphones-tablettes</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Instrument Music</a>
      </li>
      <li>
        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Electromenager</a>
      </li>
    </ul>
</div>
    <div class="hidden md:flex justify-around align-center w-1/4">
    <a href="<?php echo URLROOT; ?>" class="text-black hover:text-purple-800">What's New</a>
    <a href="<?php echo URLROOT; ?>" class="text-black hover:text-purple-800">Deals</a>
    <a href="<?php echo URLROOT; ?>/pages/shop"> Shop now</a>
</div>
<div class="hidden md:flex justify-around align-center w-1/4 ">
    <a href="<?php echo URLROOT; ?>/pages/login" class="text-black hover:text-purple-800"><i class="fa fa-user-o"></i> Account</a>
    <a href="<?php echo URLROOT; ?>/pages/wishlist" class="text-black hover:text-purple-800"><i class="fa fa-heart"></i> Wishlist</a>
    <a href="<?php echo URLROOT; ?>/pages/cart" class="text-black hover:text-purple-800 ease-out duration-300"><i class="fa fa-shopping-cart"></i> Cart</a>
</div>
<div class="md:hidden">
<label class="text-purple-800 text-lg">☰</label>

</div>
</div>
  
