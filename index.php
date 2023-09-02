<?php
$insert = false;
if(isset($_POST['name'])){
    //Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    //Create a database connection
    $con = mysqli_connect($server, $username, $password);

    //Check for connection success
    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    //echo "Sucess connecting to the db";

    //Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $level = $_POST['level'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `registration`.`registration` ( `name`, `age`, `email`, `phone`, `gender`, `level`, `other`, `dt`) VALUES ( '$name', '$age', '$email', '$phone', '$gender', '$level', '$desc', current_timestamp());";

    //Execute the query
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    //Close the db connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Coder Shaala Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Register for coder shaala!</h1>
        <p>Enter your details and submit this form to join our membership</p>
        <?php
            if($insert == true){
                echo "<p class='submitMsg'>Thank you for registering with us!</p>";
            }
        ?>
        <form name = "myform" action="index.php" method="post" onsubmit="return validateform()">
            <label class = "field" for="name">Name: </label>
            <input class= "box" type="text" name="name" id="name" placeholder="Enter your name">
            <label class = "field" for="age">Age: </label>
            <input class= "box" type="text" name="age" id="age" placeholder="Enter your age">
            <label class = "field" for="email">Email: </label>
            <input class= "box" type="email" name="email" id="email" placeholder="Enter your email">
            <label class = "field" for="phone">Contact no.: </label>
            <input class= "box" type="tel" name="phone" id="phone" placeholder="Enter your 10-digit contact no.">
            <label class="field" for="gender">Gender: </label>
            <label for="male">Male</label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="other">Others</label>
            <input type="radio" id="others" name="gender" value="others">
            <br>
            <br>
            <label class="field" for="level">Coding level: </label>
            <select name="level" id="level">
                <option value="beg">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advance">Advanced</option>
            </select>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Additional information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
