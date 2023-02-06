<?php require_once APPROOT . '/views/inc/header.php'; ?>
<div class="flex flex-col bg-[url('<?php echo URLROOT; ?>/public/img/bg.jpg')] bg-cover bg-center pt-20 justify-around items-center w-full h-[550px] ">
<div class="flex flex-col items-center justify-between ">  
	
	<h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-100 md:text-5xl lg:text-6xl ">Electronics takes it to another level</h1>
<p class="mb-6 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 text-center w-2/3">In <span class="text-purple-700">Electro Maroc</span>  you can find all the electronic product that u need to experience a better life with the best prices.</p>
<a href="<?php echo URLROOT; ?>/pages/shop" class="w-32 h-12 bg-purple-900 text-white rounded-xl text-center pt-3 hover:text-purple-800 hover:border border-purple-900 hover:bg-white mb-8">Shop Now</a>
</div> 
</div>
</div>
<h2 class="text-4xl font-extrabold text-purple-800 text-center m-12">New Products December 2022</h2>
<div class="grid grid-cols-4 ml-4 mb-8 gap-4 gap-y-10 w-full h-auto" >
	<?php foreach($data['products'] as $product) :?>
	<div class="w-64 h-80 rounded-sm flex flex-col justify-around border border:black items-center hover:shadow-2xl hover:duration-1000">
		<div class="text-xl font-bold text-center m-4 text-purple-900"><?=$product->name?></div>
		   <img src="<?=Imagepath?>/<?=$product->image?>" class="w-2/4 h-1/3"/>
		   <div class="text-center mx-2"><?=$product->description?></div>
		   <div class="font-extrabold text-center m-4 "><?=$product->prix?> DH</div>
		</div>
		<?php endforeach ?>
</div>
<div class="bg-gray-200 h-[500px] w-full flex justify-around items-center">
<div class="flex flex-col justify-center w-[75%]">
<h2 class="text-4xl font-extrabold text-black text-center m-12">Best Deals</h2>
<p class="mb-6 text-lg font-normal text-black lg:text-xl sm:px-16 xl:px-48 text-center">On the occasion of the <span class="text-purple-700">New year</span>, we offer you the best deals on electronic products. 50% discount on our best products.</p>
<div class="flex w-full justify-center"><a href="<?php echo URLROOT; ?>/pages/shop" class="w-32 h-12 bg-purple-900 text-white rounded-xl text-center pt-3 hover:text-purple-800 hover:border border-purple-900 hover:bg-white mb-8">Discover More</a></div> 
</div>
  <div class="h-3/4 w-2/4 ">

  <div id="animation-carousel" class="relative" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-200 ease-linear" data-carousel-item>
            <img src="././public/img/gaufrier.png" class="absolute block w-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-200 ease-linear" data-carousel-item>
            <img src="././public/img/seche.png" class="absolute block w-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-200 ease-linear" data-carousel-item="active">
            <img src="././public/img/console.png" class="absolute block w-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-200 ease-linear" data-carousel-item>
            <img src="././public/img/casque.png" class="absolute block w-2/3 -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

