<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="checkbox" name="ahh"> Remember Me<br>
    <input type="submit" value="Login" name="save">
</form>


<?php

if(isset($_COOKIE['user'])&& isset($_COOKIE['pass'])){
    if ($_COOKIE['user'] == "sharQoo" && $_COOKIE['pass'] == "909090"){
        header("location:index.php");
    }
}


if(isset($_POST['save'])){
    if ($_POST['username'] == "sharQoo" && $_POST['password'] == "909090") {
        if(isset($_POST['ahh'])){
            setcookie("user",$_POST['username'],time()+60*60*300);
            setcookie("pass",$_POST['password'],time()+60*60*300);
        }
        header("location:index.php");
    }


 else {
        echo "<h3>erorrr username or password</h3>";
    }
}
?>