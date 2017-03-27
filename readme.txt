API 

default  url: http://localhost/webService/lab3/
description:create&login&getinformation about user and create  article & delete article &view all article&view specific article

retrun -->json 
------------------------------------------------------------------------------------------------
1-create user
url:/create.php

method:get
********************************
params: name / email / pass    *
all of this param are requried *
********************************
request: ---------------------------->
http://localhost/webService/lab3/create.php?name=aya&pass=222&email=aya@yahoo.com

response:<----------------------------
sucess:------------>
{"code":"200","message":"user create sucess","sucess":"1"}
failure:----------->
{"code":"400","message":"cant insert user
","sucess":"0"}
server error :------>
{"code":"500","message":"server error
","sucess":"0"}

//-------------------------------------------**------------------------------------------------------
---------------------------------------------**------------------------------------------------------
 2-user login 
url:/login.php
method:get
********************************
params:  email / pass          *
all of this param are requried *
********************************
request:---------------------------->
http://localhost/webService/lab3/login.php?pass=222&email=aya@yahoo.com
response:<----------------------------
sucess---->
{"code":"200","message":"login sucess","sucess":"1","token":"LdgjHPK1nnQb1NzK4EV0"}
and update token every time user login 

failure--->
{"code":"400","message":"not authrize user"
","sucess":"0"}
server error ----->
{"code":"500","message":"server error
","sucess":"0"}
//---------------------------------------------**-----------------------------------------------------
-----------------------------------------------**-----------------------------------------------------
3-get  user information
get user data if token valid
url:/userinfo.php
method:get
********************************
params: token                  *
all of this param are requried *
********************************
request:---------------------------->
http://localhost/webService/lab3/userinfo.php?token=LdgjHPK1nnQb1NzK4EV0
response:<----------------------------
sucess---->
{"code":"200","message":"select sucessfuly","success":"true","article":{"id":"1","email":"esraa@yahoo.com","token":"LdgjHPK1nnQb1NzK4EV0"}}
//----------------------------------------------**--------------------------------------------------------
------------------------------------------------**--------------------------------------------------------

4-create article 
url:/createarticle.php

method:get
****************************************
params:  token / title/ body           *
all of this param are requried         *
****************************************
request:---------------------------->
http://localhost/webService/lab3/createarticle.php?token=HWh92kzrrDNzAXEmEBTm&title=test&body=test

response:<----------------------------
sucess---->
{"code":"200","message":"create article sucess","sucess":"1"}
failure--->
{"code":"400","message":"cant insert article
","sucess":"0"}
server error ----->
{"code":"500","message":"server error
","sucess":"0"}
//--------------------------------------------**------------------------------------------------------
----------------------------------------------**-----------------------------------------------------
5-delete article 
delete article if token and article_id valid
url:/deletearticle.php
method:get
********************************
params:  token / article_id    *
all of this param are requried *
********************************
request:---------------------------->
http://localhost/webService/lab3/deletearticle.php?token=LdgjHPK1nnQb1NzK4EV0&article_id=1
response:<----------------------------
sucess---->
{"code":"200","message":" delete article sucess","sucess":"1"}
//----------------------------------------------**----------------------------------------------------
------------------------------------------------**----------------------------------------------------
6-view all article
select all article if token vaild
url:/viewarticles.php
method:get
**********************************
params:  token                   *
all of this param are requried   *
**********************************
request:---------------------------->
http://localhost/webService/lab3/viewarticles.php?token=LdgjHPK1nnQb1NzK4EV0
response:<----------------------------
sucess---->
{"code":"200","message":"select sucessfuly","success":"true","article":[{"id":"27","user_id":"1","title":"test2","body":"test2"},{"id":"28","user_id":"1","title":"article 2","body":"article 2"}]}
//-----------------------------------------------**--------------------------------------------------
-------------------------------------------------**--------------------------------------------------
7-view article
select specific  article if token and article_id  vaild
url:/viewarticle.php
method:get
********************************
params:  token / id            *
all of this param are requried *
********************************
request:---------------------------->
http://localhost/webService/lab3/viewarticle.php?token=LdgjHPK1nnQb1NzK4EV0&id=27
response:<----------------------------
sucess---->
{"code":"200","message":"select sucessfuly","success":"true","article":{"id":"27","user_id":"1","title":"test2","body":"test2"}}
//-----------------------------------------------**---------------------------------------------------
-------------------------------------------------**---------------------------------------------------


