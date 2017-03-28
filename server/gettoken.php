<?php

//http://localhost/webservice/login.php?email=mohamed&pass=12345

 //return json resonse
	
//header('Location:webservice.api.com');
header('Content-Type:application/json');

$code=$_GET['code'];
$secret=$_GET['secret'];

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

 $sql="select user_id from client_code inner join clients on client_code.client_id = clients.id where clients.secret='".$secret."' and client_code.code='".$code."'";
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

if(mysqli_num_rows($result)>0){

	//echo "connected";
	
 // if user exist

		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $co =''; 
     
        for($i=0;$i<20; $i++)
        {
            $co .= $chars[rand(0,strlen($chars)-1)];
        }

        $userdata=mysqli_fetch_array($result);

        $update="update user set token='".$co."' where id=".$userdata['user_id'].";";

        // echo $update;
    
	   $updateToken=mysqli_query($db,$update) or die(mysqli_error($db));

	   //$info="select * from user where token='".$co."'";


	   // echo $info;
	 //    //-------------------------------

	  $output=[
		'code'=>'200',
		'message' =>' success',
		'sucess'=>'1',
		'token'=>$co,
		
		];	
//----------------------------------------------------------

}
}

// mysqli_close($db);
//header('Location:http://webservice.api.com/callback.php?code='.$co.'');
echo json_encode($output);

?>

