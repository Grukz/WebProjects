<?php	echo '<div class="container" id="last" style="width: 90%; margin-top: 10px;">
			<center><div id="loaderImage"></div></center>
		</div>		

		<div class="container" style="background: white; width: 90%; border-radius: 10px; margin-top: 20px;">
			<center>
				<form method="POST" class="form-horizontal" role="form">
					<div class="form-group">
			    		<label for="name" style="margin-top: 20px; font-size: 30px;">Post a reply:</label>
			  		</div>
			      	<textarea name="reply-content" id="answer" class="form-control" style="width: 100%; height: 100px; margin-bottom: 5px; font-size: 20px;" placeholder="Answer here..."></textarea>
                    <center id="warning"><p style="color: red; font-weight: bold;">*Text field empty</p></center>
					<center id="warning1"><p style="color: red; font-weight: bold;">*Please Sign In.</p></center>
                    <div class="from-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" name="get" id="post" value="'. $_GET['id'].'" class="btn btn-warning navbar-btn pull-right">Post Reply</button>
						</div>
					</div>
				</form>	
			</center>
		</div>		
	</div>';

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
        $sql = "INSERT INTO posts(post_content, post_date, post_topic, post_by) VALUES ('" . $_POST['reply-content'] . "', NOW(), " . mysql_real_escape_string($_POST['get']) . ", " . $_SESSION['user_id'] . ")"; 
                         
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
        // echo "<br><p>Text field empty</p>";
    }
} 
?> 
