<?php require APPROOT . '/views/inc/style.php'; ?>
<body class="font-sans text-sm w-full">
  <div class=" w-full bg-purple-800 h-10 text-white flex justify-around items-center">
    <div><i class="fa fa-phone"></i>+212634047964</div>
    <div><div class="hidden md:inline">Get 50% off on selected items</div> </div>
  </div>
  <div class="h-16 w-full bg-gray-100 drop-shadow-xl flex justify-around items-center">
    <a href="<?=URLROOT?>/"><div class="flex justify-begin items-center text-purple-800 w-42 font-bold ">
    <img src="<?=URLROOT?>/public/img/Electro.png" class="w-16 h-16 "/><p>Electro Maroc</p></div></a>
<div class="hidden md:flex justify-around align-center w-1/4 ">
<a href="<?php echo URLROOT; ?>/client/shop" class="text-black hover:text-purple-800">Shop</a>
    <a href="<?php echo URLROOT; ?>/client/cart" class="text-black hover:text-purple-800 ">Cart</a>
    <a href="<?php echo URLROOT; ?>/client/orders" class="text-black hover:text-purple-800 ">Orders</a>
</div>
<?php if(!isset($_SESSION['username'])): ?>
  <a href="<?=URLROOT?>/pages/login" class="mr-4 text-black hover:text-purple-800"><i class="fa fa-user-o"></i> Log In</a>
<?php else : ?>
<a href="<?=URLROOT?>/pages/logout" class="mr-4 text-black hover:text-purple-800"><i class="fa fa-sign-out"></i> <?=$_SESSION['username']->email?></a>
<?php endif ?>
</div>
  
