<?php include 'templates/header.php'; ?>

<h2>Student Registration</h2>
<form action="register.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    
    <button type="submit">Register</button>
</form>

<?php include 'templates/footer.php'; ?>
