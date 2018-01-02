<?php
  include"../init.php";
  include ("../".$tpl."header.php");
?>

<div class="container">
    <table class="table table-striped" >
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
        </tr>
        <?php
        $sql="SELECT * FROM books WHERE active = 1";
        $stmt=$conn->query($sql);
        $id = 0;

        
        ?>
         <?php
         while($row=$stmt->fetch(PDO::FETCH_OBJ)){
        ?>
        <tr>
            <td><?php echo ++$id;       ?></td>
            <td><?php echo $row->title; ?></td>
            <td><?php echo $row->author;?></td>
        </tr>
        <?php } ?>
    </table>

</div>

<?php
  include "../".$tpl."footer.php";
?>