<?php

require 'vendor/autoload.php';
require_once("./Car.php");
require_once("./Service.php");
use Symfony\Component\DomCrawler\Crawler;
use Curl\Curl;

$cars=array();
$service = new Service();
$service->data_autoscout24();


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
/*<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Cars Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Scarp new cars</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM Cars";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>title</th>";
                                        echo "<th>transmission</th>";
                                        echo "<th>registerDate</th>";
                                        echo "<th>reg_date</th>";
                                        echo "<th>price</th>";
                                        echo "<th>power</th>";
                                        echo "<th>mileage</th>";
                                        echo "<th>image</th>";
                                        echo "<th>fuel</th>";
                                        echo "<th>externalID</th>";
                                        echo "<th>equipement</th>";
                                        echo "<th>emission</th>";
                                        echo "<th>color</th>";
                                        echo "<th>body</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['transmission'] . "</td>";
                                        echo "<td>" . $row['registerDate'] . "</td>";
                                        echo "<td>" . $row['reg_date'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td>" . $row['power'] . "</td>";
                                        echo "<td>" . $row['mileage'] . "</td>";
                                        echo "<td>" . $row['image'] . "</td>";
                                        echo "<td>" . $row['fuel'] . "</td>";
                                        echo "<td>" . $row['externalID'] . "</td>";
                                        echo "<td>" . $row['equipement'] . "</td>";
                                        echo "<td>" . $row['emission'] . "</td>";
                                        echo "<td>" . $row['color'] . "</td>";
                                        echo "<td>" . $row['body'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
*/