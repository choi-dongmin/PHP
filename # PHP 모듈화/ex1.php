<?php
require_once('lib/countries.php');
require_once('view/top.php')
?>
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
