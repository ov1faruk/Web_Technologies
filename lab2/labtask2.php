<html>
<body>
   

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<fieldset style="position: relative;" align='center'>
<legend> <h2>Registration Form </h2></legend>
<label for="fname">Name:</label>
   <input type="text" name="fname">
   
   <label for="femail">Email:</label>
   <input type="text" name="femail">
   <br>
   <br>
   <label for="dob">Date Of Birth: </label>
   <input type="date" name="dob" placeholder="DD-MM-YYYY" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="Enter a date in this formart DD-MM-YYYY"/>

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
      <br>
      <label>Degree:</label>
            <input type="checkbox" id="ssc" name="ssc" value="ssc">
            <label for="ssc"> SSC</label><br>
            <input type="checkbox" id="hsc" name="hsc" value="hsc">
            <label for="hsc"> HSC</label><br>
            <input type="checkbox" id="BSc" name="BSc" value="BSc">
            <label for="BSc"> BSc</label>
            <input type="checkbox" id="MSc" name="MSc" value="MSc">
            <label for="MSc"> MSc</label>
  <br>
  <br>
  <label for="marital-status">Blood Group:</label>
      <select id="bloodgroup" name="bloodgroup" required>
        <option value="" disabled selected>Select your option</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>
      
  <br>
  <br>
  <input type="submit">
  </fieldset>
</form>


<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $bloodgroup= "";

$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_REQUEST ["fname"];  
  if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
      $ErrMsg = "Only alphabets and whitespace are allowed.";  
              echo $ErrMsg;  
  } else {  
      echo "Name: " . $name . "<br>";  
  } 

  $email = $_POST ["femail"];  
        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
        if (!preg_match ($pattern, $email) ){  
            $ErrMsg = "Email is not valid."; 
            
                    echo $ErrMsg; 
                    echo "<br>"; 
        } else {  
            echo "Email: " . $email . "<br>";  
        } 
        
        
      

  $gender = $_REQUEST['gender'];
  if (empty($gender)) {
    echo "Gender is empty";
  } else {
    echo "Gender:". $gender."<br>";
  }
 # Degree

  if (isset($_POST['ssc'])) 
    echo "SSC <br>";
   
  

   #$hobby2 = $_REQUEST['hobby2'] ;
  if (isset($_POST['hsc'])) 
    echo "HSC <br>";
    
  
   #$hobby3 = $_REQUEST['hobby3'] ;
  if (isset($_POST['Bsc']) ) 
   echo "Bsc <br>";
  

   if (isset($_POST['Msc']) ) 
   echo "Msc <br>";
   
  
  
  $bloodgroup = $_REQUEST['bloodgroup'];
  if (empty($bloodgroup)) {
    echo "";
  } else {
    echo "BloodGroup: " .$bloodgroup;
  }
}
  

?>



</body>
</html>