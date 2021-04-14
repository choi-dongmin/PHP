# PHP 모듈화

- 지금까지 만든 코드들을 리펙토링을 진행해보자.

```
<?php
function countries_menu (){
  $doc = scandir('./data');       // scandir 어떠한 폴더안에 있는 파일들의 이름을 배열의 형태로 만들수 있다.

  for ($i=0; $i < count($doc); $i++) {
    if($doc[$i] != '.')
      if($doc[$i] != '..')
        print("<li><a href=\"http://127.0.0.1/CRUDCountries.php?nav_name=$doc[$i]\">$doc[$i]</a></li>\n");
  }
}

function show_the_now_countries_name(){
  if(isset($_GET['nav_name'])){
    print($_GET['nav_name']);
  }else{
    print('welcome');
  }
}

function Countries_text() {
  if(isset($_GET['nav_name'])){
    print(file_get_contents('./data/'.$_GET['nav_name']));
  }else{
    print("Hello, PHP");
  }
}
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

    <a href="create.php">CREATE</a>
    <?php  if(isset($_GET['nav_name'])) { ?>
      <a href="update.php?nav_name=<?php print($_GET['nav_name'])?>">UPDATE</a>
      <a href="delete.php?nav_name=<?php print($_GET['nav_name'])?>">DELETE</a>
    <?php } ?>

    <h2><?php
      show_the_now_countries_name();
    ?></h2>
    <h4>
      <?php
        Countries_text();
      ?>
    </h4>
  </body>
</html>

```

위의 코드중 함수가 있는곳을 모듈화 시켜 php 파일을 따로 만들어 관리를 한다면 다른곳에서 사용하기도 또 유지보수하기도 굉장히 쉬울것이다.

```
<?php
require('lib/countries.php');
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
  </body>
</html>

```
```
파일명: ./lib/countries.php

<?php
function countries_menu (){
  $doc = scandir('./data');       // scandir 어떠한 폴더안에 있는 파일들의 이름을 배열의 형태로 만들수 있다.

  for ($i=0; $i < count($doc); $i++) {
    if($doc[$i] != '.')
      if($doc[$i] != '..')
        print("<li><a href=\"http://127.0.0.1/CRUDCountries.php?nav_name=$doc[$i]\">$doc[$i]</a></li>\n");
  }
}

function show_the_now_countries_name(){
  if(isset($_GET['nav_name'])){
    print($_GET['nav_name']);
  }else{
    print('welcome');
  }
}

function Countries_text() {
  if(isset($_GET['nav_name'])){
    print(file_get_contents('./data/'.$_GET['nav_name']));
  }else{
    print("Hello, PHP");
  }
}
?>
```

이렇게 따로 유용한 함수를 모아 놓은곳을 lib 라는 이름으로 많이 저장하여 놓는다.

그리고 불러오는곳에서는 require 를 통하여 불러온다.

이러한 형식으로 모두 모듈화를 시킨다면.

```
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
```

이런식으로 완성될것이다. (require_once 는 저 파일을 한번만 불러온다는 이야기이다.)

## 참고
[생활코딩](https://opentutorials.org/course/3130/19390)