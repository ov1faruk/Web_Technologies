<?php 
	include('Conn.php');

	$selectQuery = "SELECT * FROM package";
    $result = mysqli_query($conn, $selectQuery);
    $numRows = mysqli_num_rows($result);

    if($numRows != 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row["package_name"]."</td><td>".$row["shop_name"]."</td><td>".$row["location"]."</td><td>".$row["cost"]."</td><td>".$row["score"]."</td><td><a href='packageConfirm.php?pkgName=$row[package_name]&shpName=$row[shop_name]&loc=$row[location]&cst=$row[cost]&scr=$row[score]'>Click to Confirm</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "No records found.";
    }

    $conn->close();
?>