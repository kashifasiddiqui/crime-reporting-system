<?php

include 'includes/overallheader.php';

if (!isset($_SESSION['email'])) {
    header('Location:../logout.php');
}

?>
<div class="container">
    <div id="header">
        <div class="mainLogo">
            <div class="logo"><img src="../assets/images/lg.png" width="60px" height="50px" /> Crime <span> reporter</span></div>
        </div>
        <div id="login">
            <?php if (isset($_SESSION['email'])) { ?>
                <div class="div1">
                    <img src="../assets/images/lock-open.png" style="position: relative; top: 3px;"> &nbsp; You are logged in as: <b>Admin</b>
                </div>
            <?php } else { ?>
                <a href="login.php">Login</a> | <a href="register.php">Register</a>
            <?php } ?>
        </div>
    </div>
    <?php include 'includes/menu.php'; ?>
    <div class="clear"></div>

    <div class="main">
        <div class="heading">
            <h1><img src="../assets/images/home.png" style="position: relative; " />&nbsp; Application</h1>
            <div class="clear"></div>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-content">

                        <div class="dashboard-heading">Details</div>

                        <table width="50%">
                            <?php

                            if (isset($_GET['id'])) {
                                $id = urldecode($_GET['id'])
                            ?>
                                <form method="post" action="application_handler.php">
                                    <input type="hidden" name="number_plate" value="<?php echo $id; ?>">

                                    <?php

                                    if (!isset($_GET['status'])) {
                                        $db_conn->getDetailedInfoVehicle($id);
                                    } else {
                                        $db_conn->getDetailedInfoVehicleFound($id);
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="2">
                                            <?php
                                            if (!isset($_GET['status'])) {
                                            ?>
                                                <input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="alert" value="Post Alert" />
                                            <?php
                                            } else {
                                            ?>
                                                <input style="border:none; margin-top: 10px; margin-right:20px;" type="submit" class="btn-success btn-sm pull-right" name="walert" value="Withdraw Alert" />
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                </form>
                            <?php
                            } else {
                                echo "No details to display";
                            }

                            ?>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php include 'php/includes/footer.php'; ?>