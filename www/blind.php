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
p {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
p a {
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
.login-form {
  padding-top: 15px;
}
        </style>
    <title>Blind user lookup</title>
    </header>
    <body>
      <div class="login-page">
        <div class="form">
          <h3>User lookup:</h3>
          <?php
            if ($_POST["username"]) {
              include_once("sql.php");
              $name = $_POST["username"];
              $query = "SELECT * FROM blind_users WHERE username='$name'";
              $result = mysqli_query($conn, $query);
              if (!$result) {
                echo "<p><b>$query</b></p>";
                echo "<p><b>".mysqli_error($conn)."</b></p>";
              } else if ($result->num_rows) {
                echo '<h3>User exists.</h3>';
              } else {
                echo '<h3>Unknown user.</h3>';
              }
            }
          ?>
          <form class="login-form" method="POST" id="login-form">
            <input type="text" placeholder="username" name="username"/>
            <input type="submit" value="Lookup">
            <p class="message">Can you read the secrets from the secret table? 
                               This might require some extensive scripting. Is there a place 
                               to lookup tables and their structures?</p>
          </form>
        </div>
      </div>
    </body>
</html>