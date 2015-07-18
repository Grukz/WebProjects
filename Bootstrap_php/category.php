<?php  
session_start();
include 'connect.php';  
include 'header.php';  
if ($_GET['id']==null) {
        header('Location: index.php');
    } 
    
$sql = "SELECT 
            cat_id, 
            cat_name, 
            cat_description 
        FROM 
            categories 
        WHERE 
            cat_id = " . mysql_real_escape_string($_GET['id']);  
  
$result = mysql_query($sql);  
  
if(!$result)  
{  
    echo '<center><div class="alert alert-info" style="width: 40%;">The category could not be displayed, please try again later.' . mysql_error() . '</div></center>';  
}  
else  
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo '<center><div class="alert alert-info" style="width: 40%;">This category does not exist.</div><center>';  
    }  
    else  
    {   
        while($row = mysql_fetch_assoc($result))  
        {  
            echo '<center><h1 style="background-color: rgba(255,255,255,0.5); padding: 10px; border-radius: 20px; font-family: proxyNova; display: inline-block;">Topics in ' . $row['cat_name'] . ' category</h1><center>';  
        }  
        
        $sql = "SELECT   
                    topic_id, 
                    topic_subject, 
                    topic_date, 
                    topic_cat 
                FROM 
                    topics 
                WHERE 
                    topic_cat = " . mysql_real_escape_string($_GET['id']);  
          
        $result = mysql_query($sql);  
          
        if(!$result)  
        {  
            echo '<center><div class="alert alert-info" style="width: 40%;">The topics could not be displayed, please try again later.</div></center>';  
        }  
        else  
        {  
            if(mysql_num_rows($result) == 0)  
            {  
                echo '<center><div class="alert alert-info" style="width: 40%;">There are no topics in this category yet.</div></center>';  
            }  
            else  
            {  
                echo '<center>
                        <div class="table-responsive" style="width: 80%; background: rgba(255,127,85,0.5)">
                            <table class="table table-bordered"style="text-align: center;">
                                <tr>
                                    <th style="width: 40%; text-align: center; text-decoration: underline;">Topic</th>
                                    <th style="width: 60%; text-align: center; text-decoration: underline;">Created on</th>
                                </tr>';   
                      
                while($row = mysql_fetch_assoc($result))  
                {                 
                    echo '<tr>';  
                        echo '<td>';  
                            echo '<h4><a style="color: red;" href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><h4>';  
                        echo '</td>';  
                        echo '<td>';  
                            echo date('d-m-Y', strtotime($row['topic_date']));  
                        echo '</td>';  
                    echo '</tr>';  
                }
                echo "</table>";
                echo"</div>";
                echo "</center>";   
            }  
        }  
    }  
}  
  
include 'footer.php';  
?> 