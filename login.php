<?php include('server.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Kar lo</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>Sign in</h2>
    </div>
    <form action="login.php" method="POST" >
        <?php include('errors.php');?>
        <div class="input-group">
            <label>username</label>
            <input type="text" id="user" name="username">
        <div class="input-group">
            <label>password</label>
            <input type="password" id="password" name="password">
        </div>
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">login</button>
        </div>
        <p>Not yet a member?<a href="register.php">  sign up</a>
    </p>
    </form>
    
</body>
</html>