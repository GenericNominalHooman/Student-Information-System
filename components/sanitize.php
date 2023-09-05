<?php
class Sanitize{
    public static function sanitize($input){
        return htmlspecialchars($input);
    }
}
?>