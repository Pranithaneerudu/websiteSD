<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
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
<div class="flex flex-col text-center w-full pt-10 pb-1">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Quote History</h1>
</div>

<div class="flex flex-col text-center w-full mb-12 px-10 py-5 bg-slate-50">
  <table id="history" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead>
          <tr>
            <th data-priority="1">Sno</th>
            <th data-priority="2">Date</th>
            <th data-priority="3">Gallons</th>
            <th data-priority="4">Price</th>
            <th data-priority="5">Amount Due</th>
            <th data-priority="5">Address</th>
          </tr>
        </thead>
        <tbody>

          <?php

          foreach($data as $x=>$x_value)
          {
           echo '<tr>';
            echo '<td>'.$x_value['sno'].'</td>';
            echo '<td>'.$x_value['date'].'</td>';
            echo '<td>'.$x_value['gallons'].'</td>';
            echo '<td>'.$x_value['price'].'</td>';
            echo '<td>'.$x_value['amount_due'].'</td>';
            echo '<td>'.$x_value['address'].'</td>';
            echo '</tr>';
          }

          ?>
         
        </tbody>
      </table>
</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
      var table = $('#history').DataTable({
          responsive: true
        })
        .columns.adjust()
        .responsive.recalc();
    });
  </script>
</html>