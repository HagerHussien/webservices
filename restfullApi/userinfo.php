<?php
 //return json resonse
 header('Content-Type:application/json');

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
mysqli_close($db);

 echo json_encode($output);

?>

