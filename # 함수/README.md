# 함수

- 함수란 어떠한 기능을 하도록 코드들을 만든 형태를 말한다. 직접 함수를 만들수 있지만 다른 사람이 만든 함수를 사용할 수도 있다.


```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>function</title>
  </head>
  <body>
    <h1>function</h1>
    <?php
      $str = 'Lorem ipsum dolor sit amet,

      consectetura';
      print($str);
     ?>
     <h1>Strlen</h1>
     <?php
     print(strlen($str));  //문자열의 길이를 계산하는 함수
      ?>
      <h1>nl2br</h1>
      <?php
      print(nl2br($str));   // 문자열에 줄 바꿈을 무시하지 않게하는 함수
      ?>

  </body>
</html>

```

strlen() : 은 문자열의 길이를 계산해주는 함수이다.

nl2br() : 작성한 문자열의 줄바꿈을 무시하지 않도록 하는 함수.

위와 같이 우리는 다른사람이 만들어 놓은 함수를 적절히 이용할수있다.

## 활용
```
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
```

```
data/france : france is ...
data/korea : korea is ...
data/japan : japan is ...
```

위와 같이 각나라 li 값을 클릭하면 내용또한 같이 각나라와 같이 주고 싶었다 data 폴더를 만들고 그안에 내용을 입력하고 
```
<?php
	print(file_get_contents('./data/'.$_GET['nav_name']));
?>
```
위 file_get_contents() 는 어떠한 파일을 불러오는것이고 그 뒤에 소스를 찾아가고 있는데 data 파일 안의 이름을 nav_name 와 동일하게 해주었음으로  

$_GET['nav_name'] 을 다시한번 이용해 각 나라의 이름을  불러올수 있도록 하고 있다. 

## 함수 만들기

- 결국 함수란 복잡도를 낮춰 코드의 효율을 부여하기 위한 방법이다. 하나의 목적을 실행하기 위한 코드들의 집합이다.

```
<?php
  function  basic(){
    print("Lorem ipsum dolor sit amet, consectetur1 <br>")
    print("Lorem ipsum dolor sit amet, consectetur2 <br>")  }
    basic();
    basic();
?>
```
기본적인 함수의 형태이다 function 으로 함수를 선언하고 그 함수의 이름을 정의한다 그리고 매개변수를 받을 () 를 만들고 {} 안쪽에 코드를 작성한다.

그리고 함수를 실행시킬때는 함수의 이름과 ()를 사용해 실행시킨다.

### 활용

```
<?php
function countries_menu (){
  $doc = scandir('./data');       // scandir 어떠한 폴더안에 있는 파일들의 이름을 배열의 형태로 만들수 있다.

  for ($i=0; $i < count($doc); $i++) {
    if($doc[$i] != '.')
      if($doc[$i] != '..')
        print("<li><a href=\"http://127.0.0.1/loops.php?nav_name=$doc[$i]\">$doc[$i]</a></li>\n");
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
    <h1><a href="http://127.0.0.1/Countries.php">Countries</a></h1>
    <ul>
      <?php
        countries_menu();
       ?>
    </ul>
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

각각의 코드들 함수화 시켜 실행시키고 있다.


## 참고
[생활코딩](https://opentutorials.org/course/3130/19356)