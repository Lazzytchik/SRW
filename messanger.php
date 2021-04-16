<?php
    session_start();
    //echo $_SESSION["username"];
    if(isset($_SESSION['user_id'])){
    }else{
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>

<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/mystyle.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <h1>Welcome to the test messanger</h1>
            <h3>Post your message!</h3>
        </header>
        <nav>
            <ul>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>
        <div class="content">
            <form class="messanger" name="form" method="post" action="messanger.php">
                <iframe class="output" id="frame" src="messages.php"></iframe>
                <div class="input-area">
                    <textarea class="input" name="input-message"></textarea>
                    <input type="submit" name="post" value="Post">
                </div>
            </form>
            
            <?php
                $host = "localhost";
		        $login = "root";
                $pas = "";
                    
                $link = mysqli_connect($host, $login, $pas) or die("NO");
		        mysqli_select_db($link, 'messanger') or die('NO DATABASE CALLED');
            
                $query = "SELECT * FROM messages";
                $result = mysqli_query($link, $query);
                    
                $id = mysqli_num_rows($result) + 1;
                
                $mes = NULL;
            
                if(isset($_POST['post'])){
                    
                    $mes = $_POST['input-message'];
                    $date = date("Y-m-d H:i:s");
                    
                    if(isset($_SESSION['user_id'])){
                        if(!empty($mes)){
                            echo $id;
                            echo $_SESSION['user_id'];
                            echo $date;
                            echo $mes;
                            $query = "INSERT INTO messages (`id`, `user_id`, `m_date`, `message`) VALUES (".$id.",".$_SESSION['user_id'].",'".$date."','".$mes."')";
                            $result = mysqli_query($link, $query);
                        }
                    }
                    
                    $_POST['post'] = null;
                } 
            ?>
            
        </div>
    </body>
</html>