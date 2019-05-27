<?php include './include/header.php'; ?>

<?php include './include/db-config.php'; ?>
<?php
if(isset($_POST['submit']))
{
   
    $first=$_POST['first'];
    $last=$_POST['last'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    
    if($crud->create($first,$last,$email,$contact)){
        header("location:add-records.php?insert");
    }
    else
    {
         header("location:add-records.php?fail");
    }
    
    
}
else
{
    
}
?>

<?php
if(isset($_GET['insert']))
{
    ?>
<div class="container">
    <div class="alert alert-info">
        <strong>Insert successfully</strong>
    </div>
    
    
</div>

<?php
}
?>
<?php
if(isset($_GET['fail']))
{
    ?>
<div class="container">
    <div class="alert alert-danger">
        <strong>Some problem!!</strong>
    </div>
    
    
</div>

<?php
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>My First Web Project</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="clearfix"></div></br>
        <div class="container">
            <form method="post">
                <table class="table table-bordered">
                    <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first" class="form-control" required="required"></td>
                     </tr>
                      <tr>
                        <td>last Name</td>
                        <td><input type="text" name="last" class="form-control" required="required"></td>
                     </tr>
                     <tr>
                        <td>Your E-mail ID</td>
                        <td><input type="email" name="email" class="form-control" required="required"></td>
                     </tr>
                      <tr>
                        <td>Contact No</td>
                        <td><input type="text" name="contact" class="form-control" required="required"></td>
                     </tr>
                     <tr>
                         <td colspan="2">
                             <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create new Records</button>
                             <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Back to index</a>
                             
                         </td>
                         
                         
                         
                     </tr>
                    
                    
                    
                </table>
                
                
                
                
                
                
                
            </form>
            
            
            
            
            
            
            
        </div>
        
        
        
        
    </body>

</html>    



