<?php
  rename('data/'.$_POST['old_nav_name'], 'data/'.$_POST['nav_name']);
  file_put_contents('data/'.$_POST['nav_name'], $_POST['text']);
  header('Location: /CRUDCountries.php?nav_name='.$_POST['nav_name']);
?>
