<?php
    include_once(realpath(__DIR__."/../conf/default.php"));
    session_destroy();
    header("Location: ./../index.php");
    die;
?>