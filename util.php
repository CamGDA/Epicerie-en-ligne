<?php
 
class util {

    function redirectWithError($uri, $errorMsg) {
        $_SESSION['er_msg'] = $errorMsg;
        header ('Location: ' . $uri);
        exit;
    }

    function redirect($uri) {
        header ('Location: ' . $uri);
        exit;
    }

    function dd($str) {
        echo '<pre>';
        var_dump($str);
        echo '</pre>';
        die;
    }

}

$util = new util();

?>