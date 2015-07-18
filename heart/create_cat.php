<?php
session_start();  
include 'connect.php';
include 'header.php';
  
if($_SERVER['REQUEST_METHOD'] != 'POST')  
{   
    echo "<form method='post' action=''>  
        Category name: <input type='text' name='cat_name' />  
        <br>Category description: <textarea name='cat_description' /></textarea>  
        <br><input type='submit' value='Add category' />  
     </form>"; 
} 
else 
{  
    if($_POST['cat_name']!=null && $_POST['cat_description']!=null)
    {
        $sql = "INSERT INTO categories(cat_name, cat_description) 
           VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',  
                 '" . mysql_real_escape_string($_POST['cat_description']) . "')";  
        $result = mysql_query($sql);  
        if(!$result)  
        {    
            echo 'Error' . mysql_error();  
        }  
        else  
            {  
                echo 'New category successfully added.';  
            }
    }
    else{
        header('location: create_cat.php');
    }

}
include 'footer.php';  
?>  