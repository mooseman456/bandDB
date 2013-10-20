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
     echo($bands[$i]['Band']."<br>");
	  mysql_query("INSERT INTO bands (name, startDate, endDate, vocals, guitar, keybaord, synthesizer, bass, drums, percussion, backingVocals, rhythmGuitar) VALUES (\"".$bands[$i]['Band']."\",\"" 
	  .$bands[$i]['startDate']."\",\"" 
	  .$bands[$i]['endDate']."\",\""
	  .$bands[$i]['Vocals']."\",\"" 
	  .$bands[$i]['Guitar']."\",\"" 
	  .$bands[$i]['Keyboard']."\",\"" 
	  .$bands[$i]['Synthesizer']."\",\"" 
	  .$bands[$i]['Bass']."\",\"" 
	  .$bands[$i]['Drums']."\",\"" 
	  .$bands[$i]['Percussion']."\",\"" 
	  .$bands[$i]['Backing Vocals']."\",\"" 
	  .$bands[$i]['Rhythm Guitar']."\");"); 
	  
	  $i = $i + 1;
  }
  
  
  echo("HELLO!<br>");
  mysql_close($con);
  /*include 'simplexlsx.class.php';
  $xlsx = new SimpleXLSX('http://54.200.82.84/Kustom-Kupcake/data/CustomCupcakesDBData-FavoriteCupcakes.xlsx');
  echo( $xlsx->rows() );*/
  echo("Success!</body></html>");
}
?>
