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

// Select database
mysqli_select_db($conn, $database);

// Get form data
$f_name = isset($_POST['f_name']) ? $_POST['f_name'] : '';
$email =  isset($_POST['email']) ? $_POST['email'] : '';
$m_num = isset($_POST['m_num']) ? $_POST['m_num'] : '';
$food_name = isset($_POST['food_name']) ? $_POST['food_name'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : ''; 
$c_name = isset($_POST['c_name']) ? $_POST['c_name'] : '';
$cnum = isset($_POST['cnum']) ? $_POST['cnum'] : '';
$expiry = isset($_POST['expiry']) ? $_POST['expiry'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';

// SQL query
$sql_query = "INSERT INTO orders (f_name, email, m_num, food_name, address,c_name,cnum,expiry,cvv,amount) 
              VALUES ('$f_name', '$email', '$m_num', '$food_name', '$address','$c_name','$cnum','$expiry','$cvv','$amount')";
// Execute query
if (mysqli_query($conn, $sql_query)) {
    echo "New details entered successfully!";
} else {
    echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

