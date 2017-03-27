<?php 


require_once "nusoap.php";
$client = new nusoap_client("http://localhost/webservices/wsdl/news.wsdl", true);

//$return=$client->call("news.start");


/*$return=$client->call("news.addUser",array('name'=>'hager','email'=>'hager@yahoo.com','pass'=>'123'));
echo $return;*/

$email=$_GET['email'];
$pass=$_GET['passwd'];

$return=$client->call("news.login",array('email'=>$email,'pass'=>$pass));

echo $return;

/*$return=$client->call("news.viewUser",array('token'=>'6jGOKGydqPR6HMrCnFmt'));

echo $return;*/

/*$return=$client->call("news.addArtical",array('title'=>'hager','body'=>'body text ','token'=>'6jGOKGydqPR6HMrCnFmt'));

echo $return;
*/

/*$return=$client->call("news.viewArtical",array('token'=>'6jGOKGydqPR6HMrCnFmt','id'=>'4'));

echo $return;*/

/*$return=$client->call("news.deleteArtical",array('token'=>'6jGOKGydqPR6HMrCnFmt','id'=>'4'));

echo $return;
*/


//echo json_decode($return);



?>