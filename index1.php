<?php

include './include/db-config.php';
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>My First Web Project</title>
     



    </head>
    <body>
        <?php include './include/header.php'; ?>

        <div class="container">
            <a href="add-records.php" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i>&nbsp; Lisää uusi </a>


        </div>

        <div class="clearfix"></div></br>

        <div class="container">
            <table id="myTable" class="table table-bordered table-responsive">
              
                    <tr>
                        <th style="text-align: center;">Henkilönumero</th>
                        <th  style="text-align: center;">Etunimi</th>
                        <th  style="text-align: center;">Sukunimi</th>
                        <th  style="text-align: center;">S.Posti</th>
                        <th style="text-align: center;">Puhelin</th>
                        <th  style="text-align: center;" colspan="2">Toiminto</th>
                    </tr>
              
             
                 <?php
                 $query="select * from users";
                 $record_per_page=3;
                 $query2=$crud->paging($query,$record_per_page);
                
                 $crud->dataview($query2);
                 ?>

                    <tr>
                        <td colspan="7" align="center">
                            <div class="pagination-wrap">
                                <?php   $crud->pagelink($query, $record_per_page);    ?>
                                
                            </div>
                        </td>
                        
                    </tr>






            </table>




        </div>

      <?php include './footer.php' ?> 








    </body>
  
</html>
