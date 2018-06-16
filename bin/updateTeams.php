<?php
$flagFile = "../data/flags.json";
$teamFile = "../data/teams.json";


$rawTeam = file_get_contents($teamFile);
$rawFlag = file_get_contents($flagFile);

$flags = json_decode($rawFlag, true);
$teams = json_decode($rawTeam, true);

if(isset($_GET['flag'])){
    $capFlag = $_GET['flag'];

    if(array_key_exists($capFlag, $flags)){
        echo $capFlag . "\n";
        $flagVal =  $flags[$capFlag]['points'];
        echo $flagVal . "\n";
        
        #var_dump($teams);
        
        $teams[$_GET['team']]['score'] += $flagVal;
        
        if(!array_key_exists($teams[$_GET['team']]['flags'])){
            $teams[$_GET['team']]['flags'] = array();
        }

        array_push($teams[$_GET['team']]['flags'], $capFlag);
        #echo $teams[$_GET['team']]['score'] . "\n";

        $rawIn = json_encode($teams);
        file_put_contents($teamFile, $rawIn);
        header("Location: ../index.php");
    }
    else{
        echo "Error that isn't a flag, idiot";
        sleep(5);
        header("Location: ../index.php");
    }
}

?>
