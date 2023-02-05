<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<label for="fname">Name:</label>
   <input type="text" name="fname">
   <br>
   <br>
  <label for="gender">Gender:</label>
      <input type="radio" id="male" name="gender" value="male" required>
      <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" required>
      <label for="female">Female</label>
      <input type="radio" id="other" name="gender" value="other" required>
      <label for="other">Other</label>
      <br>
      <h4>Select Your Hobby:</Sect></h4>
      <input type="checkbox" id="hobby1" name="hobby1" value="Singing">
  <label for="hobby1"> Singing</label><br>
  <input type="checkbox" id="hobby2" name="hobby2" value="Dancing">
  <label for="vehicle2"> Dancing</label><br>
  <input type="checkbox" id="hobby3" name="hobby3" value="Playing">
  <label for="hobby3"> Playing</label>
  <br>
  <br>
  <label for="marital-status">Marital Status:</label>
      <select id="marital-status" name="marital-status" required>
        <option value="" disabled selected>Select your option</option>
        <option value="single">Single</option>
        <option value="married">Married</option>
        <option value="divorced">Divorced</option>
        <option value="widowed">Widowed</option>
        <option value="prefntosay">Prefer Not To Say</option>
      </select>
      <br>
      <br>
      <label for="address">Address:</label>
      <textarea id="address" name="address" required></textarea>
  <br>
  <br>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_REQUEST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
  $gender = $_REQUEST['gender'];
  if (empty($gender)) {
    echo "Name is empty";
  } else {
    echo $gender;
  }
  $checkbox = $_REQUEST['checkbox'];
   $hobby1=hobby1;
   if (isset($hobby1)){
    echo "'hobby1'";
   }
  
  $name = $_REQUEST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
  $name = $_REQUEST['fname'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?>

</body>
</html>