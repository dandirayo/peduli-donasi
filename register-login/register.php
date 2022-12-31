<?php
  // Connect to the database
  $db = mysqli_connect('hostname', 'username', 'password', 'database');

  // Check if the form has been submitted
  if (isset($_POST['submit'])) {
    // Get the form data
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Validate the form data (optional)
    // ...

    // Insert the data into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($db, $sql);

    // Redirect to a new page (optional)
    // ...
  }
?>

