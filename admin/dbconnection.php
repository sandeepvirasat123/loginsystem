<?php
ob_start();
if(!mysql_connect("localhost","login-system","login-system"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("login-system"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
ob_end_clean();
?>