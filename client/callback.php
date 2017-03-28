<?php

$code=$_GET['code'];


$out=file_get_contents('http://webservice.com/gettoken.php?code='.$code.'&secret=678910');

 $data=json_decode($out,true);



$token=$data['token'];

$info=file_get_contents('http://webservice.com/getinfo.php?token='.$token.'');

 $data=json_decode($info,true);


$id=$data['id'];

$skill=file_get_contents('http://webservice.com/getskills.php?id='.$id.'');

echo $skill ;

 $data=json_decode($skill,true);

//print_r($data);




?>