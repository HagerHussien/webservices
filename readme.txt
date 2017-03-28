Restful API 

default  url:http://localhost/webservices/restfullApi/

description: signup and login for user and create ,view ,delete articles. 

retrun -->json 
------------------------------------------------------------------------
Create User

Returns json data about a create user.

URL
/create.php

Method:
GET

URL Params

Required:
name=[varchar]
email=[varchar]
passwd=[varchar]

Success Response:
Code: 200 
Content:{"code":"200","message":" user create success","sucess":"1"}

Error Response:
Code: 404 
Content: {"code":"400","message":"can not insert user","sucess":"0"}

------------------------------------------------------------------------------

Login User

Returns json data about a login user.

URL
/login.php

Method:
GET

URL Params

Required:
email=[varchar]
passwd=[varchar]

Success Response:
Code: 200 
Content:{"code":"200","message":" login success ","sucess":"1" ,"token":"xyz"}


Error Response:
Code: 404 
Content: {"code":"400","message":"is not authrize user","sucess":"0"}


------------------------------------------------------------------------------
User Info

Returns json data about a user info.

URL
/userinfo.php

Method:
GET

URL Params

Required:
token=[varchar]

Success Response:
Code: 200 
Content:{"code":"200","message":"select successfuly","success":"true","article":{"id":"1","email":"xyz@xyz.com","token":"xyz"}}


Error Response:
Code: 404 
Content: {"code":"400","message":"invalid user","sucess":"0"}

------------------------------------------------------------------------------
Create Article

Returns json data about a login user.

URL
/createarticle.php

Method:
GET

URL Params

Required:
title=[varchar]
body=[varchar]
token=[varchar]

Success Response:
Code: 200 
Content:{"code":"200","message":"create article success","sucess":"1"}


Error Response:
Code: 404 
Content: {"code":"400","message":"can not insert article","sucess":"0"}


------------------------------------------------------------------------------

Delete Article

Returns json data about a Delete Article.

URL
/deletearticle.php

Method:
GET

URL Params

Required:
id=[intger]
token=[varchar]


Success Response:
Code: 200 
Content:{"code":"200","message":" delete article success","sucess":"1"}


Error Response:
Code: 404 
Content: {"code":"400","message":"can not delete article","sucess":"0"}
