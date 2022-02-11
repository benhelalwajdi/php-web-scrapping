<?php

require 'vendor/autoload.php';
require_once("./Car.php");
require_once("./Service.php");
use Symfony\Component\DomCrawler\Crawler;
use Curl\Curl;

//$crawler = new Crawler($html);
/*
foreach ($crawler as $domElement) {
    var_dump($domElement->nodeName);
}*/

$cars=array();
$service = new Service();
/*$data = */$service->data();

/*
$B = $data->each(function(Crawler $span, $index){
   return $span-> filter('a')->html();
    //return $span->html();
});
$arrlength=count($B);
for($x=0;$x<$arrlength;$x++)
  {
    echo $B[$x];
    //$co2_emission = get_string_between($B[$x], '<span type="co2-emission" class="css-cvkptj e1hcrnma1">', '<');
 /*   $co2_emission = get_string_between($B[$x], '<span type="co2-emission" class="css-cvkptj e1hcrnma1">', '<');
    $mileage = get_string_between($B[$x], '<span type="mileage" class="css-mo69i0 e1hcrnma1">', '<');
    $registration_date = get_string_between($B[$x], '<span type="registration-date" class="css-mo69i0 e1hcrnma1">', '<');
    $power = get_string_between($B[$x], '<span type="power" class="css-mo69i0 e1hcrnma1">', '<');
    $offer_type = get_string_between($B[$x], '<span type="offer-type" class="css-mo69i0 e1hcrnma1">', '<');
    $previous_owners = get_string_between($B[$x], '<span type="previous-owners" class="css-mo69i0 e1hcrnma1">', '<');
    $transmission_type = get_string_between($B[$x], '<span type="transmission-type" class="css-mo69i0 e1hcrnma1">', '<');
    $fuel_category = get_string_between($B[$x], '<span type="fuel-category" class="css-cvkptj e1hcrnma1">', '<');
    $fuel_consumption = get_string_between($B[$x], '<span type="fuel-consumption" class="css-cvkptj e1hcrnma1">', '<');
    $co2_emission = get_string_between($B[$x], '<span type="co2-emission" class="css-cvkptj e1hcrnma1">', '<');
    
    if(($co2_emission != '')){
      if((int)(substr($registration_date,3)) >=2012){
        //echo $co2_emission." \n".substr($registration_date,3)." \n";
        $car = new Car(
                  'null',
                  'null',
                  'null',
                  $fuel_category,
                  $mileage,
                  $registration_date,
                  $power,
                  'null',
                  'null',
                  $co2_emission,
                  $transmission_type,
                  'null',
                  'null',
                );

        array_push($cars,$car);
        for($y=0;$y< count($cars);$y++){
         // echo $cars[$y]->toString()."\n";
        }
      }*
    }
  }
*/

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}