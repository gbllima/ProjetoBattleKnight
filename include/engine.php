<?


//////Page/////
 $type = $_GET['type'];

 if(empty($type)){$type = "news"; $title2 = Новости;}
 else if($type=="news")$title2 = Новости;
 else if($type=="register"){$title2 = Регистрация;}
 else if($type=="contact"){$title2 = Контакты;}
else{}
?>