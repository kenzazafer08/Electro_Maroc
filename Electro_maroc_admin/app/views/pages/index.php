<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="w-full h-screen bg-[url('<?=URLROOT?>/public/img/bg.jpg')] bg-cover bg-center flex flex-col items-center justify-center">
    <div class="w-[70%] h-[80%] bg-white rounded-lg shadow-2xl shadow-black flex"> 
        <div class="w-1/2 h-full bg-[url('<?=URLROOT?>/public/img/bg.jpg')] bg-cover flex flex-col items-center justify-around">
        <h2 class="text-4xl font-extrabold text-white text-center ">Electro Maroc Administration🖐 </h2>
        
        </div>
        <div class="w-1/2 h-full bg-white bg-cover flex flex-col items-center justify-around">
           
<form class="w-2/3" action="<?=URLROOT?>/Login/" method="POST">
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
    <input type="email" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="name@gmail.com" >
    <?php echo $data['username_err']?>
  </div>
  <div class="mb-6">
    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
    <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" >
    <?php echo $data['username_err']?>
  </div>

  <button type="submit" class="text-white bg-purple-900 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Log In</button>
</form>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>