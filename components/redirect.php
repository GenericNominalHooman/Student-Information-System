<?php
class Redirect{
    public static function redirectGET($url){
        header("Location: ".$url);
    }
}
?>