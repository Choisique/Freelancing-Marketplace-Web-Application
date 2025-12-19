<?php
session_start();
include_once("./includes/auth-functions.php");
remove_authenticated_user();
protect_page();
?>