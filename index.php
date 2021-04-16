<html lang="en">
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1>Welcome to the test messanger</h1>
            <h3>Log in</h3>
        </header>
        <div class="content">
            <form class="form" method="post" action="index.php">
                <div class="space">
                    <label>Login</label>
                    <input name="username" type="text">
                </div>
                <div class="space">
                    <label>Password</label>
                    <input name="password" type="password">
                </div>
                <a href="register.php" class="space">
                    <label class="reg">Register</label>
                </a>
                <input type="submit" name="log" class="space" value="Log in">
                
                <?php 
                    
                    $host = "localhost";
				    $login = "root";
				    $pas = "";
                    
                    $link = mysqli_connect($host, $login, $pas) or die("NO");
				    mysqli_select_db($link, 'messanger') or die('NO DATABASE CALLED');
                    
                    $query = "SELECT * FROM users";
                    $result = mysqli_query($link, $query);
                    
                
                    if(isset($_POST['log'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                                             
                        if($username == ""){
                            echo "Enter username";
                        }
                        else{
                            $query = "SELECT username, password
                                    FROM users
                                    where username = '".$username."'";
                            $user = mysqli_query($link, $query);
                            
                            if(mysqli_num_rows($user) == 0){
                                echo "Wrong login";
                            }
                            else{
                                $row = mysqli_fetch_assoc($user);
                                if($row['password'] == $password){
                                    echo "<script>window.location.href = 'messanger.php';</script>";
                                }else{
                                    echo "Wrong password";
                                }
                            }
                            
                        }
                    }
                ?>
                
            </form>
        </div>
    </body>
</html>