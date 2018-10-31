<html>
 <head>
  <title>SQL Injection Playground</title>

  <meta charset="utf-8"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
    <h1>Welcome to the SQL Injection Playground</h1>
    <h4>Here are some endpoints to play around with:</h4>
    <table class="table table-striped">
        <thead><tr><th>URL</th><th>Name</th></tr></thead>
        <?php
            $persons = [
                "Persons"=>"person.php", 
                "Basic Login"=>"login.php",
                "Bit Better Login"=>"login2.php",
            ];
            foreach($persons as $name=>$url) {
                echo '<tr>';
                echo '<td><a href="'.$url.'"><span class="glyphicon glyphicon-search"></span></a></td><td>'.$name.'</td>';
                echo '</tr>';
            }
        ?>
    </table>
    </div>
</body>
</html>
