<?php
include './include/header.php';
include './include/db-config.php';
?>
<?php
if(isset($_POST['btn-del']))
{
    $id=$_GET['id'];
    $crud->delete($id);
    header("location:delete.php?deleted");
    
}



?>

<div class="container">
<?php
if(isset($_GET['deleted']))
{
?>
    <div class="alert alert-success">
        <strong>Success!</strong>record was deleted
    </div>

<?php
} else {
?>
 <div class="alert alert-danger">
        <strong>Sure!</strong>to remove following record!!
    </div>
    
    
 <?php
}
?>
</div>
<div class="container">
   <?php
   if(isset($_GET['id']))
   {
   ?>
    <table class="table table-bordered">
        <tr>
            <th>S.no</th>
            <th>First name</th>
            <th>last name</th>
            <th>Email</th>
            <th>Contact number</th>
        </tr>
        <?php
            $stmt=$db->prepare("select * from users where id=:id");    
            $stmt->execute(array(":id"=>$_GET['id']));
            while($row=$stmt->fetch(PDO::FETCH_ASSOC))
            {
        
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contact']; ?></td>
        </tr>
        
        
        
        <?php 
            }?>
    </table>    
       
   <?php
   
   }
   ?>
 </div>     

<div class="container">
    <p>
        <?php
        if(isset($_GET['id']))
        {
        ?>
    <form method="post">
        <button class="btn  btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i>&nbsp; Yes</button>
        <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; No</a>
        
    </form>
        
        <?php
        
        }
        else {
        ?>
        
         <a href="index.php" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i>&nbsp; Back To Index</a>
        <?php 
        }?>
    </p> 
    
    
    
    
</div>
 <?php include './footer.php' ?> 

        


