<?php
include 'php/includes/header.php';
?>

<!-- Container -->
<div class="container" id="wrapper">

    <!-- Header -->
    <div id="header">
        <div class="mainLogo">
            <div class="logo">
                <img src="assets/images/lgnew.png" width="170px" height="70px" />
            </div>
        </div>
        <div id="login">
            <?php if (isset($_SESSION['email'])) { ?>
                <!-- User is logged in, you can add user-specific content here -->
            <?php } else { ?>
                <a href="login.php" style= 'background-color:#200202; padding: 6px; color:white; border-radius: 9px;' >Login</a> | <a href="register.php"style= 'background-color:#200202; padding: 6px; color: white; border-radius:9px;'>Register</a>
            <?php } ?>
        </div>
    </div>

    <!-- Clear Floats -->
    <div style="clear:both;"></div>
    

    <!-- Navigation -->
    <div id="nav">
        <?php include 'php/includes/navigation.php'; ?>
    </div>

    <!-- Main Content -->
    <div id="main">
        <div class="row" id="slider-background">

            <!-- Sidebar -->
            <div class="col-sm-3">
                <style>
                    .leftSidebar {
                        padding: 20px;
                        background-color: #f8f9fa;
                        border-radius: 8px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    }

                    .sidebar-section {
                        margin-bottom: 20px;
                    }

                    .section-title {
                        font-size: 18px;
                        font-weight: bold;
                        color: #990000;
                        margin-bottom: 15px;
                        border-bottom: 3px solid #990000;
                        padding-bottom: 10px;
                        position: relative;
                    }

                    .section-title::after {
                        content: '';
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        width: 50px;
                        height: 3px;
                        background-color: #990000;
                    }

                    .section-content {
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                    }

                    .sidebar-card {
                        background-color: #fff;
                        border: 1px solid #ddd;
                        border-radius: 12px;
                        padding: 15px;
                        display: flex;
                        align-items: center;
                        gap: 15px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        transition: transform 0.3s, box-shadow 0.3s;
                        position: relative;
                    }

                    .sidebar-card:hover {
                        transform: translateY(-5px);
                        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
                    }

                    .card-content {
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }

                    .card-icon-container {
                        width: 40px;
                        height: 40px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 50%;
                     
                        padding: 5px;
                        transition: background 0.3s;
                    }

                    .card-icon {
                        width: 24px;
                        height: 24px;
                        transition: filter 0.3s;
                    }

                    .card-title {
                        font-size: 16px;
                        color: #b30000;
                        text-decoration: none;
                        font-weight: bold;
                        transition: color 0.3s;
                    }

                    .card-title:hover {
                        color: #b30000;
                        text-decoration: none;
                    }

                    .sidebar-card:hover .card-icon-container {
                        background: linear-gradient(135deg, #b30000, #b30000);
                    }

                    .sidebar-card:hover .card-icon {
                        filter: brightness(0.8);
                    }
                </style>

                <div class="leftSidebar">
                    <!-- Sidebar Sections -->

                    <div class="sidebar-section">
                        <h3 class="section-title">Emergency Contact</h3>
                        <div class="section-content">
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/police.svg" alt="Most Wanted Icon" class="card-icon"/>
                                    </div>
                                    <a href="tel:100" class="card-title">Police</a>
                                </div>
                            </div>
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/ambulance.svg" alt="Most Wanted Icon" class="card-icon"/>
                                    </div>
                                    <a href="tel:108" class="card-title">Ambulance</a>
                                </div>
                            </div>
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/Fire_brigade.svg" alt="Most Wanted Icon" class="card-icon"/>
                                    </div>
                                    <a href="tel:101" class="card-title">Fire Brigade</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-section">
                        <h3 class="section-title">Alerts</h3>
                        <div class="section-content">
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/terrorism.svg" alt="Terrorism" class="card-icon"/>
                                    </div>
                                    <a href="terrorism.php" class="card-title">Terrorism</a>
                                </div>
                            </div>
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/cybercrime.svg" alt="Cyber Crime" class="card-icon"/>
                                    </div>
                                    <a href="cybercrime.php" class="card-title">Cyber Crime</a>
                                </div>
                            </div>
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/civilrights.svg" alt="Traffic Alerts" class="card-icon"/>
                                    </div>
                                    <a href="civilrights.php" class="card-title">Civil Rights</a>
                                </div>
                            </div>
                            <div class="sidebar-card">
                                <div class="card-content">
                                    <div class="card-icon-container">
                                        <img src="assets/images/corruption.svg" alt="Terrorist Alerts" class="card-icon"/>
                                    </div>
                                    <a href="publiccorruption.php" class="card-title">Public Corruption</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area with Slider -->
            <div class="col-sm-9">
                <!-- Image Slider -->
                <div class="slider">
                    <div><img src="assets/images/slide1.jpg" alt="Slide 1"></div>
                    <div><img src="assets/images/slide2.jpg" alt="Slide 2"></div>
                    <div><img src="assets/images/slide3.jpg" alt="Slide 3"></div>
                </div>

                <!-- News Section -->
                <div class="news-section">
                    <h2 class="news-title">Latest News</h2>
                    <div class="news-items">
                        <div class="news-item">
                            <img src="assets/images/news_thumbnail1.jpg" alt="News 1" class="news-image"/>
                            <div class="news-content">
                                <h3 class="news-headline">Kolkata doctor rape-murder case</h3>
                                <p class="news-summary">Mamata Banerjee criticized BJP for creating anarchy and denied targeting students in her recent speech. She accused them of spreading false information about her comments.</p>
                                <a href="#" class="news-link">Read More</a>
                            </div>
                        </div>

                        <!-- Add more news items as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'php/includes/footer.php'; ?>

    <!-- Include Slick Slider CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <style>
    .slider {
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .slider img {
        width: 100%;
        height: auto;
        display: block;
    }

    .news-section {
        margin-top: 30px; /* Space between slider and news section */
    }

    .news-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        border-bottom: 2px solid #990000;
        padding-bottom: 10px;
    }

    .news-items {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .news-item {
        display: flex;
        align-items: center; 
        justify-content: center; 
        gap: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px;
    }
    

    .news-image {
        width: 150px; /* Adjust based on your design */
        height: 100px; /* Adjust based on your design */
        object-fit: cover; /* Ensure images cover the area without distortion */
    }

    .news-content {
        padding: 15px;
        flex: 1;
    }

    .news-headline {
        font-size: 18px;
        font-weight: bold;
        margin: 0;
        color: #990000;
    }

    .news-summary {
        font-size: 14px;
        color: #666;
        margin: 10px 0;
    }

    .news-link {
        font-size: 14px;
        color: #007bff;
        text-decoration: none;
    }

    .news-link:hover {
        text-decoration: underline;
    }
    </style>

    <!-- Initialize Slider -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: true
            });
        });
    </script>

</div> <!-- End Container -->