<?php
importDataToDB();
function importDataToDB()
{
  echo("<html><body>");
  $con = mysql_connect("localhost", "root", "srsbizman456") or die ("Could not connect: " . mysql_error());
  mysql_select_db("assignment2", $con) or die ("Could not connect: " . mysqli_error());

  $json_string = 'http://54.200.112.242/bandDB/bands.json';
  $json = file_get_contents($json_string);
  
  $result = json_decode($json, TRUE);
  
  $i = 0;
  $bands = $result['bands'];
  foreach($bands as $value) 
  {
	  mysql_query("INSERT INTO bands VALUES (".$value[$i]['Band'].",\"" 
	  .$value[$i]['startDate']."\",\"" 
	  .$value[$i]['endDate']."\",\""
	  .$value[$i]['Vocals']."\",\"" 
	  .$value[$i]['Guitar']."\",\"" 
	  .$value[$i]['Keyboard']."\",\"" 
	  .$value[$i]['Synthesizer']."\",\"" 
	  .$value[$i]['Bass']."\",\"" 
	  .$value[$i]['Drums']."\",\"" 
	  .$value[$i]['Percussion']."\",\"" 
	  .$value[$i]['Backing Vocals']."\",\"" 
	  .$value[$i]['Rhythm Guitar']."\");"); 
	  
	  $i = $i + 1;
  }
  
  mysql_close($con);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
