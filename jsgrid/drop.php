<?php
/**
 * Created by PhpStorm.
 * User: horra
 * Date: 9/18/2017
 * Time: 8:59 PM
 */

    // require our class
    require_once("grid.php");

    // load our grid with a table
    $grid = new Grid("users", array(
        "save"=>true,
        "select" => 'selectFunction'
    ));
    // if you have anonymous function support in PHP (5.3.2+) Then you can just write the
    // Function above instead of creating a separate one here.
    function selectFunction($grid) {
        $selects = array();

        // category select
        $grid->table = "users";
        $selects["id"] = $grid->makeSelect("id","user_name");

        // active select
        $selects["supporter="] = array("1"=>"true","0"=>"false");

        // render data
        $grid->render($selects);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="grid.css" title="openJsGrid"/>
    <script src="jquery.js" type="text/javascript"></script>
    <script src="root.js"></script>
    <script src="grid.js"></script>

    <script type="text/javascript">
        $(function() {


            var $grid = $(".users").grid({
                title : "users",
                page : 1,
                showPager : true,
                editing : true,
                deleting : false,
                nRowsShowing : 10,
                width: 800,
                rowNumbers: true,
                checkboxes: true,
                cellTypes : {
                    "hashBang": function(value, columnOpts, grid) {
                        console.log(value, columnOpts, grid);
                        return {
                            cellClass: "",
                            cellValue: "/#!/"+value
                        }
                    }
                }
            }).on("loadComplete",function(e, grid) {
                console.log("loadComplete", grid);
            }).on("cellClick",function(e, $cell,rowData) {
                //console.log("cell",$cell,rowData);
            }).on("rowCheck",function(e, $checkbox, rowData) {
                //console.log("rowCheck",$checkbox, rowData);
            }).on("rowClick",function(e, $rows,rowData) {
                //console.log("rowClick",$rows,rowData);
            }).on("save",function(e, row, res) {
                //console.log("save",row,res);
            });

        });
    </script>
</head>
<body>
<h2>Users</h2>
<table class="grid users" action="ajax.php">
    <tr>
        <th col="thumb" width="50" type="image" href="http://google.com?q={{columns.Title}}"></th>
        <th col="Title"	width="200" href="http://google.com?q={{value}}">Title</th>
        <th col="Price" type="money">Price</th>
        <th col="TutorialID"  type="hashBang">TutorialID</th>
        <th col="DateCreated" type="date">Last Login</th>
        <th col="CategoryID" type="select">CategoryID</th>
        <th col="active" type="select">Active</th>
    </tr>
</table>

</body>
</html>

