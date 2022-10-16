<?php
include_once('session.php');
if(isset($_SESSION['message'])){
    // echo "<h5>".$_SESSION['message']."</h5>";
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
elseif(isset($_SESSION['messageLogin'])){
    echo $_SESSION['messageLogin'];
    unset($_SESSION['messageLogin']);
}