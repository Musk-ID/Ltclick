<?php
date_default_timezone_set('Asia/Jakarta');
/*
creator by kingtebe
this is file bot ltclick.com
follow my github https://github.com/Musk-ID
and support for me https://t.me/Captain_bulls
*/
function curl($link,$options=[]){
   $list = [
     CURLOPT_URL            => $link,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_HTTPHEADER     => [
         "Host:ltclick.com",
         "accept-language:id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
         "accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng;q=0.8,application/signed-exchange;v=b3;q=0.9",
         "user-agent:Mozilla/5.0 (Linux; Android 8.1.0; CPH1853) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Mobile Safari/537.36",
         "cookie:".file_get_contents(".cookie")
     ]
   ];
   foreach($options as $key => $value){
     $list[$key] = $value;
   }
   $ch = curl_init();
   curl_setopt_array($ch, $list);
   $response = curl_exec($ch);
   curl_close($ch);
   return $response;
}
function col($str){
   $color = "\033[0;".$str."m";
   return $color;
}
function get_user($url){
   $dash = curl($url);
   if(preg_match('~value\="(\S+)"~',$dash,$user)){
     preg_match_all('~<h2\sclass\="text-white">([^>]+)</h2>~',$dash,$bal);
     return array(trim($user[1],"https://ltclick.com?r="),$bal[1][1]);
   }else{
     unlink(".cookie");
     exit(col(92)."! ".col(97)."Cookie has expired !\n");
   }
}
function get_mainbot(){
   if(file_exists(".cookie")){
     $exist = file_get_contents(".cookie");
   }else{
     system('clear');echo col(92)."\n+ ".col(97)."Script bot ltclick.com".col(92)."\n+ ".col(97)."Timestamp ".col(97).": ".col(97).date("H:i:s").col(90)." | ".col(97).date("Y-m-d").col(92)."\n+".col(97)." Creator by Kingtebe ".col(90)."|".col(97)." https://t.me/Captain_bulls\n\n".col(97)."".col(92)."•".col(97)." Input cookie from ltclick.com\n";
     $kukiw = readline(col(97)."".col(92)."•".col(97)." Cookie : ");
     file_put_contents(".cookie",$kukiw);}
   $masuk = get_user("https://ltclick.com/dashboard.php");system("clear");echo col(92)."\n+ ".col(97)."Script bot ltclick.com".col(92)."\n+ ".col(97)."Timestamp ".col(97).": ".col(97).date("H.i.s").col(90)." | ".col(97).date("Y-m-d").col(92)."\n+".col(97)." Creator by Kingtebe ".col(90)."|".col(97)." https://t.me/Captain_bulls\n\n";echo col(92)."• ".col(97)."Username : ".$masuk[0].col(92)."\n• ".col(97)."Balance  : ".$masuk[1]."\n\n";
   echo col(92)."+ ".col(97)."Faucet claim is runing...\n";
   sleep(2);
   while(true){
      $url = curl("https://ltclick.com/inc/faucet.php");
      if(preg_match('/done/',$url)){
         $earn = get_user("https://ltclick.com/dashboard.php");
         echo col(97)."[".col(92).date('H:i:s').col(97)."] Faucet claim succsess balance now ".col(90)."- ".col(97).$earn[1]."\n";
         $time = time()+60*5;
         while(true):
            echo "\r							\r";
            $ses = $time-time();
            if($ses < 1){ break; }
            echo col(97)."Countdown ⟨".col(92).date('00:i:s',$ses).col(97)."⟩ ";
            sleep(1);
            endwhile;
      }else{
         exit(col(97)."[".col(92).date('H:i:s').col(97)."] Faucet claim failed try again later\n\n");
      }
   }
}

get_mainbot();
?>

