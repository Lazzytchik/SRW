<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/messages.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        
            $host = "localhost";
		    $login = "root";
		    $pas = "";
                    
            $link = mysqli_connect($host, $login, $pas) or die("NO");
		    mysqli_select_db($link, 'messanger') or die('NO DATABASE CALLED');
                    
            $query = "SELECT * FROM messages JOIN users on users.user_id = messages.user_id ORDER BY m_date DESC";
            $result = mysqli_query($link, $query);
            
            while($row = mysqli_fetch_assoc($result)){
                echo("<div class='message'><p><b>".$row['username']."</b></p><p class='date'>".$row['m_date']."</p><p>".$row['message']."</p></div>");
            }
        ?>
    </body>
    
</html>