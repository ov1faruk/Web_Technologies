<?php
	        
    include('../model/Connection.php');
    $package = "";
    $packageError = "";
    $rating = "";
    $updateMessage = "";
    $errorMessage = "";

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(empty($_POST['package']))
        {
            $packageError="Package name is empty";
            $flag=true;
        }
        if(empty($_POST['rating']))
        {
            $ratingError="Rating is empty";
            $flag=true;
        }
    }

    function sanitize_input($data)
    {
        $data=trim($data);
        $data=stripcslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $findResult = mysqli_query($conn, "SELECT * FROM package");
    if($res = mysqli_fetch_array($findResult))
    {
        $package = $res['package_name'];
        $rating = $res['score'];
    }

    if(isset($_POST['update']))
    {
        $rating = $_POST['rating'];
        $sql = "SELECT * FROM package WHERE package_name = '$package'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res)>0)
        {
            $row = mysqli_fetch_assoc($res);
        }
        $result = mysqli_query($conn, "UPDATE package SET score = '$rating' WHERE package_name = '$package'");
        if($result)
        {
            echo "Rating has been updated.";
        }
        else
        {
            echo "Update Failed.";
        }
    }
?>
