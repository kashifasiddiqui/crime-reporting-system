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
            <h2>Impact of Drug Dealers</h2>
            <p>
            Drug dealing is a pervasive issue that poses a severe threat to communities across India. The proliferation of illegal drugs contributes to a range of social problems, including addiction, crime, and violence. Drug dealers often exploit vulnerable individuals and communities, leading to devastating consequences for public health and safety. Addressing the drug trade requires a comprehensive approach that includes law enforcement efforts, public awareness campaigns, and support for addiction treatment and rehabilitation.        </div>
        <img src="assets/images/lg.jpg" alt="Blog Image">
    </div>

    <div class="post">
        <div class="content">
            <h2>Strengthening the Fight</h2>
            <p>
            Combating drug trafficking demands a coordinated effort between law enforcement agencies, policymakers, and community organizations. Effective strategies involve enhancing border security, improving intelligence sharing, and implementing stricter regulations on controlled substances. Additionally, addressing the root causes of drug abuse, such as poverty and lack of education, is essential for reducing demand and preventing drug-related crime. By fostering collaboration and investing in prevention and treatment programs, India can make significant strides in tackling the drug trade and its detrimental effects on society.</p>
        </div>
        <img src="assets/images/terrorism.svg" alt="Blog Image">
    </div>
</div>

