<?php
include "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];


    $sql = "INSERT INTO tasks (title, description) VALUES ('$title', '$description')";
    if ($connection->query($sql) === TRUE) {
        header("Location: index.php");
    }else {
        echo "Error: " . $sql . "<br>". $connection->error;
    }
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Create Task</h1>
    <form action="create.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <button type="submit">Create</button>
    </form>
    <a href="index.php">Back to To-Do List</a>
</body>
</html>