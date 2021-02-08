<?php
    define("TITLE", "Menu | Basic restaurant");
    include('includes/header.php') 
?>


<div id="menu-items">
    <h1>Our menu</h1>
    <p>Small but &mdash; dang menu</p>
    <p><em>Click on any item to learn more</em></p>
    <ul>
        <?php foreach($menuItems as $dish => $item){ ?>
            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item['title']; ?> <sup>$</sup><?php echo $item['price']; ?></a></li>
        <?php } ?>
    </ul>
</div>

<?php include('includes/footer.php') ?>