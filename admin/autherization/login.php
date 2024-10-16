<?php
session_start();
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login_container {
        background: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 360px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
    }

    .login_inp {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        outline: none;
    }

    .login_inp:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .login_butt {
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease, box-shadow 0.3s ease;
    }

    .login_butt:hover {
        background: #0056b3;
    }

    .login_butt:active {
        background: #00408a;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .error {
        color: red;
    }
</style>
<div class="login_container">
    <h2>Log In</h2>
    <form action="" method="post">
        <input class="login_inp" name="lg_username" type="text" placeholder="Username">
        <input class="login_inp" name="lg_password" type="password" placeholder="Password">
        <button class="login_butt" name="lg_btn" type="submit">Submit</button>
    </form>
    <?php
    if (isset($_POST['lg_btn'])) {
        $username = $_POST['lg_username'];
        $userPassword = $_POST['lg_password'];
        if (!$username || !$userPassword) {
            echo '<p class="error">all fields are required</p>';
            return;
        }
        include('../includes/dbconn.php');
        $query = "SELECT fpassword FROM `admin` WHERE username = '$username'";
        $query_run = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($query_run);
        if (!$data) {
            echo '<p class="error">username is not valid</p>';
            return;
        }
        $Passkey = $data['fpassword'];
        if ($Passkey == $userPassword) {
            $_SESSION["authUser"] = $username;
            setcookie("authUser", $username, time() + (86400 * 30), "/");
            header('Location: ../dashboard.php', true, 303);
        } else {
            echo "<p class='error'>Password didn't match</p>";
        }
        mysqli_close($conn);
    }
    ?>
</div>