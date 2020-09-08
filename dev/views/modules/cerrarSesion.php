<?php
  session_start();
  session_destroy();
  header("location: ".DIR_ROOT."index.php");
?>