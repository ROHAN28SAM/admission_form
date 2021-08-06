<?php
$insert = false;
//set a coonection variables
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
//create a database connection
    $con = mysqli_connect($server, $username, $password);
//check for connection success
    if(!$con){
        die("Connection to this database is failed due to ". mysqli_connect_error());    
    }
    // echo "Successfully Connected to database"
//collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $contact = $_POST['contact'];
    $grade = $_POST['grade'];
    $other = $_POST['other'];

    $sql = "INSERT INTO `admission_form`.`form` (`name`, `email`, `gender`, `age`, `contact`, `grade`, `other`, `dt`) VALUES ('$name', '$email', '$gender', '$age', '$contact', '$grade', '$other', current_timestamp());";
    // echo $sql;
//Execute the query
    if($con->query($sql) == true){
        // echo "Successfully Submitted";
//Flag for successful insertion        
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
//close the database connection
    $con->close();
} 
?>
<!-- You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''admission_form'.`form` (`name`, `email`, `gender`, `age`, `contact`, `grade`...' at line 1 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DYPSOC BE Computer Admission form</title>
    <link href="https://fonts.googleapis.com/css2?family=STIX+Two+Text:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src="bg.jpeg" alt="DYPSOC">
    <div class="container">
        <h1>Admission Form for BE Course in Computer</h1>
        <h3>Enter your details to assure your seat at our institute</h3>
        <?php
        if($insert == true){
            echo "<p class='msg'>Thank you for your interest !</p>";}
        ?>
        
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="contact" name="contact" id="contact" placeholder="Enter your contact number">
            <input type="text" name="grade" id="grade" placeholder="Enter your grades of highest degree">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter more information about you.."></textarea>
            <button class="btn" type="submit">submit</button>
        </form>
        
    </div>
    <script src="index.js"></script>
    
</body>
</html>