<?php
session_start();
session_destroy();
header("Location: /santi_assessment/login.php");
exit();
?>