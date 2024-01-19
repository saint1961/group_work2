<?php
// Replace these values with your MySQL server credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Forum";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve values from the HTML form
$password = $_POST['Tittle'];
$password = $_POST['Description'];
$password = $_POST['category'];



// Perform a basic insert query
$sql = "INSERT INTO your_table_name (username, password) VALUES ('$Tittle', '$Description', '$category')";

if ($conn->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Function to securely hash passwords
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to verify user credentials
function verifyUser($username, $password) {
    global $conn;

    // Retrieve hashed password from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();

    // Verify password
    if (password_verify($password, $hashedPassword)) {
        return true;
    } else {
        return false;
    }
}

// Example of user registration
function registerUser($username, $password) {
    global $conn;

    // Hash the password before storing in the database
    $hashedPassword = hashPassword($password);

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
}

// Example usage:
$username = "example_user";
$password = "secure_password";

// Register a new user
if (registerUser($username, $password)) {
    echo "User registered successfully.";
} else {
    echo "Error registering user.";
}

// Verify user credentials
if (verifyUser($username, $password)) {
    echo "User authenticated successfully.";
} else {
    echo "Invalid username or password.";
}

// Close the database connection
$conn->close();
?>

