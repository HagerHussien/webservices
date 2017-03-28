<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type:application/json');

$id=$_GET['id'];

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

 $sql="select * from skill where id='".$id."'";

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

	      $data=mysqli_num_rows($result);
  for($i=0;$i<$data;$i++){
  $r=mysqli_fetch_assoc($result);
  
    // $resl[] = array("skill" => $r['skill'],); 


// print_r($res);
   $output=[
    "code"=>"200",
    "message"=>"select sucessfuly",
    "success"=>"true",
    "skills"=>$r['skill']
    ];	      
echo json_encode($output);
}
}

// echo json_encode($output);
?>

