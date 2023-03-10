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
    <!-- <link rel="stylesheet" href="registration.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
    nav {
  background-color: #333;
  height: 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 20px;
}

ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
}

li {
  margin: 0 10px;
}

a {
  color: #fff;
  text-decoration: none;
  font-size: 16px;
  font-weight: bold;
  padding: 10px 15px;
  border-radius: 5px;
}

a:hover {
  background-color: #fff;
  color: #333;
}

input[type="text"],
  input[type="password"] {
    margin-bottom: 20px;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #f9f9f9;
    color: #f9f9f9;
  }
  h1 {
    text-align: center;
  }

  .submit {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
  }
  
  .submit:hover {
    background-color: #3e8e41;
  }
  label { display: inline-block; width: 210px; text-align: right; }

  .new{
font-family: 'Poppins';
font-style: normal;
font-weight: 275;
font-size: 96px;
color: #5FA401;
}

.name-title{
font-family: 'Poppins';
font-style: normal;
font-weight: 20;
font-size: 100px;
color: #D9D9D9;
 }
 .register-text{
    font-family: 'Poppins';
font-style: normal;
font-weight: 10;
font-size: 50px;
color: #5FA401;
 }
</style>
</head>

<body class="bg-black">
<nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Services</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</nav>
<main class="d-flex justify-content-between px-5">
    <!-- left side  -->
    <div>
            <h1 class="new mb-5" >The new <span class="text-white"><br>NIKE</span> </h1>
            <img class="shoe3" src="resources\shoe3.png">
            </div>
            <!-- middle portion  -->
            <div class="text-center">
                <h1 class="name-title text-warning" >B  A  i  K  i</h1>
                <h1 class="mb-5 register-text" style="color: azure;">Register</h1>
                <?php if (!empty($message)) : ?>
                
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form method="post">
                <div>
                <div class= username>
                    <label style="color: azure;" for="username">Username:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div>
                    <label style="color: azure;" for="email">Email:  </label>
                    <input type="text" name="email" id="email">
                </div>
                <div>
                    <label style="color: azure;"for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div>
                    <label style="color: azure;" for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <button class=submit type="submit">Register</button>
                </div>
            </form>
    </div>
<!-- right side  -->
        <div>
            <img class=shoot src="resources\shoot.png" alt="">
        </div>
    


    
    
        
    
    
</main>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
