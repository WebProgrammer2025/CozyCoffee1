<?php $title="Login Page"; ?>
<?php $section="login"; ?>
<?php include('connection-db.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>alert('Please fill all fields.');</script>";
    } 
    else {
        // Query by email only
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("SQL Error: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Check password
            if ($password === $row['password']) {
                header("Location: MenuPage.php?login=success");
                exit();
            } else {
                echo "<script>alert('Invalid password.');</script>";
            }
        } 
        else {
            echo "<script>alert('Email not found.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login - Cozy Coffee</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body class="login-page">
    <section>
        <div class="special">
            <h2>Login to <span>Cozy Coffee</span></h2>
            <!-- Login Form -->
            <form id="loginForm" name="form" method="POST" action="LoginPage.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />
                
                <button type="submit" class="login-btn" name="login">Login</button>

                <!-- Row for "Don't have an account?" and Sign Up -->
                <div class="signup-row">
                    <span class="no-account">Don't have an account?</span>
                    <a href="SignUpPage.php" class="signup-btn">Sign Up</a>
                </div>
            </form>

            <a href="HomePage.php">Home Page</a>
        </div>
    </section>
    </body>
</html>
