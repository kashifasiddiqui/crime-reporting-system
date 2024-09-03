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
            <h2>Persistent Challenge</h2>
            <p>
            Public corruption is a critical issue that undermines the integrity of governance and public trust in India. From bribery and embezzlement to abuse of power, corrupt practices erode the effectiveness of public institutions and hinder socio-economic development. High-profile cases involving politicians, bureaucrats, and law enforcement officials have highlighted the pervasive nature of corruption, revealing how it impacts every level of government and administration. Efforts to combat public corruption must include transparent processes, stringent accountability measures, and active citizen engagement to foster a culture of integrity.
</div>
        <img src="assets/images/lg.jpg" alt="Blog Image">
    </div>

    <div class="post">
        <div class="content">
            <h2>Effect of Corruption on Society</h2>
            <p>
            The consequences of public corruption extend beyond financial losses; they affect the quality of public services and the overall well-being of citizens. Corruption can lead to substandard infrastructure, inadequate healthcare, and poor educational facilities, particularly affecting marginalized communities. It also perpetuates inequality and injustice, as those with connections or resources often receive preferential treatment. Addressing corruption requires a multi-faceted approach, including legal reforms, whistleblower protection, and increased transparency to ensure that public officials act in the best interest of the people.</p>
        </div>
        <img src="assets/images/terrorism.svg" alt="Blog Image">
    </div>
</div>

