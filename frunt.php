<?php
include 'pdo1.php'; // Include your PDO connection

// Fetch regions and crimes for filtering options
$regions = $pdo->query("SELECT * FROM regions")->fetchAll(PDO::FETCH_ASSOC);
$crimes = $pdo->query("SELECT * FROM crimes")->fetchAll(PDO::FETCH_ASSOC);

// Fetch forums based on selected region and crime type
$region_id = $_GET['region'] ?? null;
$crime_id = $_GET['crime'] ?? null;

$query = "SELECT f.id, r.region_name, c.crime_name FROM forums f
          JOIN regions r ON f.region_id = r.id
          JOIN crimes c ON f.crime_id = c.id
          WHERE 1=1";

$params = [];

if ($region_id) {
    $query .= " AND f.region_id = :region_id";
    $params['region_id'] = $region_id;
}

if ($crime_id) {
    $query .= " AND f.crime_id = :crime_id";
    $params['crime_id'] = $crime_id;
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$forums = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Light background color */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Container for the main content */
        .container {
            width: 90%;
            max-width: 1200px; /* Increased maximum width */
            margin: 0 auto;
            padding: 30px;
            background-color: #e0f7fa; /* Faded blue background for the container */
            border-radius: 12px;       /* Rounded edges for the container */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Increased shadow for more depth */
        }

        /* Header styles */
        h1 {
            color: #333;
            text-align: center;
            padding-top: 30px;
            font-size: 28px; /* Increased font size */
        }

        h2 {
            color: #333;
            text-align: center;
            font-size: 24px; /* Increased font size */
            margin-bottom: 20px;
        }

        /* Form styles */
        form {
            margin-bottom: 30px;
            display: flex;
            justify-content: center; /* Center form elements horizontally */
            gap: 20px; /* Space between form elements */
            flex-wrap: wrap; /* Allow form elements to wrap if needed */
        }

        label {
            margin: 0;
            font-weight: bold;
            font-size: 16px; /* Increased font size for labels */
        }

        select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 16px; /* Increased font size for dropdowns */
            width: 220px; /* Increased width for dropdowns */
        }

        button {
            padding: 10px 20px;
            background-color: #007bff; /* Blue background for the button */
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px; /* Increased font size for button */
            transition: background-color 0.3s, transform 0.3s; /* Smooth transition for hover effect */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
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
            font-size: 18px; /* Increased font size for forum links */
            display: block;
            padding: 10px;
            background-color: #f9f9f9; /* Light background for list items */
            border-radius: 6px; /* Rounded corners for list items */
            border: 1px solid #ddd; /* Border for list items */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effect */
            width: 80%; /* Increased width */
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
    <div class="container">
        <h1>Forum</h1>
        <form method="GET" action="frunt.php">
            <label for="region">Filter by Region:</label>
            <select name="region" id="region">
                <option value="">All Regions</option>
                <?php foreach ($regions as $region): ?>
                    <option value="<?= htmlspecialchars($region['id']) ?>" <?= $region_id == $region['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($region['region_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="crime">Filter by Crime:</label>
            <select name="crime" id="crime">
                <option value="">All Crimes</option>
                <?php foreach ($crimes as $crime): ?>
                    <option value="<?= htmlspecialchars($crime['id']) ?>" <?= $crime_id == $crime['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($crime['crime_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Filter</button>
        </form>

        <h2>Available Forums</h2>
        <ul>
            <?php if (count($forums) > 0): ?>
                <?php foreach ($forums as $forum): ?>
                    <li><a href="backum.php?id=<?= htmlspecialchars($forum['id']) ?>">
                        <?= htmlspecialchars($forum['region_name']) ?> - <?= htmlspecialchars($forum['crime_name']) ?>
                    </a></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No forums available for the selected filters.</li>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
