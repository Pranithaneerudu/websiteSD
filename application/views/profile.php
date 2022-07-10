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
     <a class="mr-5 hover:text-gray-900" href="<?php echo base_url();?>">Home</a>
      <a class="mr-5 hover:text-gray-900" href="<?php echo base_url();?>quote/profile">Profile</a>
      <a class="mr-5 hover:text-gray-900" href="<?php echo base_url();?>quote/view_quote">Get Quote</a>
      <a class="mr-5 hover:text-gray-900" href="<?php echo base_url();?>quote/quote_history">Quote History</a>
    </nav>
    <a href="<?php echo base_url();?>login/logout" class="inline-flex items-center bg-green-600 border-0 py-1 px-3 focus:outline-none hover:bg-green-300 text-stone-50 rounded text-base mt-4 md:mt-0">Logout
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg>
    </a>
  </div>
</header>
<?php

echo $this->session->flashdata('profileupdate');

?>
<section class="text-gray-600 body-font relative">
  <form method="post">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Profile</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please complete the profile to view/save fuel Quotation</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="p-2 w-full">
          <div class="relative">
            <label for="name"  class="leading-7 text-sm text-gray-600" >Full Name</label>
            <input <?php if($data) {echo 'value="'.$data->name.'"';} ?> type="text" maxlength="50" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
          </div>
        </div>
        <div class="p-2 w-full">
          <div class="relative">
            <label for="addressone" class="leading-7 text-sm text-gray-600" >Address 1</label>
            <input id="addressone" <?php  if($data) {echo 'value="'.$data->address.'"';} ?> type="text"  maxlength="100" name="addressone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-10 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" required></input>
          </div>
        </div>
          <div class="p-2 w-full">
          <div class="relative">
            <label for="addresstwo" class="leading-7 text-sm text-gray-600">Address 2</label>
            <input id="addresstwo" <?php  if($data) { echo 'value="'.$data->address2.'"';} ?> type="text"  maxlength="100" name="addresstwo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-10 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></input>
          </div>
        </div>
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="city" class="leading-7 text-sm text-gray-600">City</label>
            <input type="text" <?php  if($data) { echo 'value="'.$data->city.'"';} ?> maxlength="100" id="city" name="city" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"  required >
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="state" class="leading-7 text-sm text-gray-600">State</label>
            <select name="state" id="state" size="1" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700  py-2 px-3 leading-8 transition-colors duration-200 ease-in-out" required>
            <option value="">Please select</option>
            <?php 

              foreach($states as $x=>$x_value)
              {
             
              if ($data->state === $x) {
                echo " <option selected value='" . $x . "' >" . $x_value."</option>";
              }
              else{
                echo " <option value='" . $x . "' >" . $x_value."</option>";
              }

              }
            ?>
       
            </select>
          </div>
        </div>
        <div class="p-2 w-1/3">
          <div class="relative">
            <label for="zip" class="leading-7 text-sm text-gray-600">Zip Code</label>
            <input <?php  if($data) { echo 'value="'.$data->zip.'"'; }?> type="text" maxlength="9" minlength="5" id="zip" name="zip" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
          </div>
        </div>
        </div>
        <div class="p-2 w-full">
          <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update Profile</button>
        </div>
       
      </div>
    </div>
  </div>
</form>
</section>
</body>
</html>