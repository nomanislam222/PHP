<?php
session_start();
require "../models/User.php";
$user_id = $_SESSION['user_id'];
$role = getUserRoleById($user_id);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

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
    echo "No books available.";
}

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrow Request</title>
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
                <h2>Borrow Request</h2>

                <?php if (isset($_SESSION['success_message'])): ?>
                    <div class="success-message">
                        <?php
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']); 
                        ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="../controllers/borrowController.php">
                    <label for="book_id">Select Book:</label>
                    <select class="view"  name="book_id" required>
                        <option value="">-- Select a Book --</option>
                        <?php foreach ($books as $book) { ?>
                            <option value="<?php echo $book['id']; ?>"><?php echo $book['book_title']; ?></option>
                        <?php } ?>
                    </select><br>

                    <input type="hidden" name="requester_id" value="<?php echo $user_id; ?>"> <br><br>

                    <button id="submit" type="submit">Request Borrow</button>
                </form>
            </div>
        </article>
    </section>
</body>
</html>
