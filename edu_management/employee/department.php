<?php
require_once 'functions.php';
$conn = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);

    // Добавление новой кафедры
    $sql = "INSERT INTO departments (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New department added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Форма для добавления кафедры
}
close_db($conn);
?>