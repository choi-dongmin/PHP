# PHP 보안 

Cross Site Scripting (XSS)

- 위 방법은 사이트에 script tag 를 부여하는것이다. 만약 홈페이지의 create 를 통해 누군가가 script tag 를 이용해.

파일을 열었을때 다른 사이트로 날리거나 혹은 위험한 일을 할 수있다. 

## htmlspecialchars

```
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>XSS</h1>
    <?php
      print ('<script>alert("babo");</script>');
    ?>
  </body>
</html>
```

위 파일을 열어보면 babo 라는 경고창이 발생 할 것이다. 하지만 htmlspecialchars 를 이용한다면

코드처럼 작동하지 않고 일반 텍스트 형식으로 화면에 출력될 것이다.

```

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>XSS</h1>
    <?php
      print htmlspecialchars ('<script>alert("babo");</script>')
    ?>
  </body>
</html>
```

그럼 lib 에가서 사용자가 정보를 입력하는 곳에 전부 이 htmlspecialchars 를 적용한다.
```
<?php
function countries_menu (){
  $doc = scandir('./data');       // scandir 어떠한 폴더안에 있는 파일들의 이름을 배열의 형태로 만들수 있다.
  for ($i=0; $i < count($doc); $i++) {
    $rejectScript = htmlspecialchars($doc[$i]);   // print 안에서 는 htmlspecialchars 가 적용을 할 수 없기 떄문에 변수로 저장한후 사용한가.
    if($doc[$i] != '.')
      if($doc[$i] != '..')
        print("<li><a href=\"http://127.0.0.1/CRUDCountries.php?nav_name=$rejectScript\">$rejectScript</a></li>\n");
  }
}

function show_the_now_countries_name(){
  if(isset($_GET['nav_name'])){
    print  htmlspecialchars($_GET['nav_name']);
  }else{
    print('welcome');
  }
}

function Countries_text() {
  if(isset($_GET['nav_name'])){
    print htmlspecialchars(file_get_contents('./data/'.$_GET['nav_name']));
  }else{
    print("Hello, PHP");
  }
}
?>
```

## basename

- 우리 서버가 관리하면서 passward.txt 파일을 따로 저장하여 관리한다고 했을때 또 범죄자가 범죄자가 어떠한 이유로 그 파일이 있는곳을 알고 있다면 이러한 방식으로 해킹이 가능하다.

```
파일명 :보안/passward.txt

me /111
```
```
파일명 : lib/countries.php
*add : http://127.0.0.1/CRUDCountries.php?nav_name=../passward.txt

<?php
function countries_menu (){
  $doc = scandir('./data');      
  for ($i=0; $i < count($doc); $i++) {
    $rejectScript = htmlspecialchars($doc[$i]);  
    if($doc[$i] != '.')
      if($doc[$i] != '..')
        print("<li><a href=\"http://127.0.0.1/CRUDCountries.php?nav_name=$rejectScript\">$rejectScript</a></li>\n");
  }
}

function show_the_now_countries_name(){
  if(isset($_GET['nav_name'])){
    print  htmlspecialchars($_GET['nav_name']);
  }else{
    print('welcome');
  }
}

function Countries_text() {
  if(isset($_GET['nav_name'])){
    print htmlspecialchars(file_get_contents('./data/'.$_GET['nav_name']));
  }else{
    print("Hello, PHP");
  }
}
?>
``` 
```
*add : http://127.0.0.1/CRUDCountries.php?nav_name=../passward.txt
```

URL 에서 직접적으로 부모 폴더에서 passward.txt 를 가져와 화면으로 보여주고 있다.

이때 PHP 함수에 basename 이 있다. basename 말 그대로 경로에서 파일명만 나타내준다.

즉 ./ ../ 이 부분을 제외시킨다.

```
function Countries_text() {
  if(isset($_GET['nav_name'])){
    $basename = basename($_GET['nav_name']);
    print htmlspecialchars(file_get_contents('./data/'.$_GET['nav_name']));
  }else{
    print("Hello, PHP");
  }
}
```

key 값을 받으면서 화면에 출력하는곳에 basename 을 변수로 지정해 시스템 오류가 나도록 한다.

## 참고
[생활코딩](https://opentutorials.org/course/3130/19390)