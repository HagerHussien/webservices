<?php
 //return json resonse
 header('Content-Type:application/json');

$name=$_GET['name'];
$email=$_GET['email'];
$pass=$_GET['passwd'];

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

$sql="insert into login (name,email,passwd) values (\"".$name."\",\"".$email."\",\"".$pass."\");";
// echo $sql;
$result=mysqli_query($db,$sql);

if(! $result)
{

echo "!result";
     $output=[
    'code'=>'400',
    'message' =>'can not insert ',
    'sucess'=>'0'];
 
}

else{
 

   $output=[
    'code'=>'200',
    'message' =>' user create success',
    'sucess'=>'1'
    
    ];  


}

mysqli_close($db);

echo json_encode($output);

?>
