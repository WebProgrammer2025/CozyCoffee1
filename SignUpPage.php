<?php $title="Sign Up Page"; ?>
<?php $section="signup"; ?>
<?php include('connection-db.php');

if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if (empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('Please fill all fields.');</script>";
    }
    // Check if passwords match
    elseif ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.');</script>";
    }
    // Insert into DB only if valid
    else {
        $query = "INSERT INTO user (email, password, confirmpassword) 
                  VALUES ('$email', '$password', '$confirmPassword')";
        
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: SignUpPage.php?status=1");
            exit();
        } 
        else {
            header("Location: SignUpPage.php?status=0");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Sign Up - Cozy Coffee</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body class="signup-page">
    <section>
        <div class="special">
            <h2>Create Your <span>Cozy Coffee</span> Account</h2>
            <?php
            if(isset($_GET['status']) && $_GET['status']==1){
                echo "<p style= 'color: green'>Account Created</p>";
                ?>
                    <?php } 
                    elseif(isset($_POST['add']) && !$result){
                        echo "<p style= 'color: red'>Sorry, an error occured.</p>"; 
                    }
                    ?>
            
            <form id="signUpForm" name="signupForm" method="POST" action="SignUpPage.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required />

                <button type="submit" name="signup" class="login-btn">Sign Up</button>
                <a href="HomePage.php" class="login-btn" style="margin-top: 20px; text-align: center; text-decoration: none; width:95%;">Home Page</a>
            </form>
        </div>
    </section>
</body>
</html>


