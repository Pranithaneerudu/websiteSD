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

<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-2 items-center justify-center flex-col">
    <img class="lg:w-1/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://st.depositphotos.com/1003745/1387/v/380/depositphotos_13874474-stock-illustration-fuel-calc.jpg?forcejpeg=true">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Fuel Quote Generator</h1>
      <p class="mb-8 leading-relaxed">Generate the estimation of the fuel price and save the quotations as per the date and compare the prices. Application takes the email and password to save the records.</p>
      <div class="flex justify-center">
        <a  href="<?php echo base_url();?>login/sign_in" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" >Login</a>
        <a  href="<?php echo base_url();?>login/sign_up" class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Sign up</a>
        <a  href="<?php echo base_url();?>quote/profile" class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">Dashboard</a>
      </div>
    </div>
  </div>
</section>

</body>
</html>