<?php 
        echo '<form method="post" action="">';
        echo '<h2>Post a reply</h2>';
        echo '<textarea name="reply-content"/></textarea>';
        echo '<br><input type="submit" value="Post"  />';
        echo "</form>";
if($_SERVER['REQUEST_METHOD'] != 'POST')  
{    
    //echo 'This file cannot be called directly.'; 
} 
else 
{ 
    if(!$_SESSION['signed_in']) 
    { 
        echo 'You must be signed in to post a reply.'; 
    } 
    else if (trim($_POST['reply-content']) != null)
    { 
        $sql = "INSERT INTO  
                    posts(post_content, 
                          post_date, 
                          post_topic, 
                          post_by)  
                VALUES ('" . $_POST['reply-content'] . "', 
                        NOW(), 
                        " . mysql_real_escape_string($_GET['id']) . ", 
                        " . $_SESSION['user_id'] . ")"; 
                         
        $result = mysql_query($sql); 
                         
        if(!$result) 
        { 
            echo '<br>Your reply has not been saved, please try again later.'; 
        } 
        else 
        { 
            echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.'; 
        } 
    }
    else{
        echo "<br><p>Text field empty</p>";
    }
} 
?> 