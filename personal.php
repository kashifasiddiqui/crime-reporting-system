<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alice Johnson - Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure body takes up at least the full viewport height */
            overflow: auto;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Ensure space between content and footer */
        }
        .header {
            background: #800000; /* Maroon red */
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }
        .content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1; /* Allow content to grow and fill space */
        }
        .profile-info {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            width: 100%;
            max-width: 1000px;
        }
        .profile-info img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }
        .profile-info .details {
            max-width: 600px;
            flex: 1;
        }
        .profile-info .details h1 {
            margin: 0;
            font-size: 1.8em;
            color: #333;
        }
        .profile-info .details p {
            margin: 5px 0;
            color: #555;
        }
        .note {
            margin: 20px 0;
            padding: 15px;
            background: #e0f7fa;
            border-left: 5px solid #4CAF50;
            width: 100%;
            max-width: 800px;
        }
        .evidence {
            width: 100%;
            max-width: 800px;
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .evidence img {
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .button-container {
            padding: 20px;
            text-align: center;
            background: #fff; /* Match the container background */
        }
        .button-container a {
            display: inline-block;
            padding: 15px 25px;
            font-size: 1em;
            color: #fff;
            background: #200202;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s, transform 0.3s;
        }
        .button-container a:hover {
            background: #C70039;
            transform: scale(1.05);
        }
        @media (max-width: 768px) {
            .profile-info {
                flex-direction: column;
                align-items: center;
            }
            .profile-info img {
                margin: 0 0 20px 0;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">Alice Johnson - Details</div>
    <div class="content">
        <div class="profile-info">
            <img src="https://img.freepik.com/free-photo/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair_285396-896.jpg?size=626&ext=jpg&ga=GA1.1.2008272138.1724889600&semt=ais_hybrid" alt="Alice Johnson">
            <div class="details">
                <h1>Alice Johnson</h1>
                <p><strong>Age:</strong> 29</p>
                <p><strong>Good Deed:</strong> Reported a major drug ring to authorities.</p>
            </div>
        </div>
        <div class="note">
        Alice played a pivotal role in uncovering a major drug ring, providing essential information that enabled law enforcement to act decisively. Her detailed reports and cooperation were instrumental in the investigation, leading to the apprehension of key figures within the organization. The drug ring's dismantling has had a significant impact on reducing drug-related crime in the area. Alice's bravery and commitment to justice have been widely recognized. Her actions exemplify the critical role individuals can play in supporting law enforcement and enhancing community safety.        </div>
        <div class="evidence">
            <img src="https://www.shutterstock.com/image-photo/drug-trafficker-holding-cash-on-600nw-587468072.jpg" alt="Evidence Image 1">
        </div>
    </div>
    <div class="button-container">
        <a href="index.php">Back to Main Menu</a>
    </div>
</div>

</body>
</html>
