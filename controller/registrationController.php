<?php
 if(isset($_POST["submit"])){
    $LastName = $_POST["LastName"];
    $FirstName = $_POST["FirstName"];
    $email = $_POST["Email"];
    $password = $_POST["password"];
    $RepeatPassword = $_POST["repeat_password"];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();

// Check for missing fields
if(empty($LastName) OR empty($FirstName) OR empty($email) OR empty($password) OR empty($RepeatPassword)){
    array_push($errors, "All fields are required");
}

// Validate email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "Email is not valid");
}

// Check password length
if(strlen($password)<8){
    array_push($errors, "Password must be at least 8 characters long");
}

// Check if passwords match
if($password != $RepeatPassword){
    array_push($errors, "Password does not match");
}
require_once "../model/db.php";
$sql = "SELECT * FROM user WHERE email ='$email'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
if($rowCount > 0){
    array_push($errors, "Email Already Exists!");
}
// If there are errors, display them
if(count($errors) > 0){
    foreach($errors as $error){
        echo "<div class='alert alert-danger'>$error</div>";  // Fix here: $error, not $errors
    }
} else {
  $sql = "INSERT INTO user (Last_Name, First_Name, email, password) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_stmt_init($conn);
  $preparestmt = mysqli_stmt_prepare($stmt, $sql);
  if($preparestmt){
    mysqli_stmt_bind_param($stmt, "ssss", $LastName, $FirstName, $email, $passwordHash);
    mysqli_stmt_execute($stmt);
    echo "<div class='alert alert-success'> You are Registered Successfully! </div>";
  }
  else{
    die("Something went wrong");
  }
}
} 
?>