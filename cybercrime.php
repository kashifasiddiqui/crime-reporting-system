<?php
include 'php/includes/header.php';


?>
<div class="container" id="wrapper">
    <div id="header">
        <div class="mainLogo">
            <div class="logo"><img src="assets/images/lgnew.png" width="170px" height="70px" /> </div>
        </div>
        <div id="login">
            <?php if (isset($_SESSION['email'])) { ?>
                
            <?php } else { ?>
                <a href="login.php" style="background-color: #202022; color: white; padding: 10px; text-decoration: none; border-radius: 15px;
">Login</a> | 
                <a href="register.php" style="background-color: #202022; color: white; padding: 10px; text-decoration: none; border-radius: 15px;
">Register</a>
            <?php } ?>
        </div>
    </div>

    
    <div style="clear:both;"></div>
    <div id="nav">
        <?php include 'php/includes/navigation.php' ?>
    </div>
    <div id="main">
        <div class="row" id="slider-background">
        <div class="col-sm-3">
    <style>
 h1 {
     margin: 0;
     font-size: 2em;
}

.container {
    margin: 20px auto;
    padding: 20px;
    padding-top: 0px;
}

.post {
    margin-bottom: 40px;
    margin-right: 60px;
    margin-left: -20px;
    display: flex;
    align-items: flex-start;
}

.post .content {
    flex: 1;
    margin-right: 120px;
    margin-left: 10px; /* Added to make the left edge shorter */
}

.post h2 {
    color: #333;
    font-size: 1.5em;
    margin-bottom: 10px;
}

.post p {
    color: #666;
    line-height: 1.6;
}

.post .meta {
    color: #999;
    font-size: 0.9em;
    margin-bottom: 10px;
}

.post img {
    max-width: 200px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

        
    </style>
</head>
<body>

<div class="container">
    <div class="post">
        <div class="content">
            <h2>Types</h2>
            <p>
            Cyber crimes in India can be broadly categorized into several types, including financial frauds, identity theft, cyberbullying, and cyber espionage. Financial frauds, such as phishing and online scams, are among the most common, often targeting vulnerable individuals. Identity theft involves stealing personal information to commit fraud or impersonate someone online. Cyberbullying, particularly on social media platforms, has become a growing concern, especially among young users        </div>
        <img src="assets/images/lg.jpg" alt="Blog Image">
    </div>

    <div class="post">
        <div class="content">
            <h2>How to Protect</h2>
            <p>
            To protect yourself from cyber crimes, it is essential to follow basic cybersecurity practices such as using strong, unique passwords, enabling two-factor authentication, and being cautious of suspicious emails and links. Regularly updating software and using antivirus programs can also help safeguard your digital devices.</p>
        </div>
        <img src="assets/images/terrorism.svg" alt="Blog Image">
    </div>
</div>

