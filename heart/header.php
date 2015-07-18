<!doctype html>
<html lang="en"> 
<head>  
    <meta charset="UTF-8"> 
    <title>Welcome | Website Forum</title>  
    <link rel="stylesheet" href="styleforum.css" type="text/css">  
</head>  
<body>  
<h1>My forum</h1>  
    <div id="wrapper">  
    <div id="menu">  
              
               
            <div id="userbar">  
            <?php
            if($_SESSION['signed_in'])  
            {  
                echo 'Hello' . $_SESSION['user_name'] . '. Not you? <a href="signout.php">Sign out</a>';  
            }  
            else  
            {  
                echo '<li class = "style"><a href="signin.php" class="myButton">Sign in</a></li> <li>or</li> <li class = "style"><a href="signup.php" class="myButton">create an account</a></li>';  
            }?>
        </div>
        <div class="nav">
            <a class="item" href="/heart/index.php">Home</a> -  
            <a class="item" href="/heart/create_topic.php">Create a topic</a> -  
            <a class="item" href="/heart/create_cat.php">Create a category</a>           
        </div>    
            

    </div>  
        <div id="content">