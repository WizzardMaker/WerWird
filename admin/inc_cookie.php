<?php
function hasIP($filePath, $ip = NULL){
    return false; //Nicht mehr gebraucht :(

    //$cookieFile = fopen($filePath, "r") or die("Kann die Datei $filePath nicht zum lesen öffnen!");
    //$content = fread($cookieFile,filesize($filePath));//fwrite($cookieFile,date("U"));//Zeit seit start der UNIX Epoche in Sekunden
    //fclose($cookieFile);
    //$fileLines = explode(PHP_EOL,$content);
    if($ip == NULL)
        $ip = $_SERVER["REMOTE_ADDR"];



    $fileLines = file($filePath);
    $cleanFile = true;

    foreach($fileLines as $line){
        $combine = explode("\t",$line);
        $tIp = $combine[0];
        $time = (int)$combine[1];

        $debug = $time - time();

        if($tIp == $ip){
            if($time - time() > -2700)
                return TRUE;
        }
        if($time - time() > -2700)
            $cleanFile = false;
    }

    if($cleanFile){
        $cookieFile = fopen($filePath, "w");
        fclose($cookieFile);
    }

    return false;
}

function removeIP($filePath, $ip = NULL){
    return false; //Nicht mehr gebraucht :(

    //$cookieFile = fopen($filePath, "r") or die("Kann die Datei $filePath nicht zum lesen öffnen!");
    //$content = fread($cookieFile,filesize($filePath));//fwrite($cookieFile,date("U"));//Zeit seit start der UNIX Epoche in Sekunden
    //fclose($cookieFile);
    //$fileLines = explode(PHP_EOL,$content);
    if($ip == NULL)
        $ip = $_SERVER["REMOTE_ADDR"];



    $fileLines = file($filePath);

    $file = "";

    foreach($fileLines as $line){
        $combine = explode("\t",$line);
        $tIp = $combine[0];

        if($tIp != $ip){
            $file+= $line;
        }
    }

    $cookieFile = fopen($filePath, "w");
    fwrite($cookieFile,$file);
    fclose($cookieFile);

    return;
}
?>