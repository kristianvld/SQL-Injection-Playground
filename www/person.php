<html>
 <head>
  <title>Common US Names 1970</title>

  <meta charset="utf-8"> 

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}

p {
    color: gray;
}

.tooltip.top .tooltip-arrow {
    border-top-color: #eee;
}

.tooltip-inner {
    background-color: #eee;
    color: #444;
    max-width: 500px;
}

.tooltip.in {
    opacity: 1.0;
}

.click-hand {
    cursor: help;
}

.anchor {
    position: relative;
}

.right {
    position: absolute;
    right: 0px;
}

.container {
}
  </style>

</head>
<body>
    <div style="position: static; font-size: 20px; padding: 5px;">
        <a href="/">
            <i class="glyphicon glyphicon-home"></i>
        </a>
    </div>
    <div class="container">
    <h1>Common Names (All Ages) in the United States 1990</h1>
    <div class="anchor">
        <a data-toggle="tooltip" title="Can you read the secrets from extract_secrets table?" class="click-hand right">Help?</a>
    </div>
    <form method="get">
        <p> You can use wildcards _ as single letter and % as any string.</p>
        <div id="custom-search-input">
            <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" placeholder="Search name..." name="search"/>
                <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="button">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </form>
    <table class="table table-striped">
        <thead><tr><th></th><th>Name</th><th>Percent</th></tr></thead>
        <?php
        require_once("sql.php");
        $name = "%";
        if ($_GET["search"]) {
            $name = $_GET["search"];
            echo "<h4>Searching for '$name'</h4>";
        }
        $query = "SELECT name, percent FROM extract_us_names_1970 WHERE name LIKE '$name'";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            echo "<b>Fatal error:</b> ". mysqli_error($conn);
            echo "<br><b>Query</b>: " . $query;
        } else {
            while($value = $result->fetch_array(MYSQLI_ASSOC)){
                echo '<tr>';
                    $name = $value["name"];
                    $percent = $value["percent"];
                    echo '<td><a href="?search='.$name.'"><span class="glyphicon glyphicon-search"></span></a></td>';
                    echo "<td>$name</td><td>$percent</td>";
                echo '</tr>';
            }
            $result->close();
        }
        mysqli_close($conn);
        ?>
        </table>
    </div>
</body>
<footer>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
</footer>
</html>
