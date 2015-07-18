<?php
session_start();
include 'connect.php';
include 'header.php';

if ($_GET['id']==null){
    header('Location: index.php');
}


$sql = "SELECT 
        * 
    FROM 
        topics 
    WHERE 
        topic_id = " . mysql_real_escape_string($_GET['id']);  

  
$resulth = mysql_query($sql);
  
if(!$resulth){  
    echo '<center><div class="alert alert-info" style="width: 40%;">The category could not be displayed, please try again later.' . mysql_error() . '</div></center>';  
}else{
	if(mysql_num_rows($resulth) == 0){  
        echo 'This topic does not exist.';  
    }else{
    	        $sql = "SELECT   
                    *
                FROM 
                    posts 
                WHERE 
                    post_topic = " . mysql_real_escape_string($_GET['id']);  
          
        $result = mysql_query($sql);  
          
        if(!$result){  
            echo '<center><div class="alert alert-info" style="width: 40%;">The posts could not be displayed, please try again later.</div></center>';  
        }else{  
            if(mysql_num_rows($result) == 0){  
                echo '<center><div class="alert alert-info" style="width: 40%;">There are no posts in this topic yet.</div></center>';  
            }else{
            	echo '<div class="container" id="content">
							<div class="container" style="background: rgba(0,0,0,0.5); width: 90%;">
								<div>
									<p style="padding: 50px; font-size: 2em; color: white; font-weight: 200; font-family: proxyNova;">';

				$row = mysql_fetch_assoc($result);
				echo $row['post_content'];
				echo '				</p>
								</div>
								<div>
									<p style="float: left; color: white">Subject: ';
				$rowh = mysql_fetch_assoc($resulth);
				echo $rowh['topic_subject'];
				echo '				</p>
									<p style="text-align: right; font-style: italic; color: white;">Posted by <strong>';
				$query = 'select user_name from users where user_id = ' . $rowh['topic_by'];
				$res = mysql_query($query);
				$rw = mysql_fetch_assoc($res);
				echo $rw['user_name'];
				echo '</strong> on ';
				echo date('d-m-Y', strtotime($rowh['topic_date']));
				echo '				</p>
								</div>
							</div>';

				while ($row = mysql_fetch_assoc($result) ) {
					echo '<div class="container" style="background: rgba(255,127,85,0.5); color: black; width: 90%; margin-top: 10px; border: 2px solid black; border-radius: 10px;">
							<div  style="padding: 10px; font-weight: bold;  word-wrap: break-word; text-align: right; border-bottom: 4px solid black;">				
								<p style="float: left; font-size: 1.2em; background: rgba(255,255,255,0.5); padding: 5px; border-radius: 1em;"> ';
					$qry = 'select user_name from users where user_id = ' .$row['post_by'];
					$rs = mysql_query($qry);
					$ro = mysql_fetch_assoc($rs);
					echo $ro['user_name'];
					echo '		</p>
								<p>';
					echo date('d-m-Y', strtotime($row['post_date']));						
					echo '		</p>
							</div>
							<div  style="overflow: hidden; padding: 20px; font-size: 1.25em; line-height: 1.5em;">';
					echo $row['post_content'];
					echo '	</div>
						  </div>';			
				}
			}
		}

    }
}
include 'reply.php';
include 'footer.php';
?>