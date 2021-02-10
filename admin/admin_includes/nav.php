<ul>
    <?php 

    $navItems = array(
        array(
            'slug' => "messages.php",
            'title' => "Messages"
        ),
        array(
            'slug' => "members.php",
            'title' => "Members"
        ),
        array(
            'slug' => "menu.php",
            'title' => "Menu"
        ),
        array(
            'slug' => "logout.php",
            'title' => "Log out"
        ),
    );

        foreach($navItems as $item){
            echo"<li><a href=\"$item[slug]\">$item[title]</a></li>";
        }
    
    ?>
</ul>