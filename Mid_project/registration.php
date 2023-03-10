<?php
$dbFile = 'database.json';
// Initialize error message
$message = '';

// Check if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form data
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $message = 'Username is required';
    } else if (!isset($_POST['email']) || empty($_POST['email'])) {
        $message = 'Email is required';
    } else if (!isset($_POST['password']) || empty($_POST['password'])) {
        $message = 'Password is required';
    } else {
        // Check if username or email already exists
        $username = $_POST['username'];
        $email = $_POST['email'];
        $users = json_decode(file_get_contents($dbFile), true);
        if (!isset($users['users'])) {
            $users['users'] = array();
        }
        foreach ($users['users'] as $u) {
            if (isset($u['username']) && $u['username'] === $username) {
                $message = 'Username already exists';
                break;
            } else if (isset($u['email']) && $u['email'] === $email) {
                $message = 'Email already exists';
                break;
            }
        }
        if (empty($message)) {
            // Add new user to database
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $user = array(
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone' => $phone
            );
            $users['users'][count($users['users'])] = $user;
            // Save updated users array to file
            $data = json_encode($users);
            file_put_contents($dbFile, $data);
            // Redirect to login page
            header('Location: login.php');
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <?php if (!empty($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post">
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone">
        </div>
        <button type="submit">Register</button>
    </form>
</body>

</html>
