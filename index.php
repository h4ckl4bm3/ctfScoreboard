<?php
include_once "bin/updateTeams.php";
$flagFile = file_get_contents("data/flags.json", TRUE);
$teamFile = file_get_contents("data/teams.json");

$flags = json_decode($flagFile, true);

$teams = json_decode($teamFile, true);
?>


<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CTF Scoring</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/main.css" />
    </head>
    <body>
    <table style="width:100%">
  <tr>
    <th class="menu">Choose Something</th>
    <th>Enter your captured flag.</th>
    <th>Check the score</th>
  </tr>
  <tr  class="main">
    <td class="navbar"><a href="index.php"> Home </a></td>
    <td>
        Just put your name in the box and the flag you captured and watch as you magically rack up points!
        <br>
        <hr>
        
        <form action="bin/updateTeams.php">
        Team name:<br>
        <input type="text" name="team" value=""><br><br>
        Flag:<br>
        <input type="text" name="flag" value=""><br><br>
        <input type="submit" value="Submit">
        </form>
    </td>
    <td class="score">
        <table align="center">
            
            <?php
                $i = 1;
                foreach($teams as $group => $stats){
                    echo "<th class='scoreboard'> Team " . $i . ": " . $group . "</th></tr>\n";
                    echo "<tr><td class='scoreboard'>Score: " . $stats["score"] . "</td></tr>\n";
                    echo "<tr><td class='scoreboard'>Flags: " . count($stats["flags"]) . "</td></tr>\n";
                    $i++;
                }
            ?>
                
          
        </table>
    </td>
  </tr>
  <tr>
    <td>Hack This Lab</td>
    <td>A Purple Team Production</td>
  </tr>
</table>         
    </body>
</html>