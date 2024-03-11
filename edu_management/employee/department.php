<?php
require_once 'functions.php';
$conn = connect_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка POST-запроса, добавление данных в базу
    $name = sanitize_input($_POST['name']);
    
    // Пример добавления данных в базу данных
    $sql = "INSERT INTO employees (name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="submit" value="Submit">
    </form>
    <?php
}

close_db($conn);
?>