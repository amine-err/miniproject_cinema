<?php
session_start();
if (isset($_SESSION['admin'])) {
    $_SESSION['admin']=array() ; 
    session_destroy() ; 
    header("location: ../") ;
}
else{
    header("location: ../login.php") ; 
}
?>