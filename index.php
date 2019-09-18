<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="screen and (max-width: 768px)" href="styles/mobile.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Registration Form</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<div>
    <?php
    if(isset($_POST['create'])){
             //accessing the HTML input
             $usernm = $_POST['username'];
             $email = $_POST['email'];

             
             //database connection variables
             $servername = "localhost";
             $username = "root";
             $password = "admin";
             $dbname = "register";

            // Create connection
             $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
             if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
             }
            //inserting into database 
             $sql = "INSERT INTO users (username, email)
             VALUES ('$usernm' , '$email') ";
             
             //checking for errors
             if ($conn->query($sql) === TRUE) {
             echo "";
             } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
             }

             $conn->close();
     
             
    }
         ?>
</div>

<!-- The form -->
<section class="container">
    <form action="index.php" method="post" id="my-form">
        <div>
            <label for="name">Username:</label>
            <input type="text" name="username"  pattern="[a-zA-Z0-9].{5,20}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" required>
        </div>
        <div class="form-group" >
            <div class="g-recaptcha" data-sitekey="6LcQEbkUAAAAABx_MGhTo5L16AXjbKyozHSQy_uf" data-callback="recaptcha_callback" id="recaptcha">
            </div>
        </div>
        <input class="btn" type="submit" name="create" value="Submit" disabled>
    </form>
</section>


<script src="main.js"></script>
<!--Integration for the debounce api /// https://debounce.io/-->
<script type="text/javascript">
    DeBounce_APIKEY = 'public_RVI5TFJyWVpidThNcXRKaS9PTzJoZz09';
    DeBounce_BlockFreeEmails = 'false'; //Set this value true to block free emails like Gmail.
</script>
<script async type="text/javascript" src="https://cdn.debounce.io/widget/DeBounce.js"></script>

</body>
</html>