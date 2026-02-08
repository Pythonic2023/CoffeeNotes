<?php 
    function convertstring($value) {
        return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
    }
?>