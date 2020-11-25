<?php
    function e(string $str, string $charset='UTF-8'):string{
        return htmlspecialchars($str, ENT_QUOTES|ENT_HTML5, $charset);
    }
    function d(string $str):string{
        return htmlspecialchars_decode($str, ENT_QUOTES|ENT_HTML5);
    }
    function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
?>