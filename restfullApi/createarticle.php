<?php
 //return json resonse
 header('Content-Type:application/json');
$title=$_GET['title'];
$body=$_GET['body'];
$token=$_GET['token'];

$DBName="webservice";
  $DBHost="localhost";
  $DBUserw="root";
  $DBUserwpass="123456";

@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
if(mysqli_connect_error())
  {
    echo "cant not  connect";
    exit;
  }

  $getuserid="select id from login where token='".$token."'";

  // echo $getuserid;
  $result=mysqli_query($db,$getuserid);

   $userdata=mysqli_fetch_array($result);
   // var_dump($userdata);
   // var_dump($userdata['id']);

   foreach ($userdata as $key => $value) {
     // echo $value;
   }


$sql="insert into artical(body,title,userid) values (\"".$body."\",\"".$title."\",".$userdata['id'].");";
// echo $sql;
$result=mysqli_query($db,$sql);

if(! $result)
{
echo "!result";
     $output=[
    'code'=>'400',
    'message' =>'can not insert article ',
    'sucess'=>'0'];
 }

else{
 

   $output=[
    'code'=>'200',
    'message' =>'create article success',
    'sucess'=>'1'
    
    
    ];  


}


mysqli_close($db);

echo json_encode($output);

?>
