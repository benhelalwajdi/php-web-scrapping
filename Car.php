<?php
/**Title
2. Main image (& extra images)
3. Price
4. Fuel Type (Gasoline, Diesel..)
5. Mileage
6. Registration date
7. Power (HP & KW)
8. Body type (Sedan, Kombi..)
9. Exterior color
10.Emission (CO2)
11.Transmission
12.Equipment
13.External ID */



class Car {
    public $title ;
    public $image ;
    public $price ;
    public $fuel ;
    public $mileage ;
    public $registerDate ;
    public $power ;
    public $body ;
    public $color ;
    public $transmission ;
    public $equipement ;
    public $externalID ;
    public $emission;
    function  __construct(
            $title, $image, $price, $fuel, $mileage, $registerDate, 
            $power, $body, $color, $emissions, $transmission, $equipement, $externalID){
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
        $this->fuel = $fuel;
        $this->mileage = $mileage;
        $this->registerData = $registerDate; 
        $this->power = $power;
        $this->body = $body;
        $this->color = $color ;
        $this->emission = $emissions;
        $this->transmission = $transmission;
        $this->equipement = $equipement ;
        $this->externalID = $externalID;
    }


    function toString(){
        echo $this->emission;
        return(
            "\n".
            "Title : ".$this->title." \n".
            "Image : ".$this->image." \n".
            "Price : ".$this->price." \n".
            "Fuel  : ".$this->fuel." \n".
            "Mileage : ".$this->mileage." \n".
            "Register Date : ".$this->registerDate." \n".
            "Power : ".$this->power." \n".
            "Body : ".$this->body." \n".
            "Color : ".$this->color." \n".
            "Emission : ".$this->emission ." \n".
            "Transmission : ".$this->transmission." \n".
            "Equipement : ".$this->equipement." \n".
            "ExternalID : ".$this->externalID." \n"
        );
        
        /*return 'Titre : '$title+'\n'
                +'Image : '+$image+'\n'
                +'Price : '+$price+'\n'
                +'Fuel : '+$fuel+'\n'
                +'Mileage : '+$mileage+'\n'
                +'Register Date : '+$registerDate+'\n' 
                +'Power : '+$power+'\n'
                +'Body : '+$body+'\n'
                +'Color : '+$color+'\n'
                +'Emission : '+$emission+'\n'
                +'Transmission : '+$transmission+'\n'
                +'Equipement : '+$equipement+'\n'
                +'ExternalID : '+ $externalID+'\n';*/
    }

}