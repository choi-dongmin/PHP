<?php
  unlink('data/'.$_POST['nav_name']);
  header('Location: /CRUDCountries.php');
?>
