<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $con = mysql_connect("localhost", "root", "srsbizman456") or die ("Could not connect: " . mysql_error());
  mysql_select_db("assignment2", $con) or die ("Could not connect: " . mysql_error());

  $json_string = 'http://54.200.112.242/bandDB/bands.json';
  $json = file_get_contents($json_string);
  
  $result = json_decode($json, TRUE);
  
  $i = 1;
  $bands = $result['menu']['cakes'];
  $frosting = $result['menu']['frosting'];
  $fillings = $result['menu']['fillings'];
  $toppings = $result['menu']['Toppings'];
  foreach($cake as $value) 
  {
	  mysql_query("INSERT INTO flavor (flavorID, flavorName, picLoc) VALUES (".$i.",\"" 
	  .$value['flavor']."\",\"" 
	  .$value['img_url']."\");");
	  $i = $i + 1;
  }
  $i = 1;
  foreach($frosting as $value) 
  {
	  mysql_query("INSERT INTO icing (icingID, icingName, picLoc) VALUES (".$i.",\"" 
	  .$value['flavor']."\",\"" 
	  .$value['img_url']."\");");
	  $i = $i + 1;
  }
  $i = 1;
  foreach($fillings as $value) 
  {
	  mysql_query("INSERT INTO filling (fillingID, fillingName, rgbVal) VALUES (".$i.",\"" 
	  .$value['flavor']."\",\"" 
	  .$value['rgb']."\");");
	  $i = $i + 1;
  }
  $i = 1;
  foreach($toppings as $value) 
  {
	  mysql_query("INSERT INTO topping (toppingID, toppingName) VALUES (".$i.",\"" 
	  .$value."\");");
	  $i = $i + 1;
  }
  mysql_close($con);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
