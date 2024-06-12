<?php
include "db.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];



    $sql = "SELECT * FROM tasks WHERE id = $id";
    $result = $connection->query($sql);
    $task = $result->fetch_assoc();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];



    $sql = "UPDATE tasks SET title = '$title', description = '$description' WHERE id = $id";

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
    <title>Update Task</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Update Task</h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $task['title']; ?>" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $task['description']; ?></textarea>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Back to To-Do List</a>
</body>
</html>