<?php
  file_put_contents("data/".$_POST['nav_name'], $_POST['text']);
  header('Location: /CRUDCountries.php?nav_name='.$_POST['nav_name']);
?>
