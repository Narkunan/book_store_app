<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['userid']);
session_unset();
session_destroy();
setcookie(session_name(),"",time()-3600,"/");

header("Location: ../../../public/assets/html/first.php");
