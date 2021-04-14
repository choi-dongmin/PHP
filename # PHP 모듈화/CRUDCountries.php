<?php
require_once('lib/countries.php');
require_once('view/top.php')
?>

    <a href="create.php">CREATE</a>
    <?php  if(isset($_GET['nav_name'])) { ?>
      <a href="update.php?nav_name=<?php print($_GET['nav_name'])?>">UPDATE</a>
      <form action="delete_process.php" method="post">
        <input type="hidden" name="nav_name" value="<?php print($_GET['nav_name']) ?>">
        <input type="submit" value="Delete">
      </form>
    <?php } ?>

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
