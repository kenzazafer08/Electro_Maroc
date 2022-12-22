<?php require APPROOT . '/views/inc/style.php'; ?>
<body class="font-sans text-sm w-full">
  <div class=" w-full bg-purple-800 h-10 text-white flex justify-around items-center ">
    <div><i class="fa fa-phone"></i>+212634047964</div>
    <div><div class="hidden md:inline">Get 50% off on selected items |</div><a href="<?php echo URLROOT; ?>"> Shop now</a></div>
  </div>
  <div class="h-16 w-full bg-gray-100 drop-shadow-xl flex justify-around items-center ">
    <div class="flex justify-begin items-center text-purple-800 w-42 font-bold">
    <img src="<?=URLROOT?>/public/img/Electro.png" class="w-16 h-16"/><p>Electro Maroc</p></div>
    <div class="hidden md:flex justify-between align-center w-1/4">
      <select class="focus:ring-purple-500 focus:border-purple-500 bg-transparent text-gray-900 border-transparent text-sm rounded-lg w-24 hover:text-purple-800">
      <option selected>Products</option>
      <option>Informatique</option>
      <option>TV-Photo-Video-Audio</option>
      <option>Jeu & Consols</option>
      <option>Smartphones-tablettes</option>
      <option>Instrument Music</option>
      <option>Electromenager</option>
    </select>
    <a href="<?php echo URLROOT; ?>" class="text-black hover:text-purple-800">What's New</a>
    <a href="<?php echo URLROOT; ?>" class="text-black hover:text-purple-800">Deals</a>
</div>
<div class="hidden md:flex justify-around align-center w-44 ">
    <a href="<?php echo URLROOT; ?>/pages/login" class="text-black hover:text-purple-800"><i class="fa fa-user-o"></i> Account</a>
    <a href="<?php echo URLROOT; ?>/pages/login" class="text-black hover:text-purple-800"><i class="fa fa-lock"></i> Admin</a>
</div>
<div class="md:hidden">
<label class="text-purple-800 text-lg">☰</label>

</div>
</div>
  
