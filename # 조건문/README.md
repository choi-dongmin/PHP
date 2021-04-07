# 조건문

- 조건문은 조건에 참일때 실행하도록 제어를 하는 제어문 중 하나이다. 

```
add : http://127.0.0.1/Countries.php?nav_name=Korea

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

이 코드에서 만약 주소의 값중 ? 뒤에 아무것도 존재하지 않는다면 Welcome 이라는 값을 나타내도록 해보자.

## 비교와 Boolean

- 그에앞서 조건문에 필요한 요소들을 알아보자.

### Boolean 

- 데이터타입 중 하나이다. 좌항과 우항을 비교해 참과 거짓으로 하나의 결과로 나타낸다.

### 비교연산자

- 좌항과 우항을 비교하기 위한 연산자.
```
<?php
  var_dump(1==1);   // bool(true)
  var_dump(1>1);    // bool(false)
  var_dump(1>=1);   // bool(true)
?>
```

## 조건문 형식

if문 을 이용해서 우리는 조건문을 완성시킬 수 있다.

```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Conditional</h1>
    <h2>IF</h2>
    <?php
      print('1<br>');
      if(1>2){
        print('2-1<br>');
      } else{
        print('2-2<br>');
      }
      print('3<br>');
     ?>
  </body>
</html>
```

만약 if() 안의 것이 참이면 if 에 속한 코드를 거짓이면 else 혹은 하지 않는다. 

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

만약 nav_name 이 set 이 되었다면 nav_name 의 연결된 요소들을 보여주고 아니라면

welcome 을 출력한다.

## 참고
[생활코딩](https://opentutorials.org/course/3130/19356)