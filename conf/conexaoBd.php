<?php
    require_once(realpath(__DIR__."/../define/define.php"));

    /*$sql = ""; 
    $query = mysqli_query($link, $sql);
    $consulta = mysqli_fetch_array($query);
    $maximus = $consulta[0];
    */

    function OpenConnectBd(){
        $link = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
        mysqli_set_charset($link, DB_CHARSET) or die(mysqli_error($link));
        return $link;
    }

    function CloseConnectBd($linkToClose){
        mysqli_close($linkToClose) or die(mysqli_error($linkToClose));
    }

?>