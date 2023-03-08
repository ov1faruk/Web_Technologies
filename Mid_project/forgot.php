<?php

session_start();

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  
  // Read the database json file
  $database = file_get_contents('database.json');
  $users = json_decode($database, true)['users'];
  
  // Check if the user exists
  $user = array_filter($users, function($u) use ($username) {
    return $u['username'] == $username;
  });
  
  if (count($user) > 0) {
    $user = array_shift($user);
    
    // Generate a new password
    $newPassword = bin2hex(random_bytes(5));
    
    // Update the user's password and email
    $key = array_search($user, $users);
    $users[$key]['password'] = $newPassword;
    $email = $user['email'];
    
    // Save the updated database
    $database = json_encode(['users' => $users], JSON_PRETTY_PRINT);
    file_put_contents('database.json', $database);
    
    // Send the new password to the user's email
    $to = $email;
    $subject = 'New Password';
    $message = 'Your new password is: ' . $newPassword;
    
    mail($to, $subject, $message);
    
    // Redirect to the login page
    header('Location: login.php');
    exit;
  }
  
  // Invalid username
  $error = 'Invalid username';
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Forgot Password</title>
</head>
<body>
  <h1>Forgot Password</h1>
  
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  
  <form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
    
    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>