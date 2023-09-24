<?php

/**
 * logout Page is responsible for 
 * 
 * logout user by unsetting session variable
 * 
 * and destroy the session.
 */
session_start();
session_unset();
session_destroy();
setcookie(session_name(),"",time()-3600,"/");

header("Location: ../../../index.php?action=logout");
