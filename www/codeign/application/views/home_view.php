<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>IPRO 343</title>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/home.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/data.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/history.css">
  
  <script src="<?php echo base_url(); ?>js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/batterytabs.jquery.js"></script>
  <script src="<?php echo base_url(); ?>js/data_graph.js"></script>
  <!--<script type="text/javascript" src = "<?php echo base_url(); ?>js/flot-example.js"></script>-->
  <script type="text/javascript" src = "<?php echo base_url(); ?>js/flot/jquery.flot.min.js"></script>
  <script type="text/javascript" src = "<?php echo base_url(); ?>js/flot/jquery.flot.pie.min.js"></script>
  
  <script>
  $(function() {

    $("#main-div").batteryTabs();
    
  });

  var CI = { 'base_url': '<?php echo base_url(); ?>'};
  </script>
</head>
<!--background= "<?php //echo base_url(); ?>/powerhouse.png"-->
<body>

 <!--
 <div id="page-wrap">-->

  <h1 align="center" background-image= "<?php echo base_url(); ?>/powerhouse.png"></h1>



  <div id="main-div">

    <ul class="nav">
      <li class="nav-one"><a href="#home" class="current">Battery Home</a></li>
      <li class="nav-two"><a href="#data">Realtime data</a></li>
      <li class="nav-three"><a href="#history">History</a></li>
      <li class="nav-four last"><a href="#settings">Settings</a></li>
    </ul>

    <div id = "wrap-div" class="list-wrap" >

      <ul id="home">
        <table id = "current-data">
          <thead>
              <tr>  
                 <th scope="col">Battery</th>       
                 <th scope="col">DC Voltage</th>
                 <th scope="col">DC Current</th>
                 <th scope="col">Power</th>
                 <th scope="col">Temperature(F)</th>
              </tr>   
          </thead>
          <tbody>
          <tr>
              <td>Cell 1</td>
              <td id="v1">14V</td>
              <td id="i1">1 A</td>
              <td id="p1">14 W</td>
              <td id="t1">99</td>
          </tr>
          <tr>
              <td>Cell 2</td>
              <td id="v2">14V</td>
              <td id="i2">1 A</td>
              <td id="p2">14 W</td>
              <td id="t2">99</td>
          </tr>
          <tr>
              <td>Cell 3</td>
              <td id="v3">14V</td>
              <td id="i3">1 A</td>
              <td id="p3">14 W</td>
              <td id="t3">99</td>
          </tr>
          </tbody>  
        </table>
</head>
<body>
      </ul>

      <ul id="data" class="hide">
        <p>This will show visaul realtime information of the system and batteries</p>
        <div id= "data-1" class="graph-area"></div>
        <div id= "data-2" class="graph-area"></div>
        <div id= "data-3" class="graph-area"></div>
      </ul>

      <ul id="history" class="hide">
        <p>View the system history</p>
        <table id="battery-hist">
          <caption><b>Battery Install/Removal History</b></caption>
          <tr>
            <td>Battery ID</td>          
            <td>Install date</td>
            <td>Remove date</td>
            <td>Time active</td>
            <td>Notes</td>
          </tr>

          <tr>
            <td>Battery1001</td>
            <td>9/24/2010</td>
            <td>9/24/2012</td>
            <td>2 years</td>
            <td>Battery burned out</td>
          </tr>

          <tr>
            <td>Battery2001</td>
            <td>8/24/2010</td>
            <td>9/25/2010</td>
            <td>1 day </td>
            <td>Wrong battery</td>
          </tr>

          <tr>
            <td>Battery13001</td>
            <td>9/24/2010</td>
            <td>N/A</td>
            <td>2 years</td>
            <td>Due for replacement</td>
          </tr>

          <tr>
            <td>Battery1004</td>
            <td>9/24/2010</td>
            <td>N/A</td>
            <td>2 years</td>
            <td>Battery is not holding full charge</td>
          </tr>
        </table>

        
        <table id="System-hist">
          <caption><b>System History</b></caption>
          <tr>
            <td>Event</td>          
            <td>Start date</td>
            <td>End date</td>
            <td>Duration</td>
            <td>Notes</td>
          </tr>

          <tr>
            <td>Charge</td>
            <td>9/24/2010</td>
            <td>9/24/2010</td>
            <td>10 Hrs</td>
            <td>Intial Charge</td>
          </tr>

          <tr>
            <td>Discharge</td>
            <td>10/24/2010</td>
            <td>10/24/2010</td>
            <td>4 Hrs </td>
            <td>Power Outage</td>
          </tr>

          <tr>
            <td>Charge</td>
            <td>01/01/2011</td>
            <td>1/02/2011</td>
            <td>7 Hrs</td>
            <td>Normal Charge</td>
          </tr>

          <tr>
            <td>DisCharge</td>
            <td>04/01/2013</td>
            <td>04/01/2013</td>
            <td>2 Hrs</td>
            <td>Selling Power</td>
          </tr>
        </table>
      </ul>

      <ul id="settings" class="hide">
        <p>Settings-mainly for the technician</p>
        <li></li>
        <li>Update Contact Info</li>
        <li>send alerts to phone/Email</li>
        <li>?</li>
        <li>?</li>
        <li>?</li>
      </ul>

    </div> <!-- END List Wrap -->

  </div>

  <!--</div>-->
  
</body>

</html>