<?php
include 'pdo1.php'; // Include your PDO connection

// Start session for user management
session_start();

// Get the forum ID from the URL
$forum_id = $_GET['id'] ?? null;

if (!$forum_id) {
    die('Forum ID is required.');
}

// Fetch forum details based on the forum ID
$query = "SELECT f.id, r.region_name, c.crime_name 
          FROM forums f
          JOIN regions r ON f.region_id = r.id
          JOIN crimes c ON f.crime_id = c.id
          WHERE f.id = :forum_id";
          
$stmt = $pdo->prepare($query);
$stmt->execute(['forum_id' => $forum_id]);
$forum = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$forum) {
    die('Forum not found.');
}

// Fetch chat messages for the forum
$query_messages = "SELECT m.message_content, m.created_at, u.username 
                   FROM messages m
                   LEFT JOIN users u ON m.user_id = u.id
                   WHERE m.forum_id = :forum_id
                   ORDER BY m.created_at ASC";

$stmt_messages = $pdo->prepare($query_messages);
$stmt_messages->execute(['forum_id' => $forum_id]);
$messages = $stmt_messages->fetchAll(PDO::FETCH_ASSOC);

// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message_content = $_POST['message_content'] ?? '';

    if (!empty($message_content)) {
        // Check for a valid user ID or use a default anonymous user ID
        $user_id = $_SESSION['user_id'] ?? null;
        
        if (!$user_id) {
            // Assign a placeholder for anonymous users
            $username = 'Anonymous_' . uniqid(); // Create a unique anonymous username
            $user_id = null; // Set to null or 0 for anonymous users
        } else {
            // Fetch the username for logged-in users
            $stmt_user = $pdo->prepare("SELECT username FROM users WHERE id = :user_id");
            $stmt_user->execute(['user_id' => $user_id]);
            $user = $stmt_user->fetch(PDO::FETCH_ASSOC);
            $username = $user['username'] ?? 'Unknown';
        }

        // Insert the message into the database
        $stmt_insert = $pdo->prepare("INSERT INTO messages (user_id, forum_id, message_content, username) VALUES (:user_id, :forum_id, :message_content, :username)");
        $stmt_insert->execute([
            'user_id' => $user_id,
            'forum_id' => $forum_id,
            'message_content' => $message_content,
            'username' => $username
        ]);

        // Redirect to avoid resubmission
        header("Location: backum.php?id=$forum_id");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Forum</title>
    <style>
        /* Custom container styling */
        .custom-container {
            background-color: rgba(173, 216, 230, 0.3); /* Faded blue background */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Enhanced shadow for more depth */
            border-radius: 12px; /* Rounded edges for the container */
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px; /* Adjust width as needed */
            width: 90%; /* Responsive width */
        }

        /* General body styles */
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Header styles */
        h1, h2 {
            color: #333;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 600;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 500;
        }

        /* Form styles */
        form {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        label {
            font-weight: bold;
            font-size: 1rem;
        }

        select, button, textarea {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 1rem;
            width: 100%;
            max-width: 300px;
        }

        button {
            background-color: transparent; /* Transparent background */
            color: #007bff; /* Blue text color */
            border: 2px solid #007bff; /* Blue border */
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Smooth transition for hover effect */
            height: 40px;
        }

        button:hover {
            background-color: #007bff; /* Blue background on hover */
            color: #fff; /* White text color on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }

        /* Chat box styles */
        .chat-box {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            max-height: 400px;
            overflow-y: auto; /* Ensures scrolling if content overflows */
            width: 100%; /* Make chat box full width within the container */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Adjust text area and form check styles */
        textarea {
            width: 100%;
            height: 80px; /* Increased height */
            margin-bottom: 10px;
        }

        .form-check {
            margin-bottom: 10px;
        }

        /* Forum list styles */
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin: 15px 0;
            text-align: center;
        }

        li a {
            text-decoration: none;
            color: #007bff;
            font-size: 1.125rem;
            display: block;
            padding: 12px;
            background-color: #ffffff;
            border-radius: 6px; /* Rounded corners for list items */
            border: 1px solid #ddd; /* Border for list items */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effect */
            width: 80%; /* Increased width */
            max-width: 400px; /* Increased maximum width */
            margin: 0 auto; /* Center the links */
        }

        li a:hover {
            background-color: #e9ecef; /* Light grey background on hover */
            color: #0056b3; /* Darker blue color on hover */
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <h1>Chat Forum: <?= htmlspecialchars($forum['region_name']) ?> - <?= htmlspecialchars($forum['crime_name']) ?></h1>

        <div class="chat-box">
            <?php if (count($messages) > 0): ?>
                <?php foreach ($messages as $message): ?>
                    <p><strong><?= htmlspecialchars($message['username']) ?>:</strong> <?= htmlspecialchars($message['message_content']) ?> <em>(<?= htmlspecialchars($message['created_at']) ?>)</em></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No messages yet. Start the conversation!</p>
            <?php endif; ?>
        </div>

        <form method="POST" action="backum.php?id=<?= htmlspecialchars($forum_id) ?>">
            <textarea name="message_content" placeholder="Enter your message here..." required></textarea>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="anonymous" name="anonymous">
                <label class="form-check-label" for="anonymous">Post anonymously</label>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
