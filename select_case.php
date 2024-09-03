<?php
include 'pdo2.php';
session_start();

if (!isset($_POST['department_id'])) {
    header('Location: select_department.php');
    exit();
}

$department_id = $_POST['department_id'];
$_SESSION['department_id'] = $department_id;

// Fetch cases from the selected department
$cases = $pdo->prepare("SELECT * FROM cases WHERE department_id = :department_id");
$cases->execute(['department_id' => $department_id]);
$cases = $cases->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Case</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom container styling */
        .custom-container {
            background-color: rgba(173, 216, 230, 0.3); /* Faded blue background */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Enhanced shadow */
            border-radius: 10px;
            padding: 40px;
            margin-top: 50px;
            max-width: 800px;
        }

        .custom-container h2 {
            text-align: center;
            color: #004085; /* Darker blue text */
            font-size: 2rem; /* Increased heading size */
        }

        .custom-container p {
            text-align: center;
            color: #333;
            font-size: 1.2rem; /* Added paragraph text */
            margin-bottom: 20px;
        }

        .custom-container .btn-primary {
            background-color: #004085; /* Custom button color */
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .custom-container .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarges button on hover */
        }

        .custom-container .btn-secondary {
            background-color: #6c757d; /* Gray color for secondary button */
            border: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .custom-container .btn-secondary:hover {
            background-color: #5a6268; /* Darker gray on hover */
            transform: scale(1.05); /* Slightly enlarges button on hover */
        }

        .custom-container .btn-wrapper {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="custom-container">
            <h2>Select Case</h2>
            <p>Please choose the case from the list below to proceed.</p>
            <form action="forum.php" method="POST">
                <div class="mb-3">
                    <label for="case" class="form-label">Case</label>
                    <select id="case" name="case_id" class="form-select" required>
                        <option value="">Choose a case</option>
                        <?php foreach ($cases as $case): ?>
                            <option value="<?= htmlspecialchars($case['id']) ?>">
                                <?= htmlspecialchars($case['case_title']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="btn-wrapper">
                    <button type="submit" class="btn btn-primary w-100">Next</button>
                </div>
            </form>
            <div class="btn-wrapper">
                <button onclick="history.back()" class="btn btn-secondary w-100">Back</button>
            </div>
        </div>
    </div>
</body>
</html>
