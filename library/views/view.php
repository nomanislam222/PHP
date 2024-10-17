<?php
session_start();
require "../models/User.php";
$user_id = $_SESSION['user_id'];
$role = getUserRoleById($user_id);

$conn = mysqli_connect("localhost", "root", "", "my_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM books";
$result = mysqli_query($conn, $sql);

$books = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }
} else {
    echo "No books found.";
}

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
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
                <h2>Book List</h2>

                <table border="1" align="center" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Year of Publication</th>
                            <th>Action</th> <!-- New column for update -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($books)) { ?>
                            <?php foreach ($books as $book) { ?>
                                <tr>
                                    <td><?php echo $book['id']; ?></td> 
                                    <td><?php echo $book['book_title']; ?></td> 
                                    <td><?php echo $book['author']; ?></td> 
                                    <td><?php echo $book['year_of_publication']; ?></td> 
                                    <td>
                                        <a href="update_book.php?id=<?php echo $book['id']; ?>">Update</a> 
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="5">No books found.</td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>
