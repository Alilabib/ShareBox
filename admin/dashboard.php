<?php
  include"../init.php";
  include ("../".$tpl."header.php");
?>

    <div class="container">
      <?php
        $sql  ="SELECT * FROM books";
        $stmt =$conn->query($sql);
        $count=$stmt->rowCount();
        ?>
 
    <table class="table table-striped" >
        <tr>
            <th>ID          </th>
            <th>Title       </th>
            <th>Author      </th>
            <th>Status      </th>
            <th>Edit || Delete</th>
        </tr>
      
         <?php
         while($row=$stmt->fetch(PDO::FETCH_OBJ)){
        ?>
        <tr>
            <td><?php echo $row->id;    ?></td>
            <td><?php echo $row->title; ?></td>
            <td><?php echo $row->author;?></td>
            <td><?php echo $row->active;?></td>
            <td><a class="btn btn-info" href="">Edit</a> || <a class="btn btn-danger" href
            ="">Remove</a></td>
            
        </tr>
        <?php } ?>
    </table>



<?php
  include "../".$tpl."footer.php";
?>