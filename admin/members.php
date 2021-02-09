<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');


    if (isset($_POST['submit'])) {
        $image = addslashes(file_get_contents($_FILES['member_image']['tmp_name']));
        $query = "INSERT INTO team_members (name, position, bio,img) 
        VALUES ('".$_POST['member_name']."','".$_POST['member_pos']."','".$_POST['member_bio']."','".$image."')";
        
        mysqli_query($conn,$query);

        if ($err = mysqli_error($conn)) {
            echo $err;
        }
    }

    if (isset($_GET['deleteid'])) {
        $deleteQuery = "DELETE FROM team_members WHERE id=".$_GET['deleteid'];
        mysqli_query($conn,$deleteQuery);
    }

    if (isset($_POST['update_submit'])) {
        $update_query = "UPDATE team_members SET 
        name='".$_POST['member_name']."', 
        position='".$_POST['member_pos']."',
        bio='".$_POST['member_bio']."'";

        

        if (!empty($_FILES['member_image']['tmp_name'])) {
            $image = addslashes(file_get_contents($_FILES['member_image']['tmp_name']));
            $update_query .= ", img='".$image."'";
        }

        $update_query .= " WHERE id=".$_POST['id'];

        mysqli_query($conn,$update_query);
    }

?>

<div class="row">
        <div class="col-sm-5">
            <div class="card">
                <?php 
                
                if ($err = mysqli_error($conn)) {
                    echo $update_query;
                }
                
                ?>
                <div class="card text-center">
                    <div class="card-header">Add new team member</div>
                    <div class="card-body">
                        <form action="members.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="member_name">Member name</label>
                                <input type="text" name="member_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="member_pos">Position</label>
                                <input type="text" name="member_pos" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="member_bio">Biography</label>
                                <textarea name="member_bio" class="form-control"></textarea>
                                </div>

                            <div class="form-group">
                                <input type="file" name="member_image" class="form-control">
                                </div>

                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>    
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php 
    $query = "SELECT * FROM team_members";
    $result = mysqli_query($conn,$query);
?>
    <div class="col-sm-7">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td scope="col">Name</td>
                    <td scope="col">Position</td>
                    <td scope="col">Biography</td>
                    <td scope="col">Image</td>
                    <td scope="col">Actions</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['position'] ?></td>
                    <td><?php echo $row['bio'] ?></td>
                    <td><?php echo '<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/>';?></td>
                    <td>
                        <a style="color:white" class="btn btn-danger" href="?deleteid=<?php echo $row['id'] ?>">Delete</a>
                        <a style="color:black" class="btn btn-warning" href="members_modify.php?modifyid=<?php echo $row['id'] ?>">Modify</a>
                    </td>
                </tr> 
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('admin_includes/footer.php'); ?>