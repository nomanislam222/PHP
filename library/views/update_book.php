<?php
session_start();
require "../models/User.php";
$user_id = $_SESSION['user_id'];
$role = getUserRoleById($user_id);

$conn = mysqli_connect("localhost", "root", "", "my_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = $_POST['id'];
    $book_title = sanitize($_POST['book_title']);
    $author = sanitize($_POST['author']);
    $year_of_publication = sanitize($_POST['year_of_publication']);

    $sql = "UPDATE books SET book_title = '$book_title', author = '$author', year_of_publication = '$year_of_publication' WHERE id = '$book_id'";
    if (mysqli_query($conn, $sql)) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    if (isset($_GET['id'])) {
        $book_id = $_GET['id'];
        $sql = "SELECT * FROM books WHERE id = '$book_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $book = mysqli_fetch_assoc($result);
        } else {
            echo "Book not found.";
            exit();
        }
    }
}

mysqli_close($conn);

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Book</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <?php include '../views/header.php'; ?>
    </header>

    <section>
        <?php include '../views/nav.php'; ?>
        
        <article>
            <div class="container">
                <h2>Update Book</h2>
                <form method="POST" action="update_book.php">
                    <input type="hidden" name="id" value="<?php echo $book['id']; ?>"> <!-- Hidden ID field -->
                    
                    <label for="book_title">Title:</label>
                    <input class="view" type="text" name="book_title" value="<?php echo $book['book_title']; ?>" required><br><br>

                    <label for="author">Author:</label>
                    <input class="view" type="text" name="author" value="<?php echo $book['author']; ?>" required><br><br>

                    <label for="year_of_publication">Year of Pub.:</label>
                    <input class="view" type="text" name="year_of_publication" value="<?php echo $book['year_of_publication']; ?>" required><br><br>

                    <button id="submit" type="submit">Update Book</button>
                </form>
            </div>
        </article>
    </section>
</body>
</html>
