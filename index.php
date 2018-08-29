<?php
$pass = isset($_POST['pass']) ? $_POST['pass'] : "";

if($pass == "17112018")
{
  include("wedding.html");
}
else
{
  include("login.html");
}
?>