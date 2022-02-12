<?php


require 'vendor/autoload.php';
require_once("./Car.php");
require_once "config.php";
use Symfony\Component\DomCrawler\Crawler;
use Curl\Curl;

class Service{

function data_autoscout24(){
    $url = "https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C";
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=2&search_id=1w3kslmx4hz
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=1&search_id=1w3kslmx4hz
    $html = file_get_contents($url);
    $cars=array();
    $crawler = new Crawler($html);
    try{
        $item = $crawler->filter('article.cldt-summary-full-item div.css-hffhkd div.css-vunk1i div.css-zjik7 div.css-12xvwdv a');
        $post = $crawler->filter('article.cldt-summary-full-item div.css-hffhkd div.css-41pfci div.css-1xom8dl');
        $price = $crawler -> filter('article.cldt-summary-full-item div.css-hffhkd div.css-41pfci div.css-1hknfnj');

        $item = $item->each(function(Crawler $span, $index){
                return $span->html();
             });      
        $arrlength=count($item);

        $B = $post->each(function(Crawler $span, $index){
            return $span -> html();
        });
        $arrlength=count($B);
        for($y=0;$y<$arrlength;$y++)
        {
            $mileage = get_string_between($B[$y], '<span type="mileage" class="css-mo69i0 e1hcrnma1">', '<');
            $registration_date = get_string_between($B[$y], '<span type="registration-date" class="css-mo69i0 e1hcrnma1">', '<');
            $power = get_string_between($B[$y], '<span type="power" class="css-mo69i0 e1hcrnma1">', '<');
            $offer_type = get_string_between($B[$y], '<span type="offer-type" class="css-mo69i0 e1hcrnma1">', '<');
            $previous_owners = get_string_between($B[$y], '<span type="previous-owners" class="css-mo69i0 e1hcrnma1">', '<');
            $transmission_type = get_string_between($B[$y], '<span type="transmission-type" class="css-mo69i0 e1hcrnma1">', '<');
            $fuel_category = get_string_between($B[$y], '<span type="fuel-category" class="css-cvkptj e1hcrnma1">', '<');
            $fuel_consumption = get_string_between($B[$y], '<span type="fuel-consumption" class="css-cvkptj e1hcrnma1">', '<');
            $co2_emission = get_string_between($B[$y], '<span type="co2-emission" class="css-cvkptj e1hcrnma1">', '<');
        
            for($x=0;$x<$arrlength;$x++)
            {
                $title =get_string_between($item[$x],'elv7w5p24">','<!');
                $title = $title.' '.get_string_between($item[$x],'<!-- --> <!-- -->','</h2>');
                $title = $title.' '.get_string_between($item[$x],'<span> <!-- -->','</span>');
            
                $prices = $price->each(function(Crawler $span, $index){
                    return $span -> filter('div')->html();
                });    
                $arrlength=count($prices);
               
                //echo $prices[0];
                for($w=0;$w<$arrlength;$w++)
                {
                    $pr = get_string_between($prices[$w], '<div><div class="css-s5xdrg"><span class="css-113e8xo">', ',-<');
                    //echo $pr;
                }
            }
            
            if(($co2_emission != '')){
                if((int)(substr($registration_date,3)) >=2012){
                    $car = new Car(
                    $title,
                    'null',
                    $pr,
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
                }
            }   
        //    var_dump($title);
        }
     
        $servername = "localhost";
        $username = "root";
        $password = "metro321";
        $dbname = "remonvs_benhelalwajdi";
       
        for($y=0;$y< count($cars);$y++){
       /*
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO Cars (title)
          VALUES (:title)";
 
            if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":title", "jhon");
            
            // use exec() because no results are returned
          $conn->exec($sql);
          echo "New record created successfully";}
        } catch(PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
        }
        */
        
            var_dump($cars[$y]->toString()."\n");
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}
}