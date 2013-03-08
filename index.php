<?php

/**
 * TODO: no input check
 * tax information comes from http://www.salestaxinstitute.com/resources/rates
 */


/**
 * connection to the database
 * TODO: make the connection parameter the args of the functions
 */
function db_connect()
{
    $database = mysqli_connect("localhost", "root", "URpu55y!", "website");

    if(mysqli_connect_errno($conn))
    {
        echo "Failed to connect to MysSQL: " . mysqli_connect_errno();
    }

    return $database;
}


/**
 * disconnect current connection to the database
 */
function db_disconnect($database)
{
    mysqli_close($database); /* not sure of the return value of this function
                                shoule added some exception handling here */
}

/**
 * select items from database and return as an array
 */
function get_items($database)
{
    $result = mysqli_query($database, "SELECT * FROM item");

    return $result;
}

function get_tax($state)
{
    $database = db_connect();
    $record = mysqli_query($database, "SELECT tax FROM tax WHERE state='" . $state . "'");
    db_disconnect($database);

    $result = mysqli_fetch_array($record);

    return $result['tax'];
}

function display_items($items)
{
    echo "<table class=\"table table-hover\">
                <caption>Buy you a next-gen operating system !</caption>
                <thead>
                    <tr>
                        <th>select</th>
                        <th>name</th>
                        <th>description</th>
                        <th>cost</th>
                        <th>quantity</th>
                    </tr>
                <thead>
                <tbody>";
    while($item = mysqli_fetch_array($items))
    { 
        echo "
                    <tr >
                        <td>
                            <label class=\"checkbox inline\">
                                <input id=\"" . $item[id] . "\" type=\"checkbox\" onchange=\"checkboxChanged(this);\">
                            </label>
                        </td>
                        <td>" . $item[name] . "</td>
                        <td>" . $item[description]. "</td>
                        <td id=\"cost" . $item['id'] ."\">" . $item[cost]. "</td>
                    </tr>";
    }
    echo "
                </tbody>
         </table>";

    db_disconnect($database);
}

function fill_states()
{
    $database = db_connect();

    $sql = "SELECT * FROM tax";
    $taxes = mysqli_query($database, $sql);

    while($tax = mysqli_fetch_array($taxes))
    {
        echo "<option value=\"" . $tax['tax'] . "\">" . $tax['state'] . "</option>";
    }

    db_disconnect($database);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>software paradigms - project 1</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function checkboxChanged(checkbox)
            {
                var id = checkbox.id;

                if(checkbox.checked)
                {
                    $("#cost" + id).after("<td id=\"quantity" + id + "\"><input id=\"" + id + "\" class=\"input-mini qty\" type=\"number\" value=\"1\"></td>");
                }
                else
                {
                    $("#quantity" + id).remove();
                }
            }

            function reset()
            {
                $(":checkbox").each(function(){this.checked=false; $("#quantity" + this.id).remove();});
                $("#costVal").remove();
                $("#taxVal").remove();
                $("#totalVal").remove();
            }

            function calculate()
            {
                var cost = 0;

                $(".qty").each(function() {cost = cost + parseInt(this.value) * parseFloat($("#cost" + this.id).text());});
                var tax = $("#state").val() * cost;

                $("#costVal").remove();
                $("#taxVal").remove();
                $("#totalVal").remove();

                $("#cost").after("<a id=\"costVal\">" + cost.toFixed(2) + "</a>");
                $("#tax").after("<a id=\"taxVal\">" + tax.toFixed(2) + "</a>");
                $("#total").after("<a id=\"totalVal\">" + (cost + tax).toFixed(2) + "</a>");
            }
        </script>
    </head>
    <body>
        <!-- <form action="" method="POST"> -->
            <?php
                $database = db_connect();
                $items = get_items($database);
                display_items($items);
            ?>
            <a>Address:</a><input type="text" placeholder="Input your address here ...">
            <br>
            <a>State: </a>
            <select id="state" class="span2">
                <?php fill_states(); ?>
            </select>
            <br>
            <a id="cost">Cost: </a>
            <br>
            <a id="tax">Tax: </a>
            <br>
            <a id="total">Total: </a>
            <br>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" onclick="calculate()">Calculate</button>
                <button type="submit" class="btn btn-danger" onclick="reset()">Reset</button>
            </div>
        <!-- </form> -->
    </body>
</html>
