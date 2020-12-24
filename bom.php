<?php
error_reporting(0);
function curl($url,$data_post=0,$header=array(),$proxy=0){
 $ch = curl_init($url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1  ); 
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1  );
 curl_setopt($ch, CURLOPT_TIMEOUT,30         );
 curl_setopt($ch, CURLOPT_VERBOSE, 0         );
if($header){
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);}
if($data_post){ // POST METHOD
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data_post);}
if($proxy){ // settings proxy
 curl_setopt($ch, CURLOPT_PROXY, $proxy); }
 $result = curl_exec($ch);
 $info   = curl_getinfo($ch);
 curl_close($ch);
 if($info["http_code"]==302){
 return $info["redirect_url"]; } else { return $result;}}
 function ua(){
   $ua[]="Host: sharingilmu.my.id";
   $ua[]="content-type: application/x-www-form-urlencoded";
   $ua[]="save-data: on";
   $ua[]="user-agent: Mozilla/5.0 (Linux; Android 7.1.2; Redmi 5A Build/N2G47H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.158 Mobile Safari/537.36";
   $ua[]="accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
   $ua[]="referer: https://sharingilmu.my.id/spam-wa.php";
   $ua[]="cookie: PHPSESSID=05e09ebce3d3339a7ae54a3d59a1bf95";
   return $ua;
 }
function wa($no,$jml){
  $url="https://sharingilmu.my.id/spam-wa.php";
  $data="nomer=$no&jumlah=$jml&gass=";
  return curl($url,$data,ua());
  }
system("clear");
print "\t\e[1;32m===================\e[0m\n";
print "         \t\e[1;35mSPAM WA\e[0m     \n";
print "        \t\e[1;36mBy KAKATOJI\e[0m   \n";
print "\t\e[1;32m===================\e[0m\n";
print "\t\e[1;32m===================\n";
$no=readline("\e[1;37m[>]No Wa: ");
$jml=readline("\e[1;37m[>]Jumlah spam: ");
echo "\e[0m";
$x=0;
while($x < $jml){
  $bom= wa($no,$jml);
  preg_match('#<div class="alert alert-success" role="alert">(.*?)</div>#is',$bom,$hasil);
  echo "[>] no : \e[1;35m".substr_replace($no,"*****",4,-3)."\e[0m\e[1;31m || \e[1;36m".$hasil[1]."\e[0m\n";
}
 
