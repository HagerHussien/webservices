<?php

//http://localhost/webservice/login.php?email=mohamed&pass=12345

 //return json resonse
 // header('Content-Type:application/json');


$key=$_GET['key'];

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

 $sql="select * from clients where key_client='".$key."'";
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
		'message' =>'not authrized user',
		'sucess'=>'0'];
 
}

else{
	// echo"data";

if(mysqli_num_rows($result)>0){

	echo "connected";
	
 // if user exist

		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $co =''; 
     
        for($i=0;$i<20; $i++)
        {
            $co .= $chars[rand(0,strlen($chars)-1)];
        }

        $userdata=mysqli_fetch_array($result);

        $update="update client_code set code='".$co."' where client_id=".$userdata['id'].";";

        // echo $update;
    
	   $updateToken=mysqli_query($db,$update) or die(mysqli_error($db));

	    //-------------------------------

	 // $output=[
		// 'code'=>'200',
		// 'message' =>'login success',
		// 'sucess'=>'1',
		// 'code'=>$co,
		
		// ];	
//----------------------------------------------------------

	   // redirect('callback.php?code="$co"');

}
}

header('Location:http://webservice.api.com/callback.php?code='.$co.'');
// mysqli_close($db);


// echo json_encode($output);

?>

