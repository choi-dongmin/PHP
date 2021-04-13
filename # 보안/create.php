<?php
require_once('lib/countries.php');
require_once('view/top.php')
?>
    <a href="create.php">CREATE</a>
    <form action="create_process.php" method="post">
      <p><input type="text" name="nav_name" placeholder="Write New Country"></p>
      <p> <textarea name="text" placeholder="Description"></textarea> </p>
      <p><input type="submit"></p>
    </form>


    <h2><?php
      show_the_now_countries_name();
    ?></h2>
    <h4>
      <?php
        Countries_text();
      ?>
    </h4>
<?php
  require_once('view/bottom.php')
?>
