<?php
 //return json resonse
 header('Content-Type:application/json');

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

 $sql="select * from login where email='".$email."'and Passwd='".$pass."'";
// echo $sql;

$result=mysqli_query($db,$sql);
if(! $result)
{

echo "!result";
		 $output=[
		'code'=>'400',
		'message' =>'is not authrize user',
		'sucess'=>'0'];
 
}

else{
	// echo"data";

if(mysqli_num_rows($result)>0){
 // if user exist

		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $co =''; 
     
        for($i=0;$i<20; $i++)
        {
            $co .= $chars[rand(0,strlen($chars)-1)];
        }

        $userdata=mysqli_fetch_array($result);

        $update="update login set token='".$co."' where id=".$userdata['id'].";";
        // echo $update;
    
	    $updateToken=mysqli_query($db,$update) or die(mysqli_error($db));

	    //-------------------------------

	 $output=[
		'code'=>'200',
		'message' =>'login success',
		'sucess'=>'1',
		'token'=>$co,
		
		];	
//----------------------------------------------------------

}
}

mysqli_close($db);

echo json_encode($output);

?>