<?php
session_start();
require "../models/User.php";
$user_id = $_SESSION['user_id'];
$role = getUserRoleById($user_id);

$conn = mysqli_connect("localhost", "root", "", "my_app");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
    SELECT borrow_requests.id AS request_id, 
           borrow_requests.requester_id, 
           books.book_title 
    FROM borrow_requests 
    JOIN books ON borrow_requests.book_id = books.id
";

$result = mysqli_query($conn, $sql);

$request = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $request[] = $row;
    }
} else {
    echo "No requests found.";
}

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request List</title>
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
                <h2>Request List</h2>

                <table border="1" align="center" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>User ID</th>
                            <th>Book Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($request)) { ?>
                            <?php foreach ($request as $req) { ?>
                                <tr>
                                    <td><?php echo $req['request_id']; ?></td> 
                                    <td><?php echo $req['requester_id']; ?></td> 
                                    <td><?php echo $req['book_title']; ?></td> 
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3">No requests found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </article>
    </section>
</body>
</html>
