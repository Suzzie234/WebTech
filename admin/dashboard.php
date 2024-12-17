<?php
include("C:/xampp/htdocs/Emoji Escape Room/db/dbconnect.php");
$feedback = "";

// Handle Add User Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $roles = $conn->real_escape_string($_POST['roles']);
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, roles, password_hash) VALUES ('$username', '$email', '$roles', '$password_hash')";
    if ($conn->query($sql)) {
        $feedback = "User added successfully!";
    } else {
        $feedback = "Error adding user: " . $conn->error;
    }
}

// Handle Edit User Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $id = intval($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $roles = $conn->real_escape_string($_POST['roles']);

    $sql = "UPDATE users SET username = '$username', email = '$email', roles = '$roles' WHERE id = $id";
    if ($conn->query($sql)) {
        $feedback = "User updated successfully!";
    } else {
        $feedback = "Error updating user: " . $conn->error;
    }
}

// Handle Delete User Request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    $id = intval($_POST['id']);

    $sql = "DELETE FROM users WHERE id = $id";
    if ($conn->query($sql)) {
        $feedback = "User deleted successfully!";
    } else {
        $feedback = "Error deleting user: " . $conn->error;
    }
}

// Fetch all users for display
$users = [];
$result = $conn->query("SELECT id, username, email, roles FROM users");
if ($result) {
    $users = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Escape Room</title>

        <link rel="stylesheet" href="C:/xampp/htdocs/Emoji Escape Room/admin/dashboard.css">

        <link href="https://fonts.cdnfonts.com/css/arcade-classic" rel="stylesheet">

        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

        <!-- Adding a favicon-->
         <link rel ="icon" type= "image/png" href="https://cdn-icons-png.flaticon.com/128/3483/3483089.png">

         <!--bootstrap-->
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">-->
       
        <!--JS library for validation-->
        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
        <script src="/assets/js/validation.js" defer></script>
    </head>

    <body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <!-- Feedback Message -->
        <?php if ($feedback): ?>
            <p class="feedback"><?= htmlspecialchars($feedback) ?></p>
        <?php endif; ?>

        <!-- Add User Form -->
        <form method="POST" class="user-form" action="/admin/manage_levels.php">
            <h2>Add a New User</h2>
            <input type="hidden" name="action" value="add">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <select name="role" required>
                <option value="Regular">Regular</option>
                <option value="admin">Admin</option>
            </select>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Add User</button>
        </form>

        <!-- Users Table -->
        <h2>Existing Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['roles']) ?></td>
                        <td>
                            <!-- Edit Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="edit">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                                <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                                <select name="roles">
                                    <option value="user" <?= $user['roles'] === 'regular' ? 'selected' : '' ?>>Regular</option>
                                    <option value="admin" <?= $user['roles'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>

                            <!-- Delete Form -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
