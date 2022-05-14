<?php
    function view_trans(){
        global $con;
        $affiche = $con->query("SELECT * FROM transaction");
        return $affiche;
    }
?>