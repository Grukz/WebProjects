<?php
session_start(); 
include 'connect.php'; 
include 'header.php';
$form =  '<div class="container">
		<center>
			<form method="POST" class="form-horizontal" role="form" style="width: 50%;">
  				<div class="form-group">
    				<label for="" class="col-sm-2 control-label">Username</label>
    				<div class="col-sm-10">
      					<input type="username" id="username" class="form-control" name="user_name" placeholder="Username">
    				</div>
  				</div>
  				<div class="form-group">
    				<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    				<div class="col-sm-10">
      					<input type="password" id="password" class="form-control" name="user_pass" placeholder="Password">
   	 				</div>
  				</div>
  				<div class="form-group">
    				<div class="col-sm-offset-2 col-sm-10">
      					<button type="submit" id="signin-button" class="btn btn-info">Sign in</button>
    				</div>
  				</div>
			</form>
		</center>
	</div>'; 
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)  
{  
    echo '<center><div class="alert alert-info" style="width: 40%;">You are already signed in, you can <a href="signout.php">sign out</a> if you want.</div></center>';  
}  
else  
{  
    if($_SERVER['REQUEST_METHOD'] != 'POST')  
    {  
        echo $form;
    } 
    else 
    { 
         
        $errors = array();

        if ( $_POST['user_name'] == '' || $_POST['user_pass'] == '' || !empty($errors) || strlen($_POST['user_name']) < 3 || strlen($_POST['user_pass']) < 6) {
             echo $form;
         } 
          
        if( $_POST['user_name'] == '')  
        {  
            $errors[] = '<div class="alert alert-danger" style="width: 40%;">The username field must not be empty.</div>';  
        }  
          
        if( $_POST['user_pass'] == '')  
        {  
            $errors[] = '<div class="alert alert-danger" style="width: 40%;">The password field must not be empty.</div>';  
        }  
          
        if(!empty($errors))   
        {   
            echo '<center><ul style="list-style: none;">'; 
            foreach($errors as $key => $value) 
                echo '<li>' . $value . '</li>';
            echo '</ul></center>'; 
        } 
        else 
        { 
            
            $sql = "SELECT  
                        user_id, 
                        user_name, 
                        user_level 
                    FROM 
                        users 
                    WHERE 
                        user_name = '" . mysql_real_escape_string($_POST['user_name']) . "' 
                    AND 
                        user_pass = '" . sha1($_POST['user_pass']) . "'";  
                          
            $result = mysql_query($sql);  
            if ( (!$result) || mysql_num_rows($result) == 0) {
                echo $form;
            }
            if(!$result)  
            {  
                 
                echo 'Something went wrong while signing in. Please try again later.'; 
               
            } 
            else 
            { 
                
                if(mysql_num_rows($result) == 0) 
                { 
                    echo '<center><div class="alert alert-danger" style="width: 40%;">You have supplied a wrong user/password combination. Please try again.</div></center>'; 
                } 
                else 
                { 
                    
                    $_SESSION['signed_in'] = true; 
                     
                  
                    while($row = mysql_fetch_assoc($result)) 
                    { 
                        $_SESSION['user_id']    = $row['user_id']; 
                        $_SESSION['user_name']  = $row['user_name']; 
                        $_SESSION['user_level'] = $row['user_level']; 
                    } 
                     
                    echo '<center><div class="alert alert-success" style="width: 40%;">Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.</div></center>';
                } 
            } 
        } 
    } 
}



?>



<?php
include 'footer.php';
?>