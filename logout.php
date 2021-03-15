<?php
/**
 * 
 * @package Login With Sngine
 * @author pvspike
 * @download https://github.com/pvspike/Login-With-Sngine
 */

############ Session Destroy  ############
session_start();
session_destroy();
header("Location:index.php");
?>