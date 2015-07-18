


<?php
session_start();
include 'connect.php';
include 'header.php';
$sql = 'SELECT * FROM categories';
$result = mysql_query($sql);
if(!$result){  
    echo 'The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.The categories could not be displayed, please try again later.';  
}  
else{  
    if(mysql_num_rows($result) == 0)    {  
        echo 'No categories defined yet.';  
    }  
    else{   
        echo '<center>
				<div class="table-responsive" style="width: 80%; background: rgba(255,127,85,0.5)">
					<table class="table table-bordered"style="text-align: center;">
						<tr>
		    				<th style="width: 40%; text-align: center; text-decoration: underline;">Category</th>
		    				<th style="width: 60%; text-align: center; text-decoration: underline;">Last Topic</th>
	    				</tr>';   
              
        while($row = mysql_fetch_assoc($result))  
        {                 
            echo '<tr>';  
                echo '<td>';  
                    echo '<h3><a style="color: red;" href="category.php?id=' .$row['cat_id']. '">' . $row['cat_name'] . '</a></h3><p>' . $row['cat_description'].'</p>';  
                echo '</td>';  
                echo '<td>';  
                $sql1 = 'select topic_subject, topic_id, topic_date from topics where topic_cat='. $row['cat_id'] .' ORDER BY topic_id desc limit 1';
                $result1 = mysql_query($sql1);
                $row1 = mysql_fetch_assoc($result1);
                if(mysql_num_rows($result1)!=0)
                            echo '<h3><a style="color: green;" href="topic.php?id=' . $row1['topic_id'] . '">' . $row1['topic_subject'] . '</a> on ' .date('d-m-Y', strtotime($row1['topic_date'])).'</h3>';
                else
                            echo 'No topic posted.';  
                echo '</td>';  
            echo '</tr>';  
        }
        echo "</table>";
        echo"</div>";
        echo "</center>";  
    }  
}

include 'footer.php';
?>