<?php 
define("TITLE", "Contact form | Basic restaurant");
include('includes/header.php');


?>

<div id="contact">
    <hr>
    <h1>Get in touch with us</h1>

    <?php 

    function HasHeaderInjection($str){
        return preg_match("/[\r\n]/", $str);
    }

    if(isset($_POST['contact_submit'])){
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $message = $_POST['message'];
    

        if(HasHeaderInjection($name) || HasHeaderInjection($email)){
            die();
        }

        if( !$name || !$name || !$message){
            echo '<h4 class="error">All fields required</h4><a href="contact.php" class="button block">Go back and try again</a>';
        }

        function sendMessage($name, $email, $message){
            $to = 'b.bakos98@gmail.com';
            $subject = "$name sent you a message";
            $message = "Name: $name\r\nEmail: $email\r\nMessage: \r\n$message";
        }

        if(isset($_POST['subscribe'])){
            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }

        $message = wordwrap($message, 72);

        $mailHeader = "Content-type: text/plain; charset=iso-8859-l\r\n";
        $mailHeader .= "From: $name <$email> \r\n";
        $mailHeader .= "X-Priority: 1\r\n X-MSMail-Priority: High";

        mail($to, $subject, $message, $mailHeader);
    ?>
    <h5>Thanks for contacting us</h5>
    <p>Please allow a couple of hours for a response</p>
    <p><a href="/final" class="button block">Go to home</a></p>
    <?php }else{ ?>

    <form action="contact.php" method="post" id="contact-form">
        <label for="name">Your name</label>
        <input type="text" name="name" id="name">

        <label for="email">Your email</label>
        <input type="email" name="email" id="email">

        <label for="message">Enter your message</label>
        <textarea name="message" id="message"></textarea>

        <input type="checkbox" value="Subscribe" name="subscribe" id="subscibe">
        <label for="subscribe">Subscribe to newsletter</label>

        <input type="submit" class="button next" value="Send message" name="contact_submit">

    </form>
    <?php } ?>

    <?php
		$DB_user="root";
		$DB_passwd="";
		$DB_name="qnszt_gyak";
		$DB_host="localhost";
		$con=mysqli_connect($DB_host,$DB_user,$DB_passwd,$DB_name);
		$con->set_charset("UTF8");

if(isset($_POST['contact_submit'])){
	$query="Insert into messages(name,email,message) values ('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')";
	mysqli_query($con, $query) or die ("Hiba".mysqli_error($con));
	mysqli_close($con);
}
?>
</div>

<?php include('includes/footer.php') ?>