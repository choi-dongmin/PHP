# PHP

## PHP 기본원리

-PHP 는 Web Browser 가 요청한 PHP 파일을 읽고 송출하는 과정에서 Web Browser 는 Web Server 에 요청하고 PHP 는 Server 에서 처리할 수 없기 때문에 PHP를 거치게 되고 PHP는 그 파일을 실행해 나온 그 결과를 Server에게 주고 그것을 Browser 에게 송출한다.

## PHP의 데이터 타입

```
숫자

integer : 정수
float : 소수

  <?php
   print(1-0.5); // 결과값 0.5
  ?>
```

```
문자

string : 문자열

<?php
  print("Hello World");
?>
<?php
   print('Hello'.'World'); // 결합연산자 java 의 "Hello" + "World"
?>
<?php
  print strlen("Hello World"); // get string length
?>
```
## 참고
[생활코딩](https://opentutorials.org/course/3130/19335)
