<?php
require_once('lib/countries.php');
require_once('view/top.php')
?>

    <a href="create.php">CREATE</a>
    <?php  if(isset($_GET['nav_name'])) { ?>
      <a href="update.php?nav_name=<?php print($_GET['nav_name'])?>">UPDATE</a>
    <?php } ?>

    <form action="update_process.php" method="post">
      <input type="hidden" name="old_nav_name" value="<?php print($_GET['nav_name'])?>">
      <p><input type="text" name="nav_name" placeholder="<?php print($_GET['nav_name']) ?>"></p>
      <p> <textarea name="text" placeholder="Description"><?php Countries_text() ?></textarea></p>
      <p><input type="submit"></p>
    </form>
    </h4>
<?php
  require_once('view/bottom.php')
?>
