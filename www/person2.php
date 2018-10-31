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

.pull-right {
    padding: 0px;
}

.btn {
    padding: 9px 12px;
}
.pad {
    padding: 10px 0px;
}

.btn-info {
    background-color: #999;
    border-color: #aaa;
}

.btn-info:hover {
    background-color: #777;
    border-color: #888;
}

.btn-info:active {
    background-color: #555;
    border-color: #666;
}

.btn-info:focus:active, .btn-info.focus, .btn-info:focus {
    background-color: #555;
    border-color: #666;
    outline: none;
}

.form-control:active, .form-control:focus, .form-control:focus:active {
    outline: none !important;
    border-color: #ccc;
    box-shadow: none;
}
  </style>

</head>
<body>
    <div class="container">
    <h1>Common Names (All Ages) in the United States 1990</h1>
    <div class="anchor">
        <a data-toggle="tooltip" title="Can you read the secrets from extract_2_secrets table?" class="click-hand right">Help?</a>
    </div>
    <?php
    $limit = 100;
    if($_GET["limit"])
    {
        $limit = $_GET["limit"];
    }
    ?>
    <form method="get">
        <p> This search page has been improved and now uses prepared statements for the search query to prevent SQL Injections.</p>
        <p> You can use wildcards _ as single letter and % as any string.</p>
        <div id="custom-search-input">
            <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" placeholder="Search name..." name="search"/>
                <span class="input-group-btn">
                    <button class="btn btn-info btn-lg">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        </div>
            <div class="col-xs-3 pull-right pad">
                <div class="input-group number-spinner">
                    <span class="input-group-btn data-dwn">
                        <button type="button" class="btn btn-default btn-info" id="btn-down"><span class="glyphicon glyphicon-minus"></span></button>
                    </span>
                    <input id="spinner-text" type="text" class="form-control text-center" value="<?php echo $limit;?>" min="0" name="limit">
                    <span class="input-group-btn data-up">
                        <button type="button" class="btn btn-default btn-info" id="btn-up"><span class="glyphicon glyphicon-plus"></span></button>
                    </span>
                </div>
            </div>
            <div class="col-xs-2 pull-right"><h3 style="margin-top: 12px; margin-left:65px;">Max rows:</h3></div>
    </form>
    <table class="table table-striped">
        <thead><tr><th></th><th>Name</th><th>Percent</th></tr></thead>
        <?php
        require_once("sql.php");
        $name = "%";
        if ($_GET["search"]) {
            $name = $_GET["search"];
            echo "<h4>Searching for '$name'</h4><br>";
        }
        echo "<h5>Max rows $limit</h5>";
        $query = "SELECT a.name as name, p.percent as percent FROM (SELECT * FROM `extract_2_us_names_1970_names` WHERE name LIKE ? LIMIT $limit) AS a INNER JOIN `extract_2_us_names_1970_percentages` AS p ON a.id=p.id";
        #$query = "SELECT name, percent FROM extract_us_names_1970 WHERE name LIKE ? LIMIT $limit";
        $stmt = mysqli_prepare($conn, $query);
        if(!$stmt) {
            echo "<b>Fatal error:</b> ". mysqli_error($conn);
            echo "<br><b>Query</b>: " . $query;
        } else {
            $stmt->bind_param('s', $name);
            $stmt->execute();
            $result = $stmt->get_result();
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
        $("#btn-down, #btn-up").mouseup(function(){
            $(this).blur();
        });
        $("#btn-down").click(function(e) {
            $("#spinner-text").each(function() {
                $(this).val(Math.max(1,parseInt($(this).val()) - 1));
            });
        });
        $("#btn-up").click(function(e) {
            $("#spinner-text").each(function() {
                $(this).val(parseInt($(this).val()) + 1);
            });
        });
    });
    </script>
</footer>
</html>
