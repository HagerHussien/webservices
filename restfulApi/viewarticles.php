<?php
 //return json resonse
 header('Content-Type:application/json');

$token=$_GET['token'];

  $DBName="webservice";
  $DBHost="localhost";
  $DBUserw="root";
  $DBUserwpass="123456";

@$db=mysqli_connect($DBHost,$DBUserw, $DBUserwpass,$DBName);

if(mysqli_connect_error())
  {
    echo "can not connect";
    // $output=[
    // 'code'=>'500',
    // 'message' =>'server error',
    // 'sucess'=>'0'];
    //  echo json_encode($output);
 
    exit;
  }

//getuserid
 $getuserid="select id from login where token='".$token."'";
  // echo $getuserid;
 $result=mysqli_query($db,$getuserid);
if(! $result)
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
   $sql="select * from artical ;";
   // echo $sql;
   $res=mysqli_query($db,$sql);
     if(! $res)
     {


      // not work 
        $output=[
        'code'=>'400',
        'message' =>'can not view all  articals ',
        'sucess'=>'0'];
      
        
    }

     else
      {



$data=mysqli_num_rows($res);
  for($i=0;$i<$data;$i++){
  $r=mysqli_fetch_assoc($res);
  // var_dump($r);
  // echo $r['id'];
  // $res = ["id"=>$r['id'],"user_id"=>$r['user_id'],"title"=>$r['title'],"body"=>$r['body']]; 
    $resl[] = array("id" => $r['id'],"userid" => $r['userid'], "title" => $r['title'], "body" => $r['body']); 


// print_r($res);
   $output=[
    "code"=>"200",
    "message"=>"select sucessfuly",
    "success"=>"true",
    "article"=>$resl
    ];
  }
         // $output=[
         //  'code'=>'200',
         //  'message' =>' view all article sucess',
         //  'sucess'=>'1'
         //  ];
        

      }

}
}
mysqli_close($db);

 echo json_encode($output);

?>