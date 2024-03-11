<?php

$servername = "localhost"; // Имя хоста базы данных
$username = "stas"; // Имя пользователя базы данных
$password = "FtfrG.Ujdt!wE)Gl"; // Пароль пользователя базы данных
$dbname = "discipline"; // Имя базы данных

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Другие операции с базой данных могут быть добавлены здесь

?>  