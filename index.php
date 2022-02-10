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

$a=array("a"=>"red","b"=>"green");
$service = new Service();
$data = $service->data();

$B = $data->each(function(Crawler $span, $index){
   // $mileage = $span-> filter('span')->text()."\n";
    return $span->html();
});
$arrlength=count($B);
for($x=0;$x<$arrlength;$x++)
  {

    $mileage = get_string_between($B[$x], '<span type="mileage" class="css-mo69i0 e1hcrnma1">', '<');
    $registration_date = get_string_between($B[$x], '<span type="registration-date" class="css-mo69i0 e1hcrnma1">', '<');
    $power = get_string_between($B[$x], '<span type="power" class="css-mo69i0 e1hcrnma1">', '<');
    $offer_type = get_string_between($B[$x], '<span type="offer-type" class="css-mo69i0 e1hcrnma1">', '<');
    $previous_owners = get_string_between($B[$x], '<span type="previous-owners" class="css-mo69i0 e1hcrnma1">', '<');
    $transmission_type = get_string_between($B[$x], '<span type="transmission-type" class="css-mo69i0 e1hcrnma1">', '<');
    $fuel_category = get_string_between($B[$x], '<span type="fuel-category" class="css-cvkptj e1hcrnma1">', '<');
    $fuel_consumption = get_string_between($B[$x], '<span type="fuel-consumption" class="css-cvkptj e1hcrnma1">', '<');
    $co2_emission = get_string_between($B[$x], '<span type="co2-emission" class="css-cvkptj e1hcrnma1">', '<');
    echo $mileage;
    echo "\n";
    echo $registration_date;
    echo "\n";
    echo $power;
    echo "\n";
    echo $offer_type;
    echo "\n";
    echo $previous_owners;
    echo "\n";
    echo $transmission_type;
    echo "\n";
    echo $fuel_category;
    echo "\n";
    echo $fuel_consumption;
    echo "\n";
    echo $co2_emission;
    echo "\n";
    echo "\n";
    echo "\n";
  }


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
//echo $parsed;
/* 

129.500 km
06/2010
92 kW (125 PS)
Gebraucht
2 Fahrzeughalter
Schaltgetriebe
Benzin
5,8 l/100 km (komb.)
134 g/km (komb.)
41.145 km
10/2008
309 kW (420 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
13,6 l/100 km (komb.)
325 g/km (komb.)
44.900 km
03/2017
170 kW (231 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel


81.140 km
06/2018
250 kW (340 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
7,2 l/100 km (komb.)
171 g/km (komb.)
72.300 km
05/2017
445 kW (605 PS)
Gebraucht
2 Fahrzeughalter
Automatik
Benzin
9,6 l/100 km (komb.)
223 g/km (komb.)
33.000 km
01/2020
210 kW (286 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
6,6 l/100 km (komb.)
174 g/km (komb.)
13.900 km
06/2021
251 kW (341 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
7,1 l/100 km (komb.)
221 g/km (komb.)
43.343 km
11/2018
320 kW (435 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
7,2 l/100 km (komb.)
189 g/km (komb.)
1.050 km
02/2022
588 kW (799 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
11,6 l/100 km (komb.)
265 g/km (komb.)
18.200 km
11/2019
320 kW (435 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
7,8 l/100 km (komb.)
241 g/km (komb.)
8.000 km
07/2021
251 kW (341 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
7 l/100 km (komb.)
185 g/km (komb.)
6.000 km
12/2021
294 kW (400 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
9 l/100 km (komb.)
204 g/km (komb.)
8.630 km
02/2020
419 kW (570 PS)
Gebraucht
2 Fahrzeughalter
Automatik
Benzin

293 g/km (komb.)
12.900 km
04/2021
588 kW (799 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
11,6 l/100 km (komb.)
265 g/km (komb.)
26.700 km
03/2021
210 kW (286 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
5,9 l/100 km (komb.)
157 g/km (komb.)
23.385 km
09/2020
441 kW (600 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
11,6 l/100 km (komb.)
275 g/km (komb.)
9.500 km
07/2021
180 kW (245 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
7,7 l/100 km (komb.)
175 g/km (komb.)
39.646 km
06/2019
210 kW (286 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Diesel
6,6 l/100 km (komb.)
172 g/km (komb.)
3.450 km
09/2020
225 kW (306 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
7,2 l/100 km (komb.)
171 g/km (komb.)
9.999 km
01/2021
220 kW (299 PS)
Gebraucht
2 Fahrzeughalter
Automatik



14.600 km
03/2019
456 kW (620 PS)
Gebraucht
1 Fahrzeughalter
Automatik
Benzin
13,1 l/100 km (komb.)
297 g/km (komb.)
 */