<?php
function countries_menu (){
  $doc = scandir('./data');
  for ($i=0; $i < count($doc); $i++) {
    $rejectScript = htmlspecialchars($doc[$i]);   후 사용한ㄷ가.
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
    $basename = basename($_GET['nav_name']);
    print htmlspecialchars(file_get_contents('./data/'.$basename]));
  }else{
    print("Hello, PHP");
  }
}
?>
