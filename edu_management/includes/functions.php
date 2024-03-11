<?php
function sanitize_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function connect_db() {
    // Подключение к базе данных
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function close_db($conn) {
    $conn->close();
}
?>