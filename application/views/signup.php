
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Fuel Quote generator</title>
  <link rel="shortcut icon" href="https://png.pngtree.com/png-vector/20190302/ourmid/pngtree-vector-fuel-station-icon-png-image_745318.jpg"/>

</head>
<body>
  <header class="text-gray-600 bg-blue-100 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a href="<?php echo base_url();?>" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">

       <img src="https://png.pngtree.com/png-vector/20190302/ourmid/pngtree-vector-fuel-station-icon-png-image_745318.jpg" class="w-10 h-10 text-white rounded-full">
      <span class="ml-3 text-xl">Fuel Quote Generation</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 flex flex-wrap items-center text-base justify-center">
    </nav>
    <a href="<?php echo base_url();?>login/sign_in" class="inline-flex items-center bg-green-600 border-0 py-1 px-3 focus:outline-none hover:bg-green-300 text-stone-50 rounded text-base mt-4 md:mt-0">Login
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </a>
  </div>
</header>
<?php

echo $this->session->flashdata('unabletosignup');

?>
<section class="text-gray-600 body-font">
  <form method="post">
  <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
    <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0">
      <h1 class="title-font font-medium text-3xl text-gray-900">Client Registation
      <p class="leading-relaxed mt-4">Register the account to save and get the quotation</p>
    </div>
    <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0">
      <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
        <input type="password" minlength="6" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="passwordConfirm" class="leading-7 text-sm text-gray-600">Confirm Password</label>
        <input type="password" minlength="6" id="passwordConfirm" name="passwordConfirm" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create Account</button>
      <p class="text-xs text-gray-500 mt-3">Already have account?</p> <a href="<?php echo base_url();?>login/sign_in">Login here</a>
    </div>
  </div>
  </form>
</section>

</body>
</html>
