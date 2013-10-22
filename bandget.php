<html>
   <body>
      <?         
         $con = mysql_connect("localhost", "root", "srsbizman456") or die ("Could not connect: ".mysql_error());
         mysql_select_db("assignment2", $con) or die ("Could not connect: " . mysqli_error());
         if(isset($_GET['name']) && isset($_GET['year']))
         {
            $name = $_GET['name'];
            $year = $_GET['year'];
            
            $result = mysql_query("select distinct(players.name), players.birthDate, deathDate, city, state, country, playerID from players, bands where (players.name = bands.vocals OR players.name = bands.drums OR players.name = bands.guitar OR players.name = bands.keybaord OR players.name = bands.synthesizer OR players.name = bands.bass OR players.name = bands.percussion OR players.name = backingVocals OR players.name = bands. rhythmGuitar) AND (bands.startDate <=".$year." AND (bands.endDate = 0 OR bands.endDate >= ".$year.")) AND (bands.name = \"".$name."\");");
            $i = mysql_num_rows($result);
            
            echo($name . " : " . $year);
            if ($i == 0)
            {
               echo("<br/>No data available");
            }
            else
            {
               $JSON = "{\"members\":[";
               
               
               for($x = 0; $x < $i; $x++)
               {
                  $getMembers = mysql_fetch_array($result);
                  $JSON .= "{\"name\": \"".$getMembers['name']."\",\"birthDate\": \"".$getMembers['birthDate']."\",\"deathDate\": \"".$getMembers['deathDate']."\",\"city\": \"".$getMembers['city']."\",\"state\": \"".$getMembers['state']."\",\"country\": \"".$getMembers['country']."\"}";
                  if ($x+1 != $i)
                     $JSON .= ", ";               
               }
               
               $JSON .= "]}";
               $decodedJSON = json_decode($JSON, TRUE);
               $members = $decodedJSON['members'];
               
               for($x = 0; $x < $i; $x++)
               {
                  echo("<br/>" .$members[$x]['name']. ": Born on " . $members[$x]['birthDate'] . " in "
                  . $members[$x]['city']);
                  if ($members[$x]['state'] != null)
                  {
                     echo(", " . $members[$x]['state']);
                  }
                  echo(", " . $members[$x]['country']);
                  if ($members[$x]['deathDate'] != null)
                  {
                     echo(". Died on " . $members[$x]['deathDate'] . ".");
                  }
                  
               }
            }
         }
         mysql_close($con);
      ?>
   </body>
</html>
