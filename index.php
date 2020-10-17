<style>

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
    padding: 5px 32px;
}

input:not([type="submit"]) {
    width: 10%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid orange;
    border-radius: 4px;
}
</style>

<?php
@session_start();
error_reporting(0);
ini_set('display_errors', 0);
define("check_access", "check");

if(isset($_GET["page"]) && !empty($_GET["page"]))
{
	if( strpos(strtolower($_GET["page"]), "secret") !== false)
    {
    	die("<font color='red' size='5'>(￣^￣)ゞ Hi Comrade, Something Wrong!</font>");
    }
	include($_GET["page"].".php");
}
else
{
	header("Location: ?page=home");
}

?>