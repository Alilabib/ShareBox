<?php
  include"../init.php";
  include ("../".$tpl."header.php");
?>
    <div class="container">
          <?php
          if(isset($_GET['box'])){
            if($_GET['box']=="active"){
               $id= $_GET['id'];
               $sql="UPDATE books SET active=1 WHERE id =:id";
               $stmt=$conn->prepare($sql);
               $stmt->bindParam(":id",$id,PDO::PARAM_INT);
               $stmt->execute();
               header("Location:dashboard.php");
                } ?> 
            <?php 
             if($_GET['box']=="unactive"){
              $id= $_GET['id'];
              $sql="UPDATE books SET active=0 WHERE id =:id";
              $stmt=$conn->prepare($sql);
              $stmt->bindParam(':id',$id,PDO::PARAM_INT); 
              $stmt->execute();
              header("Location:dashboard.php");
          } ?>
          <?php
            if($_GET['box']=="edit"){
                $id = $_GET['id'];
                $sql="SELECT * FROM books WHERE id ='$id' ";
                $stmt=$conn->query($sql);
                $row=$stmt->fetch(PDO::FETCH_OBJ);
            if(isset($_POST['edit'])){
                $title = $_POST['title'];
                $author= $_POST['author'];
                $update = "UPDATE books SET title=:title,author=:author WHERE id='$id'";
                $updatestmt=$conn->prepare($update);
                $updatestmt->bindParam(':title',$title,PDO::PARAM_STR);
                $updatestmt->bindParam(':author',$author,PDO::PARAM_STR);
                $updatestmt->execute();
                header("Location:dashboard.php");
            }
            ?>
            
            <form class="form-horizontal" action="" method="POST" >
               <fieldset>
                    <!-- Text input-->
                    <div class="control-group">
                    <label class="control-label" for="textinput">Title</label>
                    <div class="controls">
                        <input id="title" name="title" value="<?php echo $row->title; ?>" type="text" placeholder="Title" class="input-xlarge">
                    </div>
                    </div>
                    <!-- Text input-->
                    <div class="control-group">
                    <label class="control-label" for="textinput">Author</label>
                    <div class="controls">
                        <input id="Author" name="author" value="<?php echo $row->author; ?>" type="text" placeholder="Author" class="input-xlarge">
                    </div>
                    </div>
                    <!-- Button -->
                    <div class="control-group">
                    <label class="control-label" for="singlebutton">ADD</label>
                    <div class="controls">
                        <button id="button" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                    </div>
                 </fieldset>
              </form>
                   
          <?php } ?>
          <?php 
            if($_GET['box']=="delete"){
                $id = $_GET['id'];
                $sql="DELETE FROM books WHERE id ='$id' ";
                $conn->query($sql);
                header("Location:dashboard.php");
            } ?>

       <?php }else{?>   
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
            <td>
             <?php if($row->active==0){?>
                <a href="dashboard.php?box=active&id=<?php echo urlencode($row->id); ?>" class="btn btn-info">Active</a>
            <?php }else{ ?>
                <a href="dashboard.php?box=unactive&id=<?php echo urlencode($row->id); ?>" class="btn btn-info">UnActive</a>
            <?php } ?>
             </td>
                
            <td><a class="btn btn-primary" href="dashboard.php?box=edit&id=<?php echo urlencode($row->id); ?>">Edit  </a>
             || <a class="btn btn-danger"  href="dashboard.php?box=delete&id=<?php echo urlencode($row->id); ?>">Remove</a>
            </td>
            
        </tr>
        <?php } ?>
    </table>

<?php } ?>

<?php
  include "../".$tpl."footer.php";
?>