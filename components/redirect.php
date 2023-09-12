<?php
class Redirect {
    public static function redirectGET($target_url, $parameters = []) {
        $url = $target_url;
        if (!empty($parameters)) {
            $url .= '?' . http_build_query($parameters);
        }
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
    }

    public static function redirectPOST($target_url, $parameters = []) {
        echo '<html><body onload="document.forms[0].submit()">';
        echo '<form action="'.$target_url.'" method="post">';
        foreach ($parameters as $key => $value) {
            echo '<input type="hidden" name="'.$key.'" value="'.$value.'">';
        }
        echo '</form></body></html>';
    }
}
?>