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
