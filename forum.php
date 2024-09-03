<?php
include 'pdo2.php';
session_start();

if (!isset($_POST['case_id'])) {
    header('Location: select_case.php');
    exit();
}

$case_id = $_POST['case_id'];
$_SESSION['case_id'] = $case_id;

// Fetch forum details based on the case ID
$forum = $pdo->prepare("SELECT * FROM forums WHERE case_id = :case_id");
$forum->execute(['case_id' => $case_id]);
$forum = $forum->fetch(PDO::FETCH_ASSOC);

if (!$forum) {
    die('Forum not found.');
}

// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message_content = $_POST['message_content'] ?? '';
    $is_anonymous = isset($_POST['anonymous']) ? 1 : 0;

    if (!empty($message_content)) {
        $user_id = $_SESSION['user_id'] ?? null;
        $user_id = $is_anonymous ? null : $user_id;

        // Insert the message into the database
        $stmt_insert = $pdo->prepare("INSERT INTO messages (user_id, forum_id, message_content) VALUES (:user_id, :forum_id, :message_content)");
        $stmt_insert->execute([
            'user_id' => $user_id,
            'forum_id' => $forum['id'],
            'message_content' => $message_content
        ]);

        // Redirect to avoid resubmission
        header("Location: forum.php");
        exit();
    }
}

// Handle image upload
if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Save image path to the database
        $stmt_insert_image = $pdo->prepare("INSERT INTO images (forum_id, image_path) VALUES (:forum_id, :image_path)");
        $stmt_insert_image->execute([
            'forum_id' => $forum['id'],
            'image_path' => $imagePath
        ]);

        // Redirect with success parameter
        header("Location: forum.php?upload=success");
        exit();
    }
}

// Fetch chat messages
$messages = $pdo->prepare("SELECT m.message_content, m.created_at, COALESCE(u.username, 'Anonymous') AS username FROM messages m LEFT JOIN users u ON m.user_id = u.id WHERE m.forum_id = :forum_id ORDER BY m.created_at ASC");
$messages->execute(['forum_id' => $forum['id']]);
$messages = $messages->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat Forum - <?= htmlspecialchars($forum['forum_name']) ?></title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Container styling */
        .custom-container {
            background-color: #f9f9f9;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 30px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Chat box styling */
        .chat-box {
            max-height: 400px;
            overflow-y: auto;
            padding: 20px;
            border: 1px solid #e1e1e1;
            background-color: #ffffff;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .chat-box p {
            margin-bottom: 10px;
        }

        /* Styling for form */
        form {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 100px;
            resize: none;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-bottom: 10px;
        }

        .form-check-label {
            margin-left: 5px;
        }

        /* Styling for buttons */
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        /* Styling for uploaded image section */
        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.5rem;
            color: #333;
        }

        input[type="file"] {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            margin-bottom: 10px;
        }

        /* Home button styling */
        .btn-home {
            background-color: #28a745; /* Green background */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 1rem;
            text-align: center;
            display: block;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-home:hover {
            background-color: #218838; /* Darker green on hover */
            transform: scale(1.05);
        }
    </style>
    <script>
        window.onload = function() {
            // Check if the URL has the 'upload=success' parameter
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('upload') === 'success') {
                alert('Image uploaded successfully!');
            }
        };
    </script>
</head>
<body>
    <div class="container custom-container">
        <h2 class="text-center">Helper <?= htmlspecialchars($forum['forum_name']) ?></h2>

        <div class="chat-box">
            <?php if (count($messages) > 0): ?>
                <?php foreach ($messages as $message): ?>
                    <p><strong><?= htmlspecialchars($message['username']) ?>:</strong> <?= htmlspecialchars($message['message_content']) ?> <em>(<?= htmlspecialchars($message['created_at']) ?>)</em></p>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No messages yet. Start the conversation!</p>
            <?php endif; ?>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <textarea name="message_content" placeholder="Enter your message here..." required></textarea>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="anonymous" name="anonymous">
                <label class="form-check-label" for="anonymous">Post anonymously</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send</button>
        </form>

        <form method="POST" enctype="multipart/form-data">
            <h3>Upload an Image</h3>
            <input type="file" name="image" accept="image/*">
            <button type="submit" class="btn btn-primary w-100">Upload Image</button>
        </form>

        <!-- Home Button -->
        <a href="index.php" class="btn btn-home">Home</a>
    </div>
</body>
</html>
