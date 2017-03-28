<?php
 //return json resonse

 header('Content-Type:application/json');
$article_id=$_GET['id'];
$token=$_GET['token'];


 $DBName="webservice";
  $DBHost="localhost";
  $DBUserw="root";
  $DBUserwpass="123456";

@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
if(mysqli_connect_error())
  {
    echo "can not connect";
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



 $sql="delete from artical where id='".$article_id."'and userid='".$userdata['id']."'";


//echo $sql;
// echo $sql;
$result=mysqli_query($db,$sql);
//echo $result;

if(!$result)
{

echo "!result";
     $output=[
    'code'=>'400',
    'message' =>'can not delete article ',
    'sucess'=>'0'];
 
}

else{
 

   $output=[
    'code'=>'200',
    'message' =>' delete article success',
    'sucess'=>'1'
    ];  


}

mysqli_close($db);

echo json_encode($output);

?>
