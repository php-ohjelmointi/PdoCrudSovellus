<?php
include './include/header.php';
include './include/db-config.php'
?>
<?php
if(isset($_POST['update']))
{
    
    $id=$_GET['id'];
     $first=$_POST['first'];
    $last=$_POST['last'];        
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    
    if($crud->update($id,$first,$last,$email,$contact))
    {
        $msg="<div class='alert alert-info'>
                <strong>Wow!</strong>Record was updated successfully <a href='index.php'>Home</a>
                </div>";
                  
    }
    else
    {
        $msg="<div class='alert alert-danger'>
                <strong>Sry!</strong>Record was not updated 
                </div>";
    }
    
    
    
}
?>

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    extract($crud->getID($id));
}


?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>My First Web Project</title>
       

    </head>
    <body>
        <div class="clearfix"></div></br>
        
        
        
        
        
        <div class="container">
            <?php
            if(isset($msg))
            {
             echo    $msg;
            }   
            
            ?>
            
            <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first" class="form-control" value="<?php echo $first_name; ?>" required="required"></td>
                     </tr>
                      <tr>
                        <td>last Name</td>
                        <td><input type="text" name="last" class="form-control" value="<?php echo $last_name; ?>" required="required"></td>
                     </tr>
                     <tr>
                        <td>Your E-mail ID</td>
                        <td><input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required="required"></td>
                     </tr>
                      <tr>
                        <td>Contact No</td>
                        <td><input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>" required="required"></td>
                     </tr>
                     <tr>
                         <td colspan="2">
                             <button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Update Records</button>
                             <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>Cancel</a>
                             
                         </td>
                         
                         
                         
                     </tr>
                    
                    
                    
                </table>
                
                
                
                
                
                
                
            </form>
            
            
            
            
            
            
            
        </div>
        
         <?php include './footer.php' ?> 
        
        
    </body>

</html>    

