<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления</title>
</head>
<body>
    <h1>Добро пожаловать в Систему управления</h1>
    
    <?php
    // Подключение файла с функциями для обработки данных и работы с базой данных
    require_once 'functions.php';
    
    // Подключение к базе данных
    $conn = connect_db();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_SERVER["SCRIPT_NAME"] === "/add_employee.php") {
            $name = sanitize_input($_POST['name']);
            $sql = "INSERT INTO employees (name) VALUES ('$name')";
            // Остальная логика для добавления сотрудника
        } elseif ($_SERVER["SCRIPT_NAME"] === "/add_teacher.php") {
            $full_name = sanitize_input($_POST['full_name']);
            $department_id = sanitize_input($_POST['department_id']);
            $sql = "INSERT INTO teachers (full_name, department_id) VALUES ('$full_name', $department_id)";
            // Остальная логика для добавления учителя
        }
        
        // Добавление данных в базу данных
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    
    <h3>Добавить:</h3>
    <ul>
        <li><a href="temployee.php">Добавить Сотрудника</a></li>
        <li><a href="teacher.php">Добавить Учителя</a></li>
        <li><a href="department.php">Добавить Отдел</a></li>
        <li><a href="discipline.php">Добавить Дисциплину</a></li>
    </ul>
    <h3>Управлять:</h3>
    <ul>
        <li><a href="teachers.php">Управление Учителями</a></li>
        <li><a href="departments.php">Управление Отделами</a></li>
        <li><a href="disciplines.php">Управление Дисциплинами</a></li>
    </ul>
    
    <?php
    // Закрытие соединения с базой данных
    close_db($conn);
    ?>
</body>
</html>