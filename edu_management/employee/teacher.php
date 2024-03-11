<?php
require_once 'functions.php';
$conn = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = sanitize_input($_POST['full_name']);
    $department_id = sanitize_input($_POST['department_id']);

    // Добавление нового преподавателя
    $sql = "INSERT INTO employees (full_name, department_id) VALUES ('$full_name', $department_id)";

    if ($conn->query($sql) === TRUE) {
        echo "New teacher added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Форма для добавления преподавателя
}
close_db($conn);
?>