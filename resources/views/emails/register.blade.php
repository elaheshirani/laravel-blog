<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
{{$user->name." ".$user->family}} your verify code is bellow .<br>
your code : {{$user->verify_token}}
<a href="http://loclhost:8000/api/v1/verifyEmail/{{$user->verify_token}}" target="_blank">click me</a>
</body>
</html>