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
            <h2>Protecting Civil Rights</h2>
            <p>
            Civil rights are fundamental to ensuring equality, justice, and freedom for every individual. In India, the protection and promotion of civil rights are enshrined in the Constitution, guaranteeing various freedoms such as speech, assembly, and protection from discrimination. However, the journey to uphold these rights is fraught with challenges. Despite legal frameworks designed to safeguard civil liberties, issues such as discrimination, police brutality, and inadequate legal recourse continue to persist, impacting marginalized communities disproportionately.
</div>
        <img src="assets/images/lg.jpg" alt="Blog Image">
    </div>

    <div class="post">
        <div class="content">
            <h2>Role of Civil Society</h2>
            <p>
            Civil society organizations play a crucial role in advocating for civil rights and holding authorities accountable. These organizations work tirelessly to address human rights violations, provide legal assistance to victims, and raise public awareness about civil liberties. By documenting abuses and engaging in policy advocacy, civil society helps ensure that civil rights are not just theoretical promises but lived realities for all citizens. Strengthening the role of these organizations and fostering a culture of accountability and transparency within institutions is essential for advancing civil rights in India.
</p>
        </div>
        <img src="assets/images/terrorism.svg" alt="Blog Image">
    </div>
</div>

