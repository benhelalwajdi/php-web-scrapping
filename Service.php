<?php


require 'vendor/autoload.php';
require_once("./Car.php");
use Symfony\Component\DomCrawler\Crawler;
use Curl\Curl;

class Service{
    
function data(){
    $url = "https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C";
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=2&search_id=1w3kslmx4hz
    //https://www.autoscout24.de/lst/audi?sort=standard&desc=0&ustate=N%2CU&cy=D&atype=C&page=1&search_id=1w3kslmx4hz
    $html = file_get_contents($url);
    $crawler = new Crawler($html);
    try{
        $item = $crawler->filter('article.cldt-summary-full-item div.css-hffhkd div.css-vunk1i div.css-zjik7 div.css-12xvwdv');
        $post = $crawler->filter('article.cldt-summary-full-item div.css-hffhkd div.css-41pfci div.css-1xom8dl');
        
        $item = $item->each(function(Crawler $span, $index){
                return $span-> filter('a')->html();
                 //return $span->html();
             });
        $arrlength=count($item);
        for($x=0;$x<$arrlength;$x++)
        {
            $title =get_string_between($item[$x],'elv7w5p24">','<!');
            $title = $title.' '.get_string_between($item[$x],'<!-- --> <!-- -->','</h2>');
            $title = $title.' '.get_string_between($item[$x],'<span> <!-- -->','</span>');
            var_dump($title);
        }
        //todo 
       
        //return $item /*.' '.$post*/ ;
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
