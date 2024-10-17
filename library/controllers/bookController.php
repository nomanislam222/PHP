<?php  
session_start();
require "../models/User.php"; 

$book_title = sanitize($_POST['book_title']);
$author = sanitize($_POST['author']);
$year_of_publication = sanitize($_POST['year_of_publication']);

$isValid = true;

$_SESSION['err1'] = ""; 
$_SESSION['err2'] = ""; 
$_SESSION['err3'] = ""; 
$_SESSION['book_title'] = "";
$_SESSION['author'] = "";
$_SESSION['year_of_publication'] = "";

if (empty($book_title)) {
    $_SESSION['err1'] = "Please enter the book title.";
    $isValid = false;
} else {
    $_SESSION['book_title'] = $book_title;
}

if (empty($author)) {
    $_SESSION['err2'] = "Please enter the author name.";
    $isValid = false;
} else {
    $_SESSION['author'] = $author;
}

if (empty($year_of_publication) || !is_numeric($year_of_publication)) {
    $_SESSION['err3'] = "Please enter a valid year of publication.";
    $isValid = false;
} else {
    $_SESSION['year_of_publication'] = $year_of_publication;
}

if ($isValid === true) {
    $isBookAdded = addBook($book_title, $author, $year_of_publication);
    if ($isBookAdded) {
        session_unset();
        session_destroy(); 

       header("Location: ../views/view.php");
        exit();
    } else {
        $_SESSION['err4'] = "Failed to add book. Please try again.";
        header("Location: ../views/add_book.php");
        exit();
    }
} else {
    header("Location: ../views/add_book.php");
    exit();
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
