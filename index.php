<?php
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vagrant : Home</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
    <link rel="icon" href="images/logo.jpg" type="image/x-icon">
    <style>
        .adminbtn {
            background:rgba(white, 0.5);
            border: none;
            color: black;
            padding: 1px 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            float: right;
            margin-top: 12px;
            margin-left: 2px;
        }

        .adminbtn:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.8), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
        body {
            background: url(images/body.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <!--Main container starts-->
    <div class="main_wrapper">
        <!--Header starts-->
        <?php include 'includes/header.php'; ?>
        <!--Header ends-->
        <!--Navbar starts-->
        <?php include 'includes/navbar.php'; ?>
        <!--Navbar ends-->
        <!--Content starts-->
        <div class="content_wrapper">
            <!--left-sidebar starts-->
            <?php include "includes/left-sidebar.php"; ?>
            <!--left-sidebar ends-->
            <div id="content_area">
                <?php cart(); ?>
                <div id="shopping_cart">
                    <span style="float: right;font-size: 18px;padding: 5px;line-height: 40px;">
                        <?php
                        if (isset($_SESSION['customer_email'])) {
                            echo "<b>Welcome: </b>" . $_SESSION['customer_email'] . "<b style='color: yellow;'> Your</b>";
                        } else {
                            echo "<b>Welcome Guest:</b>";
                        }
                        ?>
                        <b style="color: yellow;">Shopping Cart-</b> Total Items: <?php total_items(); ?>
                        Total Price: <?php total_price(); ?> <a href="cart.php" style="color: yellow;">Go to Cart</a>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {
                            echo "<a href='checkout.php' style='color: orange;'>User Login</a>";
                        } else {
                            echo "<a href='logout.php' style='color: orange;''>Logout</a>";
                        }
                        ?>
                        <a style="background:rgba(0, 0, 0, 0.5); color: white;"href="admin_area/index.php"><button class="adminbtn">Admin Login</button></a>
                    </span>
                </div>
                <div id="packages_box">
                    <?php getPack(); ?>
                    <?php getCatPack(); ?>
                    <?php getTypePack(); ?>
                </div>
            </div>
        </div>
        <!--Content ends-->
        <!--footer starts-->
        <?php include "includes/footer.php";?>
        <!--footer ends-->
    </div>
    <!--Main container ends-->
</body>
</html>