<?php
  // Connect to the database
  $db = mysqli_connect('hostname', 'username', 'password', 'database');

  // Check if the form has been submitted
  if (isset($_POST['submit'])) {
    // Get the form data
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Verify the login credentials
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) == 1) {
      // Login credentials are correct
      // Redirect to the appropriate page
      header('location: home.php');
    } else {
      // Login credentials are incorrect
      // Display an error message
      echo 'Invalid email or password';
    }
  }
?>
