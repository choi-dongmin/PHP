<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>XSS</h1>
    <?php
      print htmlspecialchars('<script>alert("babo");</script>')
    ?>
  </body>
</html>
