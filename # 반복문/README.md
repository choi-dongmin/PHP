# 반복문 

- 반복문은 조건이 참이라면 속한 코드를 반복시키고 아니라면 반복시키지 않는 문법이다.

## while 
- while 은 () 안에 값이 참일때 계속 계속 반복시킨다.

```
      <?php
        $i=0;
        print("1<br>");
        while (true) {
          print("2<br>");
          $i++;
        }
        print("3<br>");
      ?>
```
위와 같은 코드가 있다면 while 에서 무한이 반복하여 무한루프가 실행될것이다.

```
      <?php
        $i=0;
        print("1<br>");
        while ($i <3) {
          print("2<br>");
          $i++;
        }
        print("3<br>");
      ?>
```

위와같이 변수 i 가 3 보다 작을때만 반복하게 만들어 무한루프를 하지 않도록 할 수있다.

## for 

- for 는 끝이 유한한 반복을 시키는데 최적화되어 있는 코드이다.

```
<php>
  print("1<br>");
  for ($i=0; $i < 3; $i++) {
          print("2<br>");
        }
  print("3<br>");
</php>
```## for 

- for 는 끝이 유한한 반복을 시키는데 최적화되어 있는 코드이다.

```
<php>
  print("1<br>");
  for ($i=0; $i < 3; $i++) {
          print("2<br>");
        }
  print("3<br>");
</php>
```

## Array

- 배열은 하나의 변수안에 모인 각각의 다른 변수값들의 집합이라고 생각할수있다.

```
  <?php
      $cowokers = array('me','you','we');  // $cowokers 는 배열이고 ()안쪽의 값을 가진다.
      print($cowokers[0].'<br>');
      print($cowokers[1].'<br>');
      print($cowokers[2].'<br>');
      array_push($cowokers, 'nobody');	  // $coworkers 배열의 마지막에 원소 추가.
      print(count($cowokers));            // $coworkers 의 원소의 개수.
      var_dump($cowokers);                // $coworkers 의 구체적인 내용들
      ?>
``` 



## 활용

```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="http://127.0.0.1/Countries.php">Countries</a></h1>
    <ul>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=Korea">Korea</a></li>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=France">France</a></li>
      <li><a href="http://127.0.0.1/Countries.php?nav_name=Japan">Japan</a></li>
    </ul>
    <h2><?php
    if(isset($_GET['nav_name'])){
      print($_GET['nav_name']);
    }else{
      print('welcome');
    }
    ?></h2>
    <h4>
      <?php
      if(isset($_GET['nav_name'])){
        print(file_get_contents('./data/'.$_GET['nav_name']));
      }else{
        print("Hello, PHP");
      }
      ?>
    </h4>
  </body>
</html>
```
```
<li><a href="http://127.0.0.1/Countries.php?nav_name=Korea">Korea</a></li>
<li><a href="http://127.0.0.1/Countries.php?nav_name=France">France</a></li>
<li><a href="http://127.0.0.1/Countries.php?nav_name=Japan">Japan</a></li>
```
위 코드에서 우리는 li 가 반복해서 나타나고 있고 이것은 우리가 반복문으로 처리할 수 있다.

```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><a href="http://127.0.0.1/Countries.php">Countries</a></h1>
    <ul>
      <?php

        $doc = scandir('./data');       // scandir 어떠한 폴더안에 있는 파일들의 이름을 배열의 형태로 만들수 있다.(. .. 폴더 추가되어있음)

        for ($i=0; $i < count($doc); $i++) {
          if($doc[$i] != '.')
            if($doc[$i] != '..')
              print("<li><a href=\"http://127.0.0.1/loops.php?nav_name=$doc[$i]\">$doc[$i]</a></li>\n");    
        }
       ?>

    </ul>
    <h2><?php
    if(isset($_GET['nav_name'])){
      print($_GET['nav_name']);
    }else{
      print('welcome');
    }
    ?></h2>
    <h4>
      <?php
      if(isset($_GET['nav_name'])){
        print(file_get_contents('./data/'.$_GET['nav_name']));
      }else{
        print("Hello, PHP");
      }
      ?>
    </h4>
  </body>
</html>
```

## 참고 
[생활코딩](https://opentutorials.org/course/3130/19358)