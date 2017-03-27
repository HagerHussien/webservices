<?php
 //return json resonse
 header('Content-Type:application/json');

$token=$_GET['token'];
$article_id=$_GET['id'];

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

  $getuserid="select id from login where token='".$token."'";
  // echo $getuserid;
  $result=mysqli_query($db,$getuserid);
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
   $sql="select * from artical  where id='".$article_id."'";
   // echo $sql;
   $res=mysqli_query($db,$sql);
     if(! $res)
     {


      // not work 
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
mysqli_close($db);

 echo json_encode($output);

?>

