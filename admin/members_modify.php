<?php
    define("TITLE", "Admin | Basic restaurant");
    include('admin_includes/header.php');

    $id = $_GET['modifyid'];

    $get_query = "SELECT * FROM team_members WHERE id=".$id;
    $result = mysqli_query($conn,$get_query);

    if ($err = mysqli_error($conn)) {
        echo $err;
    }
    else{
        $row = mysqli_fetch_assoc($result);
    }
        ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card text-center">
                <div class="card-header">Team member modification</div>
                <?php         
                    if ($err = mysqli_error($conn)) {
                        echo $err;
                    }
                ?>
                <div class=card-body>
                    <form action="members.php?modifyid=<?php echo $row['id'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="member_name">Member name</label>
                            <input type="text" name="member_name" class="form-control" value="<?php echo $row['name'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="member_pos">Position</label>
                            <input type="text" name="member_pos" class="form-control" value="<?php echo $row['position'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="member_bio">Biography</label>
                            <textarea name="member_bio" class="form-control"><?php echo $row['bio'] ?></textarea>
                        </div>

                        <div class="form-group">
                        <?php echo '<img class="img-thumbnail" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/>';?>
                            <input type="file" name="member_image" class="form-control">
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <div class="form-group">
                            <button type="submit" name="update_submit" class="btn btn-primary">Submit</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('admin_includes/footer.php'); ?>