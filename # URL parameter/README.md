# URL parameter

```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    안녕하세요. CDM 님.
  </body>
</html>
```

위와같은 화면을 출력하는 페이지에서 'CDM 님'에 다른 URL parameter 를 받아 각각 상황에 맞게 변화시킬수 있다. 

```
add : http://127.0.0.1/parameter.php?name=CDM

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    안녕하세요. <?php  print($_GET['name']); ?> 님.
  </body>
</html>

결과값 : 안녕하세요 CDM 님.

add : http://127.0.0.1/parameter.php?name=CCS

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    안녕하세요. <?php  print($_GET['name']); ?> 님.
  </body>
</html>

결과값 : 안녕하세요 CCS 님.
```

위는 parameter.php 라는 애플리케이션을 우리가 만들어 그 인자값으로 URL에 입력한 값을 준 형식이 된다.

그리고 그 URL에 따라서 print($_GET['name']); 를 통해 출력하는 값이 달라지도록 하고 있다.

```
add : http://127.0.0.1/parameter.php?name=CDM

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    안녕하세요. <?php  print($_GET['name']); ?> 님.
  </body>
</html>

결과값 : 안녕하세요 CDM 님.
```

주소를 보면 parameter 다음 ?name=CDM 이다. 이게 name 의 인자값으로 CDM을 부여한것이고
```
<?php  print($_GET['name']); ?> 
```
위 코드를 URL 에서 부여한 인자값을 php 를 통해서 부여하고 있다. 

만약 주소의 ?name 을 ?tattle 로 바꾼다면 오류가 발생한다. 그러면 php [] 안의 값을 'tittle' 로 맞추어 주면 불러오기가 가능하다.

```
add : http://127.0.0.1/parameter.php?name=CDM&add=서울

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    안녕하세요. <?php  print($_GET['name']); ?> 님. <?php  print($_GET['add']); ?> 에 사시는군요 
  </body>
</html>

결과값 : 안녕하세요 CDM 님.
```

'?name=CDM&add=서울' 에서 보이듯 처음 인자값을 부여할때는 ? 를 쓰지만 그 후에는 &로 할 수 있다.(이것은 URL의 약속이다.)

## 활용
이 URL parameter 를 활용해서 국가를 클릭하면 그 국가의 이름이 출력되도록 해보자. 

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
      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </h4>
  </body>
</html>
```

위와같이 a tag 를 이용해 parameter 인자값을 각각 나라에 맞게 주고 그 밑에서 'nav_name' 를 출력하도록 하면 

Korea 를 선택하면 'nav_name' 에 Korea 가 들어가고 그러한 방식으로 France,Japan 을 출력한다.

## 참고
[생활코딩](http://127.0.0.1/Countries.php?nav_name=Japan)  

