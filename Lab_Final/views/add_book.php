<?php 
session_start();
require "../models/User.php";
$user_id = $_SESSION['user_id'];
$role = getUserRoleById($user_id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Book</title>
    <link rel="stylesheet" type="text/css" href="../views/styles.css">
    <script type="text/javascript" src="../views/js/book.js"></script>
</head>
<body>
 <header>
        <?php include '../views/header.php'; ?>
    </header>

    <section>
        <?php include '../views/nav.php'; ?>
        
        <article>
<div class="container">

    <form method="post" action="../controllers/bookController.php" onsubmit="return isValid(this);" novalidate>
        
        <label>Add New Book</label>
        <input type="text" class="field" name="book_title" value="<?php echo empty($_SESSION['book_title']) ? "" : $_SESSION['book_title'] ?>" placeholder="Enter Book Title">
        <span><?php echo empty($_SESSION['err1']) ? "" : $_SESSION['err1'] ?></span>

        <input type="text" class="field" name="author" value="<?php echo empty($_SESSION['author']) ? "" : $_SESSION['author'] ?>" placeholder="Enter Author Name">
        <span><?php echo empty($_SESSION['err2']) ? "" : $_SESSION['err2'] ?></span>

        <input type="text" class="field" name="year_of_publication" value="<?php echo empty($_SESSION['year_of_publication']) ? "" : $_SESSION['year_of_publication'] ?>" placeholder="Enter Year of Publication">
        <span><?php echo empty($_SESSION['err3']) ? "" : $_SESSION['err3'] ?></span>

        <input type="submit" id="submit" value="Add Book">
    </form>

    <?php echo empty($_SESSION['err4']) ? "" : $_SESSION['err4'] ?>

</div>
</article>
</section>

</body>
</html>
