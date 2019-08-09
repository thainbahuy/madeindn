<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    Dear {{$mail}}
    <p>Please click here to reset your password. </p><p><a href="{{route('view.admin.Auth.resetpass',['token' => $token,'email'=>$mail])}}"></a>{{route('view.admin.Auth.resetpass',['token' => $token,'email'=>$mail])}}</p>
    Sincerely,
    <br/>
    MadeinDN Support Team<br>
    *** This is an automatically generated email, please do not reply ***
</div>
</body>
</html>
