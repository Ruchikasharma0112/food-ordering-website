
<?php
$username = "root";
$password = "";
$server = 'localhost';
$database = "eaters";

// Establish connection
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection successful..";
}

// Select database (not needed if already specified in mysqli_connect)
// mysqli_select_db($conn, $database);

// Get form data
$username = isset($_POST['username']) ? $_POST['username'] : '';
$pass =  isset($_GET['pass']) ? $_GET['pass'] : '';

// SQL query
$sql_query = "INSERT INTO login (username, pass) 
              VALUES ('$username', '$pass')";

// Execute query
if (mysqli_query($conn, $sql_query)) { // Corrected function name and removed extra comma
    echo "Login successful!";
} else {
    echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
