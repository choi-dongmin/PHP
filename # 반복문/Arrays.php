<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <h1>Array</h1>
      <?php
      $cowokers = array('me','you','we');  // $cowokers 는 배열이고 ()안쪽의 값을 가진다.
      print($cowokers[0].'<br>');
      print($cowokers[1].'<br>');
      print($cowokers[2].'<br>');
      array_push($cowokers, 'nobody');
      print(count($cowokers));            // $cowerkers 의 원소의 개수.
      var_dump($cowokers);                // $ $cowokers 의 구체적인 내용들
      ?>
  </body>
</html>
