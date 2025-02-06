<?php

// For Web
/*
define("HOST", 'localhost');
define("DBNAME", 'u671364904_HMS1');
define("DBUSER", 'u671364904_HMSU');

   define("DBPASS", '_!Paki$tan@123#');
// define("DBPASS", "_!Paki$tan@123#");   //  This line create error due to use of dollar sign in double quote 
*/
// For Localhost

define("HOST", "localhost");
define("DBNAME", "hospital");
define("DBUSER", "root");
define("DBPASS", "");



function conn()
{
  $cn = mysqli_connect(HOST, DBUSER, DBPASS) or
    die("<h2>This website is currently under construction</h2>");
  mysqli_select_db($cn, DBNAME);
  return $cn;
}
function DisConn()
{
  $cn = conn();
  mysqli_close($cn);
}
