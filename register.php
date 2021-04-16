<html lang="en">
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1>Welcome to the test messanger</h1>
            <h3>Register</h3>
        </header>
        <div class="content">
            <form class="form" method="post" action="register.php">
                <div class="space">
                    <label>Login</label>
                    <input name="username" type="text">
                </div>
                <div class="space">
                    <label>Password</label>
                    <input name="password" type="password">
                </div>
                <div class="space">
                    <label>Email</label>
                    <input name="email" type="email">
                </div>
                <a href="index.php" class="space">
                    <label class="reg">Log in</label>
                </a>
                <input type="submit" class="space" name="reg" value="Register">
                <?php 
                    
                    $host = "localhost";
				    $login = "root";
				    $pas = "";
                    
                    $link = mysqli_connect($host, $login, $pas) or die("NO");
				    mysqli_select_db($link, 'messanger') or die('NO DATABASE CALLED');
                    
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($link, $query);
                    
                    $id = mysqli_num_rows($result) + 1;
                
                    if(isset($_POST['reg'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $email = $_POST['email'];
                        
                        //Запрос на проверку, сущетвует ли пользователь с таким же логином
                        $uquery = "SELECT * FROM users WHERE username = '".$username."'";
                        $uresult = mysqli_query($link, $uquery);
                        
                        if($username == "" or $password == "" or $email == ""){
                            //echo "<script>alert('')</script>";
                        }else if(mysqli_num_rows($uresult) > 0){
                            echo "<script>alert('Username has already taken')</script>";
                        }else{
                            $query = "INSERT INTO `users`(`user_id`, `username`, `password`, `email`) VALUES (".$id.",'".$username."','".$password."','".$email."')";
                            mysqli_query($link, $query);
                            echo "<script>alert('Registration is sucsessful')</script>";
                            
                            $username = "";
                            $password = "";
                            $email = "";
                        }
                    }
                ?>
                
            </form>
        </div>
    </body>
</html>