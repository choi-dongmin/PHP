
<?php
 require_once('view/top.php')
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="http://127.0.0.1/CRUDCountries.php">Countries</a></h1>
    <ul>
      <?php
        countries_menu();
       ?>
    </ul>
