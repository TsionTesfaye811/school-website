<?php
// Include database connection
include 'dbcon.php';

// Function to sanitize input data
function sanitizeData($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Function to display success or error messages
function displayMessage($message, $type = 'success') {
    echo "<div class='message $type'>$message</div>";
}

// Process form submission to add or update user
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_user'])) {
        // Sanitize inputs
        $username = sanitizeData($_POST['username']);
        $email = sanitizeData($_POST['email']);
        $password = sanitizeData($_POST['password']);
        
        // Add new user
        $sql_add_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql_add_user) === TRUE) {
            displayMessage("New user added successfully.");
        } else {
            displayMessage("Error adding user: " . $conn->error, 'error');
        }
    } elseif (isset($_POST['submit_news'])) {
        // Sanitize inputs
        $title = sanitizeData($_POST['title']);
        $content = sanitizeData($_POST['content']);
        
        // Add new news article
        $sql_add_news = "INSERT INTO news (title, content) VALUES ('$title', '$content')";
        if ($conn->query($sql_add_news) === TRUE) {
            displayMessage("New news article added successfully.");
        } else {
            displayMessage("Error adding news article: " . $conn->error, 'error');
        }
    }
}

// Process delete operation for users
if (isset($_GET['action']) && $_GET['action'] == 'delete_user' && isset($_GET['id'])) {
    $user_id = sanitizeData($_GET['id']);
    $sql_delete_user = "DELETE FROM users WHERE id=$user_id";
    if ($conn->query($sql_delete_user) === TRUE) {
        displayMessage("User deleted successfully.");
    } else {
        displayMessage("Error deleting user: " . $conn->error, 'error');
    }
}

// Process delete operation for news articles
if (isset($_GET['action']) && $_GET['action'] == 'delete_news' && isset($_GET['id'])) {
    $news_id = sanitizeData($_GET['id']);
    $sql_delete_news = "DELETE FROM news WHERE id=$news_id";
    if ($conn->query($sql_delete_news) === TRUE) {
        displayMessage("News article deleted successfully.");
    } else {
        displayMessage("Error deleting news article: " . $conn->error, 'error');
    }
}

// Fetch all users
$sql_users = "SELECT id, username, email FROM users";
$result_users = $conn->query($sql_users);

// Fetch all news articles
$sql_news = "SELECT id, title, content FROM news";
$result_news = $conn->query($sql_news);

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        form input, form textarea {
            padding: 8px;
            margin-right: 10px;
            width: 300px; /* Adjust width as needed */
        }
        form button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .delete-link {
            color: red;
            text-decoration: none;
            margin-left: 10px;
        }
        .delete-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>School Admin Panel - Manage Users</h2>

    <!-- Display success or error messages -->
    <?php
    if (isset($_SESSION['message'])) {
        echo "<div class='message " . $_SESSION['message']['type'] . "'>" . $_SESSION['message']['text'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

    <!-- Form to add new user -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit_user">Add User</button>
    </form>

    <!-- Table to display users -->
    <h3>Users</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_users->num_rows > 0) {
                while ($row = $result_users->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit_user.php?id=" . $row['id'] . "'>Edit</a>";
                    echo "<a href='admin_panel.php?action=delete_user&id=" . $row['id'] . "' class='delete-link'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Form to add new news article -->
    <h2>School Admin Panel - Manage News Articles</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="title" placeholder="News Title" required>
        <textarea name="content" placeholder="News Content" rows="4" required></textarea>
        <button type="submit" name="submit_news">Add News Article</button>
    </form>

    <!-- Table to display news articles -->
    <h3>News Articles</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_news->num_rows > 0) {
                while ($row = $result_news->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . substr($row['content'], 0, 50) . "...</td>";
                    echo "<td>";
                    echo "<a href='edit_news.php?id=" . $row['id'] . "'>Edit</a>";
                    echo "<a href='admin_panel.php?action=delete_news&id=" . $row['id'] . "' class='delete-link'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No news articles found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
