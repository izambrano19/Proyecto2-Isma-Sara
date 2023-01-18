<html>
    
<head>
    <meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="width=device-width,
    initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="shorcut icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body> 
    <form action="login-comprobar.php" id="formulario" method="post">
        <h1 class="title">Log in</h1>
        <label for="username">  
            <i class="fa-solid fa-user"></i>
            <input placeholder="username" type="text" id="username">
        </label>
        <label>
            <i class="fa-solid fa-lock"></i>
            <input placeholder="password" type="password" id="password">
        </label>
        <a href="form_password.html" class="link">Forgot your password?</a>
        <a href="index.html" class="button">Log In</a>
        <br>
        <input type="submit" value="Register" class="button">
    </form>

</body>
</html>