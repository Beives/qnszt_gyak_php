<?php 
define("TITLE", "TEAM | Basic restaurant");
include('includes/header.php');
?>

<div class="cf">
    <h1>Team desc here</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco <strong>laboris nisi ut aliquip ex ea commodo consequat.</strong> </p>
    <hr>
    
    <!-- foreach start -->
    <?php 
        foreach($teamMembers as $member){
    ?>
    
    <div class="member">
        <img src="img/<?php echo $member['img']; ?>.png" alt="<?php echo $member['name']; ?>">
        <h2><?php echo $member['name']; ?></h2>
        <p><?php echo $member['bio']; ?></p>
    </div>
    
    <?php
        }
    ?>

    <!-- foreach ends -->
</div>
<?php
include('includes/footer.php');
?>