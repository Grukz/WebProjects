<?php  
session_start();
include 'connect.php';  
include 'header.php';
if ($_GET['id']==null) {
        header('Location: index.php');
    }    
$sql = "SELECT 
        * 
    FROM 
        topics 
    WHERE 
        topic_id = " . mysql_real_escape_string($_GET['id']);  

  
$result = mysql_query($sql);
  
if(!$result)  
{  
    echo 'The category could not be displayed, please try again later.' . mysql_error();  
}  
else  
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo 'This topic does not exist.';  
    }  
    else  
    {   
        while($row = mysql_fetch_assoc($result))  
        {  
            echo '<h2>' . $row['topic_subject'] . '</h2>';  
        }  
        
        $sql = "SELECT   
                    *
                FROM 
                    posts 
                WHERE 
                    post_topic = " . mysql_real_escape_string($_GET['id']);  
          
        $result = mysql_query($sql);  
          
        if(!$result)  
        {  
            echo 'The posts could not be displayed, please try again later.';  
        }  
        else  
        {  
            if(mysql_num_rows($result) == 0)  
            {  
                echo 'There are no posts in this topic yet.';  
            }  
            else  
            {  
                echo '<table border="1"> 
                      <tr> 
                        <th>Posted by</th> 
                        <th>Posts</th> 
                      </tr>';   
                      
                while($row = mysql_fetch_assoc($result))  
                {                 
                    $res=mysql_query("SELECT user_name FROM users WHERE user_id=" . $row['post_by']);
                    $name=(mysql_fetch_assoc($res));
                    echo '<tr>';  
                        echo '<td class="leftpart">';  
                            echo '<h3>' .$name[user_name].  '<h3>';
                            echo date('d-m-Y', strtotime($row['post_date']));  
                        echo '</td>';  
                        echo '<td class="rightpart">';
                            echo '<p>' .$row['post_content']. '</p>';                              
                        echo '</td>';  
                    echo '</tr>';
                }  
                echo "</table>";  
            }  
        }  
    }  
}
include 'reply.php';
include 'footer.php';
 
?> 