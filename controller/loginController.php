<?php 
if(isset($_POST["login"])){
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $errors = array();
    
    // Validate email
    if(empty($email) || empty($password)){
        array_push($errors, "Both fields are required.");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Invalid email format.");
    }

    if(count($errors) > 0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Connect to the database
        require_once "../model/db.php";

        // Check if email exists
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($stmt, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Check if user exists
            if($row = mysqli_fetch_assoc($result)){
                // Verify password
                if(password_verify($password, $row['password'])){
                    // Start the session and redirect to a logged-in page
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    echo "<div class='alert alert-success'>Login successful! Redirecting...</div>";
                    header("Location: dashboard.php");  // Redirect to the welcome page after successful login
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Incorrect password.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>No account found with that email.</div>";
            }
        } else {
            die("Error preparing the query.");
        }
    }
}

?>