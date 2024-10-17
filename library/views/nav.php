    <nav>
    <ul>
       <li><a href="../views/profile.php"> Profile </a></li>
      <?php if ($role === 'student'): ?>
        <li><a href="../views/borrow_request.php">Borrow</a></li>
        <li><a href="../views/view_request.php"> View Request </a></li>
      <?php endif; ?>
       <?php if ($role === 'librarian'): ?>
        <li><a href="../views/view_request.php">Borrow Request</a></li>
        <li><a href="../views/view.php">Book List</a></li>
        <li><a href="../views/add_book.php">Insert Book</a></li>
      <?php endif; ?>
      <li><a href="../views/changepass.php"> Change Password </a></li>
      <li><a href="../controllers/Logout.php">Logout</a></li>
    </ul>
  </nav>