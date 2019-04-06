<?php
require_once("Session.php");

Session::connect();
var_dump($_SESSION);

require("index.html");
?>