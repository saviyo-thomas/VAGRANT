<?php
include("includes/db.php");
?>
<style type="text/css">
    #fixtd {
        margin-top: 15px;
    }

    #inputbox {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
        width: 100%;
    }
    #btn {
        border: none;
        outline: none;
        height: 40px;
        background:rgba(0, 0, 0, 0.6);
        color: #fff;
        font-size: 18px;
        border-radius: 20px;
        width: 100%;
        font: sans-serif;
    }

    #btn:hover {
        cursor: pointer;
        background:rgba(0, 0, 0, 0.8);
        color: #fff;
    }
    #fp {
        font-size: 14px;
        line-height: 20px;
        color: darkgrey;
    }
    #fp a:hover{
        color: gold;
    }
</style>
<div align="center">
    <form action="" method="post">
        <table width="500px" >
            <tr align="center">
                <td ><h1>Login Here</h1></td>
            </tr>
            <tr align="left">
                <td ><b style="font-family: arial; font-size: 15px;">Email</b></td>
            </tr>
            <tr align="center">
                <td ><input id="inputbox" type="text" name="email" placeholder="Enter your email" required=""></td>
            </tr>
            <tr align="left">
                <td ><b style="font-family: arial; font-size: 15px;">Password</b></td>
            </tr>
            <tr align="center">
                <td ><input id="inputbox" type="password" name="pass" placeholder="Enter your password" required=""></td>
            </tr>
            <tr align="center">
                <td ><input id="btn" type="submit" name="login" value="Login"></td>
            </tr>
    </form>
            <tr align="center">
                <td id="btn"><a href="customer_register.php" style="color: #fff;font-size: 20px;">Sign up</a></td>
            </tr>
            <tr align="center">
                <td ><a href="../checkout.php?forgot_pass"><p id="fp">Forgot Password?</p></a></td>
            </tr>
        </table>
    <?php
    global $con;
    if (isset($_POST['login'])) {
        $c_email = $_POST['email'];
        $c_pass = $_POST['pass'];

        $sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
        $run_c = mysqli_query($con, $sel_c);

        $check_customer = mysqli_num_rows($run_c);

        if ($check_customer == 0) {
            echo "<script>alert('Password or email is incorrect, please try again!')</script>";
            exit();
        }

        $ip = getIp();

        $sel_cart = "select * from cart where ip_add='$ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_customer > 0 and $check_cart == 0) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have logged in successfully. Thanks!')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        } else {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You have logged in successfully. Thanks!')</script>";
            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }
    }
    ?>

</div>
