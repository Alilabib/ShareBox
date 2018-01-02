<?php
  include"../init.php";
  include ("../".$tpl."header.php");
?>
<?php
    if(isset($_POST['add-new'])){
        
        $title  = $_POST['title' ];
        $author = $_POST['author'];
        $active = $_POST['active']; 
        if(empty($title)||empty($author)){
            $errors[] = "All Fields Are requied";
        }else{
            $sql ="INSERT INTO books (title,author,active)VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1,$title,PDO::PARAM_STR);
            $stmt->bindParam(2,$author,PDO::PARAM_STR);
            $stmt->bindParam(3,$active,PDO::PARAM_INT);
            $stmt->execute();
            $success="Data Added successfully";
        } 
    }

?>


<div class="container">
    <?php 
    if(isset($success)){
        echo'<div class="alert alert-success">'.$success.'</div>';
    }
        if(isset($errors)){
            foreach($errors as $error){
                echo'<div class="alert alert-danger">'.$error.'</div>';
            }
        }
    ?>
            <form class="form-horizontal" action="addNew.php" method="POST" >
            <fieldset>

            <!-- Text input-->
            <div class="control-group">
            <label class="control-label" for="textinput">Title</label>
            <div class="controls">
                <input id="title" name="title" type="text" placeholder="Title" class="input-xlarge">
            </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
            <label class="control-label" for="textinput">Author</label>
            <div class="controls">
                <input id="Author" name="author" type="text" placeholder="Author" class="input-xlarge">
            </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
            <label class="control-label" for="selectbasic-0">Select Basic</label>
            <div class="controls">
                <select id="active" name="active" class="input-xlarge">
                <option value="0">un Active</option>
                <option value="1">Active</option>
                </select>
            </div>
            </div>

            <!-- Button -->
            <div class="control-group">
            <label class="control-label" for="singlebutton">ADD</label>
            <div class="controls">
                <button id="button" name="add-new" class="btn btn-primary">ADD</button>
            </div>
            </div>

            </fieldset>
            </form>

</div>



<?php
  include "../".$tpl."footer.php";
?>