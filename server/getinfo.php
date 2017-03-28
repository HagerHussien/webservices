<?php
header('Content-Type:application/json');

$token=$_GET['token'];


  $DBName="webservice";
  $DBHost="localhost";
  $DBUserw="root";
  $DBUserwpass="123456";

@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
if(mysqli_connect_error())
  {
    echo "can't connect";
    exit;
  }

 $sql="select * from user where token='".$token."'";

//echo $sql;
// var_dump($sql);
// die();
//or die(mysqli_error($db))

$result=mysqli_query($db,$sql) ;
if(! $result)
{

echo "!result";
		 $output=[
		'code'=>'400',
		'message' =>'not success',
		'sucess'=>'0'];
 
}

else{
	// echo"data";
	        $userdata=mysqli_fetch_array($result);

	        $output=[
		'code'=>'200',
		'message' =>' success',
		'sucess'=>'1',
		'id'=>$userdata['id'],
		'name'=>$userdata['name'],
		'email'=>$userdata['email'],
		'passwd'=>$userdata['passwd']
		
		];

}

echo json_encode($output);
?>