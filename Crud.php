<?php

class Crud {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($first, $last, $email, $contact) {
        try {
            $stmt = $this->db->prepare("insert into users(first_name,last_name,email,contact) values(:first,:last,:email,:phone)");
            $stmt->bindparam(":first", $first);
            $stmt->bindparam(":last", $last);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":phone", $contact);
            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function delete($id) {
        $stmt = $this->db->prepare("Delete from users where id=:id");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        return true;
    }

    public function getID($id) {
        $stmt = $this->db->prepare("select * from users where id=:id");
        $stmt->execute(array(":id" => $id));
        $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
        return $editrow;
    }

    public function update($id, $first, $last, $email, $contact) {

        try {

            $stmt = $this->db->prepare("update users set first_name=:fname,last_name=:last,email=:email,contact=:cont where id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":fname", $first);
            $stmt->bindparam(":last", $last);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":cont", $contact);
            $stmt->execute();
            return true;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function dataview($query) {

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td><?php
                if (isset($row['id'])) {
                    print($row['id']);
                }
                ?></td>
                    <td><?php
                if (isset($row['first_name'])) {
                    print($row['first_name']);
                }
                ?></td>    
                    <td><?php
                if (isset($row['last_name'])) {
                    print($row['last_name']);
                }
                ?></td>  
                    <td><?php
                if (isset($row['email'])) {
                    print($row['email']);
                }
                ?></td> 
                    <td><?php
                if (isset($row['contact'])) {
                    print($row['contact']);
                }
                ?></td> 
                    <td align="center"><a href="edit.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-edit"></a></td>
                    <td align="center"><a href="delete.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                </tr>         

                <?php
            }
        } else {
            ?>
            <tr>
                <td>Nothing here...</td>
            </tr>
            <?php
        }
    }

    public function paging($query, $record_per_page) {
        $starting_position = 0;
        if(isset($_GET['page_no']))
        {
            $starting_position=($_GET['page_no']-1)*$record_per_page;
        }
        $query2 = $query . " limit $starting_position,$record_per_page";
        return $query2;
    }

    public function pagelink($query, $record_per_page) {
        $self = $_SERVER['PHP_SELF'];
            
        $stmt=$this->db->prepare($query);
        $stmt->execute();
        
        $total_no_of_records=$stmt->rowCount();
       
        if($total_no_of_records > 0)
        {
        ?>
            <ul class="pagination">
             <?php
              
             $total_no_pages=ceil($total_no_of_records/$record_per_page);
             $current_page=1;
             if(isset($_GET["page_no"]))
             {
             $current_page=$_GET["page_no"];
             }
             if($current_page!=1)
             {
                 $previous=$current_page-1;
                echo "<li><a href='".$self."?page_no=1'>First</a></li>";
                echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
             }
            
             for($i=1;$i<=$total_no_pages;$i++)
             {
                 if($i==$current_page)
                 {
                     echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
                 }
                 else
                 {
                     echo "<li><a href='".$self."?page_no=".$i."''>".$i."</a></li>";
                 }
                 
                 
             }
             
              if($current_page!= $total_no_pages)
             {
                 $next=$current_page+1;
               	echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
                echo "<li><a href='".$self."?page_no=".$total_no_pages."'>last</a></li>";
             }
             
             
             
             
             
             
             
             ?>


                
            </ul>
            
            
            
         <?php   
        }
        
        
       
        
        
        
        
        
        
        
        
        
        
        
        
    }

}
?>
