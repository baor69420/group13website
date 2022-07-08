<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost:3306", "root", "Group13@website", "usersdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$output = array();
if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM word WHERE name LIKE ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_term);
        
        // Set parameters
        $param_term = $_REQUEST["term"] . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                // Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<p>" . $row["name"] . "</p>"; 
                    $def = mysqli_real_escape_string($link, $row['def']);
                    $name = mysqli_real_escape_string($link, $row['name']);
                    $img = mysqli_real_escape_string($link, $row['img']);
                    $output = array( "def" => $def, "name" => $name, "img" => $img);
                    echo "<br>Từ : ".$output['name']."</br>";
                    echo "<br>Nghĩa : ".$output['def']."</br>";
                    echo "<img src=".$output['img'].">";
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
}
 
// close connection
mysqli_close($link);
?>
