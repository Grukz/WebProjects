<?php
session_start();
include 'connect.php';
include 'header.php';
if($_SESSION['signed_in'] == false)  
{  
    echo '<center><div class="alert alert-warning" style="width: 40%;">Sorry, you have to be <a href="signin.php">signed in</a> to create a topic.</div></center>';  
}  
else  
{  
    if($_SERVER['REQUEST_METHOD'] != 'POST')  
    {     
        $sql = "SELECT 
                    cat_id, 
                    cat_name, 
                    cat_description 
                FROM 
                    categories";  
          
        $result = mysql_query($sql);  
          
        if(!$result)  
        {  
            echo '<center><div class="alert alert-warning" style="width: 40%;">Error while selecting from database. Please try again later.</div></center>'; 
        } 
        else 
        { 
            if(mysql_num_rows($result) == 0) 
            { 
                if($_SESSION['user_level'] == 1)  
                {  
                    echo '<center><div class="alert alert-warning" style="width: 40%;">You have not created categories yet.</div></center>';  
                }  
                else  
                {  
                    echo '<center><div class="alert alert-warning" style="width: 40%;">Before you can post a topic, you must wait for an admin to create some categories.</div></center>';  
                }  
            }  
            else  
            {  
          
                echo '<div class="container">
						<center>
							<form method = "POST" class="form-horizontal" role="form" style="width: 50%;">
		  						<div class="form-group">
		    						<label for="" class="col-sm-2 control-label">Subject</label>
		    						<div class="col-sm-10">
		      							<input id="asksub" type="Subject" class="form-control" name="topic_subject" placeholder="Subject">
		    						</div>
                                    <label id="subwar" style="color: red; float: right;">*Empty</label>
		  						</div>
		  						<div class="form-group">
		    						<label for="" class="col-sm-2 control-label">Category</label>
		    						<div class="col-sm-10">';   
                  
                echo '<select class="form-control" name="topic_cat">';  
                    while($row = mysql_fetch_assoc($result))  
                    {  
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';  
                    }  
                echo '</select>';   
                      
                echo '		    	</div>
		  						</div>
		  						<div class="form-group">
		  							<label for="" class="col-sm-2 control-label">Question</label>
		  							<div class="col-sm-10">
		  								<textarea id="asktxt" class="form-control" name="post_content" placeholder="Question here..."></textarea>
		  							</div>
                                    <label id="queswar"style="color: red; float: right;">*Empty</label>
		  						</div>
		  						<div class="form-group">
		    						<div class="col-sm-offset-2 col-sm-10">
		      							<button type="submit" id="askbtn" class="btn btn-success">Ask</button>
		    						</div>
		  						</div>
							</form>
						</center>
					</div>';  
            }  
        }  
    }  
    else  
    {  
        $query  = "BEGIN WORK;";  
        $result = mysql_query($query);  
          
        if(!$result)  
        {  
            echo '<center><div class="alert alert-warning" style="width: 40%;">An error occured while creating your topic. Please try again later.</div></center>';  
        }  
        else  
        {  
      
            $sql = "INSERT INTO  
                        topics(topic_subject, 
                               topic_date, 
                               topic_cat, 
                               topic_by) 
                   VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "', 
                               NOW(), 
                               " . mysql_real_escape_string($_POST['topic_cat']) . ", 
                               " . $_SESSION['user_id'] . " 
                               )"; 
                      
            $result = mysql_query($sql); 
            if(!$result) 
            { 
                echo '<center><div class="alert alert-warning" style="width: 40%;">An error occured while inserting your data. Please try again later.' . mysql_error(). '</div></center>'; 
                $sql = "ROLLBACK;"; 
                $result = mysql_query($sql); 
            } 
            else 
            { 
                $topicid = mysql_insert_id(); 
                 
                $sql = "INSERT INTO 
                            posts(post_content, 
                                  post_date, 
                                  post_topic, 
                                  post_by) 
                        VALUES 
                            ('" . mysql_real_escape_string($_POST['post_content']) . "', 
                                  NOW(), 
                                  " . $topicid . ", 
                                  " . $_SESSION['user_id'] . " 
                            )"; 
                $result = mysql_query($sql); 
                 
                if(!$result) 
                { 
                    echo '<center><div class="alert alert-warning" style="width: 40%;">An error occured while inserting your post. Please try again later.' . mysql_error() . '</div></center>'; 
                    $sql = "ROLLBACK;"; 
                    $result = mysql_query($sql); 
                } 
                else 
                { 
                    $sql = "COMMIT;"; 
                    $result = mysql_query($sql); 
                      
                    echo '<center><div class="alert alert-success" style="width: 40%;">You have successfully created <a href="topic.php?id='. $topicid . '">your new topic</a>.</div></center>';
                } 
            } 
        } 
    } 
}

include 'footer.php';
?>