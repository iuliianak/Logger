<?php ini_set('display_errors', E_ALL);error_reporting(E_ALL);
include ("vendor/autoload.php");
$filename='logs/log.txt';
if(file_exists($filename)){unlink($filename);}
$webSite=new \Yulia\Logger\SiteChecker();
$logger= new \Yulia\Logger\Logger();

$arrSite=$webSite->getArrWebsitesFromList('inc/Websiteslist.txt');
foreach($arrSite as $site){
    $webSite->setSite($site);
$message=$webSite->websiteCheck($site)."<br>";
$key=array_search($message,$logger->getArrayAnswer());
if($key!=false){
        $logger->$key($message,['level'=>$key,'url'=>$site,'filename'=>$filename]);
    } else{
    $logger->emergency($message,['level'=>'emergency','url'=>$site,'filename'=>$filename]);
}

}