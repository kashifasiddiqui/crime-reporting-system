 <?php
// Sample data for heroes
$heroes = [
    ['name' => 'Alice Johnson', 'good_deed' => 'Reported a major drug ring to authorities.', 'file' => 'personal.php'],
    ['name' => 'Bob Smith', 'good_deed' => 'Provided crucial information leading to the arrest of a high-profile criminal.', 'file' => 'bob-smith.php'],
    ['name' => 'Charlie Davis', 'good_deed' => 'Helped expose a corrupt police officer.', 'file' => 'charlie-davis.php'],
    ['name' => 'Diana Evans', 'good_deed' => 'Shared evidence that led to solving a cold case.', 'file' => 'diana-evans.php'],
    ['name' => 'Edward Harris', 'good_deed' => 'Assisted in tracking down a missing person.', 'file' => 'edward-harris.php'],
    ['name' => 'Fiona Green', 'good_deed' => 'Alerted authorities about human trafficking activities.', 'file' => 'fiona-green.php'],
    ['name' => 'George King', 'good_deed' => 'Provided tips that led to the capture of a fugitive.', 'file' => 'george-king.php'],
    ['name' => 'Hannah Lee', 'good_deed' => 'Helped identify suspects in a major robbery case.', 'file' => 'hannah-lee.php'],
    ['name' => 'Isaac Martinez', 'good_deed' => 'Shared crucial surveillance footage with law enforcement.', 'file' => 'isaac-martinez.php'],
    ['name' => 'Jasmine Nelson', 'good_deed' => 'Assisted in uncovering organized crime networks.', 'file' => 'jasmine-nelson.php'],
    // Add more heroes as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero's List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            width: 100%;
            height: 100%;
            background: white;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            background: #200202;
            color: white;
            padding: 20px;
            width: 100%;
            text-align: center;
            font-size: 2em;
            font-weight: bold;
            position: sticky;
            top: 0;
            z-index: 1;
        }
        .list {
            width: 100%;
            max-width: 1200px;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .list-item {
            padding: 20px;
            border-bottom: 1px solid #ddd;
            background: #fff;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px 0;
        }
        .list-item:hover {
            background: #e0f7fa;
            transform: scale(1.02);
        }
        .name {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 10px;
            text-decoration: none;
        }
        .name a {
            color: #333;
            text-decoration: none;
        }
        .name a:hover {
            color: red;
            text-decoration: underline;
        }
        .good-deed {
            color: #555;
            text-align: center;
        }
        @media (max-width: 768px) {
            .name {
                font-size: 1em;
            }
            .good-deed {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Hero's List</div>
    <div class="list">
        <?php foreach ($heroes as $hero): ?>
            <div class="list-item">
                <div class="name">
                    <a href="<?php echo htmlspecialchars($hero['file']); ?>"><?php echo htmlspecialchars($hero['name']); ?></a>
                </div>
                <div class="good-deed"><?php echo htmlspecialchars($hero['good_deed']); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>


</body>
</html>
