<?php
session_start();
include 'connect.php';  
include 'header.php';  
  
$sql = 'SELECT 
            * 
        FROM 
            categories';  
  
$result = mysql_query($sql);
  
if(!$result)  
{  
    echo 'The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.';  
}  
else  
{  
    if(mysql_num_rows($result) == 0)  
    {  
        echo 'No categories defined yet.';  
    }  
    else  
    {   
        echo '<table border="1"> 
              <tr> 
                <th>Category</th> 
                <th>Last topic</th> 
              </tr>';   
              
        while($row = mysql_fetch_assoc($result))  
        {                 
            echo '<tr>';  
                echo '<td class="leftpart">';  
                    echo '<h3><a href="category.php?id=' .$row['cat_id']. '">' . $row['cat_name'] . '</a></h3>' . $row['cat_description'];  
                echo '</td>';  
                echo '<td class="rightpart">';  
                $sql1 = 'select topic_subject, topic_id, topic_date from topics where topic_cat='. $row['cat_id'] .' ORDER BY topic_id desc limit 1';
                $result1 = mysql_query($sql1);
                $row1 = mysql_fetch_assoc($result1);
                if(mysql_num_rows($result1)!=0)
                            echo '<a href="topic.php?id=' . $row1['topic_id'] . '">' . $row1['topic_subject'] . '</a> on ' . date('d-m-Y', strtotime($row1['topic_date']));
                else
                            echo 'No topic posted.';  
                echo '</td>';  
            echo '</tr>';  
        }
        echo "</table>";  
    }  
}  
  
include 'footer.php';  
?>