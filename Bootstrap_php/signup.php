<?php
session_start();
include 'connect.php'; 
include 'header.php';

$regform =  '<div class="container">
		<center>
			<form class="form-horizontal" role="form" style="width: 50%;" method="POST">
  				<div class="form-group">
  					<label for="" class="col-sm-2 control-label">Username</label>
  					<div class="col-sm-10">
  						<input type="username" class="form-control" name="user_name" placeholder="Username">
  					</div>
  				</div>
			  	<div class="form-group">
			    	<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
			    	<div class="col-sm-10">
			      		<input type="password" class="form-control" name="user_pass" placeholder="Password">
			    	</div>
			  	</div>
  				<div class="form-group">
    				<label for="inputPassword3" class="col-sm-2 control-label">Confirm</label>
    				<div class="col-sm-10">
      					<input type="password" class="form-control" name="user_pass_check" placeholder="Confirm password">
    				</div>
  				</div>		  
  				<div class="form-group">
    				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    				<div class="col-sm-10">
      					<input type="email" class="form-control" name="user_email" placeholder="Email">
    				</div>
  				</div>
  				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
      					<button type="submit" class="btn btn-danger">Register</button>
    				</div>
  				</div>
			</form>
		</center>
	</div>';
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)  
{  
    echo '<center><div class="alert alert-info" style="width: 40%;">You are already signed in, you can <a href="signout.php">sign out</a> if you want.</div></center>';  
} 

else{      
    if($_SERVER['REQUEST_METHOD'] != 'POST')  
    {  
          
        echo $regform;     
    } 
    else 
    { 
       
        $errors = array();
         if ( $_POST['user_name'] == '' || $_POST['user_pass'] == '' || !empty($errors) || (!ctype_alnum($_POST['user_name'])) || (strlen($_POST['user_name']) > 30) || (isset($_POST['user_pass'])) || ($_POST['user_pass'] != $_POST['user_pass_check']) ) {
             echo $regform;
         } 
          
        if($_POST['user_name'] != '')  
        {  
            $sql1 = 'select user_name from users';
            $result1 = mysql_query($sql1);
            while ( $row1 = mysql_fetch_assoc($result1) ) {
                if($_POST['user_name'] == $row1['user_name']  ){
                    $errors[] = '<div class="alert alert-danger" style="width: 40%;">The username already exists!</div>';
                }
            }
            if(!ctype_alnum($_POST['user_name']))  
            {  
                $errors[] = '<div class="alert alert-danger" style="width: 40%;">The username can only contain letters and digits.</div>';  
            }  
            if(strlen($_POST['user_name']) > 30 || strlen($_POST['user_name']) < 3)  
            {  
                $errors[] = '<div class="alert alert-danger" style="width: 40%;">The username can be 3-30 characters long.</div>';  
            }  
        }  
        else  
        {  
            $errors[] = '<div class="alert alert-danger" style="width: 40%;">The username field must not be empty.</div>';  
        }  
          
          
        if( $_POST['user_pass'] != '')  
        {
          if( strlen($_POST['user_pass']) < 6)  
          {
            $errors[] = '<div class="alert alert-danger" style="width: 40%;">The password must contain atleast 6 characters</div>';  
          }
          if($_POST['user_pass'] != $_POST['user_pass_check'])  
          {  
              $errors[] = '<div class="alert alert-danger" style="width: 40%;">The two passwords did not match.</div>';  
          }  
        }  
        else  
        {  
            $errors[] = '<div class="alert alert-danger" style="width: 40%;">The password field cannot be empty.</div>';  
        }  
          
        if(!empty($errors))
        {  
            echo '<center><ul>'; 
            foreach($errors as $key => $value) 
            { 
                echo '<li>' . $value . '</li>'; 
            } 
            echo '</ul></center>'; 
        } 
        else 
        { 
            
            $sql = "INSERT INTO 
                        users(user_name, user_pass, user_email ,user_date, user_level) 
                    VALUES('" . mysql_real_escape_string($_POST['user_name']) . "', 
                           '" . sha1($_POST['user_pass']) . "', 
                           '" . mysql_real_escape_string($_POST['user_email']) . "', 
                            NOW(), 
                            0)";  
                              
            $result = mysql_query($sql);  
            if(!$result)  
            {  
                // echo $regform;
                echo '<center><div class="alert alert-danger" style="width: 40%;">Something went wrong while registering. Please try again later.</div></center>'; 
            } 
            else 
            { 
                echo '<center><div class="alert alert-success" style="width: 40%;">Successfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)</div></center>'; 
            } 
        } 
    } 
 }

include 'footer.php';
?>