<?php
// logout
session_start();
$_SESSION['login']=="";

session_unset();
$_SESSION['action1']="Olete välja loginud!...";
?>
<script language="javascript">
document.location="index.php";
</script>
