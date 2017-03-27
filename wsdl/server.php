<?php 
// this file is server  

require_once "nusoap.php";

class news
{	
	public function  start(){

		  // $DBName="webservice";
		  // $DBHost="localhost";
		  // $DBUserw="root";
		  // $DBUserwpass="123456";

		  // @ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName) or die(mysqli_connect_error());
	}

	public function  addUser($name,$email,$pass){

          $DBName="webservice";
		  $DBHost="localhost";
		  $DBUserw="root";
		  $DBUserwpass="123456";
		  @ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName) or die(mysqli_connect_error());
		$sql="insert into login (name,email,passwd) values (\"".$name."\",\"".$email."\",\"".$pass."\");";
		$result=mysqli_query($db,$sql);

			if(! $result)
			{
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
			  return json_encode($output);

	}

	public function  login($email,$pass){

			  $DBName="webservice";
			  $DBHost="localhost";
			  $DBUserw="root";
			  $DBUserwpass="123456";
			  @ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName) or die(mysqli_connect_error());
			
			$sql="select * from login where email='".$email."'and Passwd='".$pass."'";
			$result=mysqli_query($db,$sql);
			if(!$result)
			{
					 $output=[
					'code'=>'400',
					'message' =>'is not authrize user',
					'sucess'=>'0'];
			}
			else{
			if(mysqli_num_rows($result)>0){
					$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			        $co =''; 			     
			        for($i=0;$i<20; $i++)
			        {
			            $co .= $chars[rand(0,strlen($chars)-1)];
			        }
			        $userdata=mysqli_fetch_array($result);
			        $update="update login set token='".$co."' where id=".$userdata['id'].";";
				    $updateToken=mysqli_query($db,$update) or die(mysqli_error($db));
				 $output=[
					'code'=>'200',
					'message' =>'login success',
					'sucess'=>'1',
					'token'=>$co,
					];	
				}
			}
			return json_encode($output);

	}

	public function  viewUser($token){

				
		 $DBName="webservice";
		  $DBHost="localhost";
		  $DBUserw="root";
		  $DBUserwpass="123456";

		@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
		
		  $sql="select * from login where token='".$token."'";

		  $result=mysqli_query($db,$sql);
		    if(! $result )
		    {

		    echo "!result";
		         $output=[
		        'code'=>'400',
		        'message' =>'invalid user ',
		        'sucess'=>'0'];
		    }

		else{

		 if(mysqli_num_rows($result)>0)
		 {
		        $data=mysqli_num_rows($result);
		        for($i=0;$i<$data;$i++)
		         {
		            $r=mysqli_fetch_array($result);
		            
		            $res = ["id"=>$r['id'],"email"=>$r['email'],"token"=>$r['token']]; 

		             $output=[
		              "code"=>"200",
		              "message"=>"select successfuly",
		              "success"=>"true",
		              "article"=>$res
		              ];
		            
		          }

			 }
		  }
		  	return json_encode($output);
	}

	public function  addArtical($title,$body,$token){

			$DBName="webservice";
			  $DBHost="localhost";
			  $DBUserw="root";
			  $DBUserwpass="123456";

			@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
			  $getuserid="select id from login where token='".$token."'";
			  $result=mysqli_query($db,$getuserid);
			   $userdata=mysqli_fetch_array($result);
			$sql="insert into artical(body,title,userid) values (\"".$body."\",\"".$title."\",".$userdata['id'].");";
			$result=mysqli_query($db,$sql);
			if(! $result)
			{
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

		  	return json_encode($output);

	}

	public function  viewArtical($token,$id){

				
		  $DBName="webservice";
		  $DBHost="localhost";
		  $DBUserw="root";
		  $DBUserwpass="123456";

		@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
		  $getuserid="select id from login where token='".$token."'";
		  $result=mysqli_query($db,$getuserid);
		if(! $result )
		{
		     $output=[
		    'code'=>'400',
		    'message' =>'invalid user ',
		    'sucess'=>'0']; 
		}
		else{
		 if(mysqli_num_rows($result)>0)
		 {
		   $sql="select * from artical  where id='".$id."'";
		   $res=mysqli_query($db,$sql);
		     if(! $res)
		     {
		        $output=[
		        'code'=>'400',
		        'message' =>'cant view all  articles ',
		        'sucess'=>'0'];      
		    }
		     else
		      {
		         $data=mysqli_num_rows($res);
		        for($i=0;$i<$data;$i++)
		        {
		        $r=mysqli_fetch_array($res);
 		        $res = ["id"=>$r['id'],"userid"=>$r['userid'],"title"=>$r['title'],"body"=>$r['body']];
		         $output=[
		          "code"=>"200",
		          "message"=>"select sucessfuly",
		          "success"=>"true",
		          "article"=>$res
		          ];
		        }
		      }
			 }
		  }
		   	return json_encode($output);

	}

	public function  deleteArtical($id,$token){

			  $DBName="webservice";
			  $DBHost="localhost";
			  $DBUserw="root";
			  $DBUserwpass="123456";

			@ $db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);
			  $getuserid="select id from login where token='".$token."'";
			  $result=mysqli_query($db,$getuserid);
			  $userdata=mysqli_fetch_array($result);
			  $sql="delete from artical where id='".$id."'and userid='".$userdata['id']."'";
			$result=mysqli_query($db,$sql);
			if(!$result)
			{
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
			return json_encode($output);
	}

	public function  viewArticals($string){

		return "my function viewArticals";
	}

	public function  end(){

		mysqli_close($db);
	
	}

}


$server = new soap_server();

$server->configureWSDL("newsservice");

$server->register("news.addUser",array("name" => "xsd:string","email" => "xsd:string","pass" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.login",array("email" => "xsd:string","pass" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.viewUser",array("token" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.addArtical",array("title" => "xsd:string","body" => "xsd:string","token" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.viewArtical",array("token" => "xsd:string","id" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.deleteArtical",array("id" => "xsd:string","token" => "xsd:string"),array("return" => "xsd:string"));

$server->register("news.viewArticals",array("type" => "xsd:string"),array("return" => "xsd:string"));


$server->service(file_get_contents("php://input"));

?>