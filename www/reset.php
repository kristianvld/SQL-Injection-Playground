<?php
session_start();
?>
<html>
    <header>
        <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form input[type=submit] {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form input[type=submit]:hover,.form input[type=submit]:active,.form input[type=submit]:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
        </style>
    </header>

    <body>
        <div class="login-page">
            <div class="form">
                <h1>Reset Page</h1>
                <p>Are you sure you want to reset? This will reset the entire sql database.</p>
                <form method="POST">
                    <input type="hidden" name="confirm-reset">
                    <input type="submit" value="Confirm">
                </form>
                <?php
                    if (isset($_POST["confirm-reset"])) {
                        include_once("sql.php");
                        $result = mysqli_query($conn, "SELECT DATABASE() as db");
                        if(!$result)
                        {
                            echo "Error reading database name.";
                            echo mysqli_error($conn);
                        } else {
                            $db = mysqli_fetch_assoc($result)["db"];
                            if(!mysqli_multi_query($conn, "DROP DATABASE IF EXISTS $db; CREATE DATABASE $db;")) {
                                echo "Error dropping/creating database.";
                                echo mysqli_error($conn);
                            } else {
                                echo "<p>Dropped and recreated database.</p>";
                                while(mysqli_next_result($conn)){;}
                                mysqli_select_db($conn, $db);
                                $error = false;
                                foreach (glob("/var/www/dump/*.sql") as $file) {
                                    $sql = file_get_contents($file);
                                    if(!mysqli_multi_query($conn, $sql)) {
                                        echo mysqli_error($conn);
                                        $error = true;
                                        break;
                                    }
                                    while(mysqli_next_result($conn)){;}
                                    echo "<p>Executed ".basename($file)."</p>";
                                }
                                if(!$error)
                                {
                                    echo '<p><b>Successfully reset database.</b></p>';
                                }
                            }
                        }
                        mysqli_close($conn);
                    }

                ?>
            </div>
        </div>
    </body>
</html>