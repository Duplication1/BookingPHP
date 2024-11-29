<?php 
$errors = []; // Initialize an array for errors

if (isset($_POST["login"])) {
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $rememberMe = isset($_POST["remember"]); // Check if the 'Remember Me' checkbox was checked

    // Validate email and password
    if (empty($email) || empty($password)) {
        $errors[] = "Both fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($errors)) {
        // Connect to the database
        require_once "../model/db.php";

        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    session_start();
                    $_SESSION['user_id'] = $row['uid'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['firstname'] = $row['First_Name'];
                    
                    // Set session variable to show the modal
                    $_SESSION['show_modal'] = true; // New session variable to trigger the modal
                    
                    // If "Remember Me" is checked
                    if ($rememberMe) {
                        // Generate a token and set cookie
                        $token = bin2hex(random_bytes(64)); // Generate a random token
                        $expiry = time() + 60 * 60 * 24 * 30; // Cookie expires in 30 days
                        setcookie("remember_me", $token, $expiry, "/", "", false, true);

                        // Save the token in the database associated with the user
                        $updateSql = "UPDATE user SET remember_token = ? WHERE email = ?";
                        $updateStmt = mysqli_stmt_init($conn);

                        if (mysqli_stmt_prepare($updateStmt, $updateSql)) {
                            mysqli_stmt_bind_param($updateStmt, "ss", $token, $email);
                            mysqli_stmt_execute($updateStmt);
                        }
                    }

                    header("Location: dashboard.php");
                    exit();
                } else {
                    $errors[] = "Incorrect password.";
                }
            } else {
                $errors[] = "No account found with that email.";
            }
        } else {
            $errors[] = "Database query failed.";
        }
    }
}

// Handle automatic login if remember token exists
if (isset($_COOKIE["remember_me"])) {
    $token = $_COOKIE["remember_me"];
    require_once "../model/db.php";
    
    // Look for a user with the given token
    $sql = "SELECT * FROM user WHERE remember_token = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $token);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['user_id'] = $row['uid'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['firstname'] = $row['First_Name'];
            
            // Set session variable to show the modal
            $_SESSION['show_modal'] = true; // New session variable to trigger the modal
            
            header("Location: dashboard.php");
            exit();
        }
    }
}

// Return errors to be displayed in the form
return $errors;
?>
