<?php


require 'vendor/autoload.php';
require_once("./Car.php");
use Symfony\Component\DomCrawler\Crawler;
use Curl\Curl;

class Service{
    
function data(){
    $url = "https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C";
            https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=2&search_id=1w3kslmx4hz
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=1&search_id=1w3kslmx4hz
    $html = file_get_contents($url);
    $crawler = new Crawler($html);
    try{
        $mileage ="";
        $cars = array(" ");
        $firstPost = $crawler->filter('article.cldt-summary-full-item div.css-hffhkd div.css-41pfci div.css-1xom8dl');
        return $firstPost ;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
}