<?php
// Подключение файла с функциями для обработки данных и работы с базой данных
require_once 'functions.php';

// Подключение к базе данных
$conn = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка POST-запроса, добавление данных в базу в зависимости от файла
    
    if ($_SERVER["SCRIPT_NAME"] === "add_employee.php") {
        $name = sanitize_input($_POST['name']);
        $sql = "INSERT INTO employees (name) VALUES ('$name')";
        // Остальная логика для добавления работника
    } elseif ($_SERVER["SCRIPT_NAME"] === "add_teacher.php") {
        $full_name = sanitize_input($_POST['full_name']);
        $department_id = sanitize_input($_POST['department_id']);
        $sql = "INSERT INTO teachers (full_name, department_id) VALUES ('$full_name', $department_id)";
        // Остальная логика для добавления преподавателя
    }
    
    // Добавление данных в базу данных
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Форма для добавления данных в базу можно добавить здесь
}

// Закрытие соединения с базой данных
close_db($conn);
?>