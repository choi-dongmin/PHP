<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Countries</h1>
    <ul>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=Korea">Korea</a></li>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=France">France</a></li>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=Japan">Japan</a></li>
    </ul>
    <h2><?php print($_GET['nav_name']); ?></h2>
    <h4>
      <?php
        print(file_get_contents('./data/'.$_GET['nav_name']));
      ?>
    </h4>
  </body>
</html>
