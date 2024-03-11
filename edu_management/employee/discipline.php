<?php
require_once 'functions.php';
$conn = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);

    // Добавление новой дисциплины
    $sql = "INSERT INTO disciplines (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New discipline added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Форма для добавления дисциплины
}
close_db($conn);
?>