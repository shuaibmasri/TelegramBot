<?php
ob_start();
$API_KEY = "1185867077:AAGFLbqkRKxh2r_epawkk0F_lxSqv9BNqqs";
$botAPI = "https://api.telegram.org/bot" . $API_KEY;
 
 define('API_KEY',$API_KEY);                                                                                                  
echo "https://api.telegram.org/bot".API_KEY."/setwebhook?url=https://".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];   
function bot($method,$datas=[]){                                                                                             
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;                                                               
    $datas = http_build_query($datas);                                                                                       
    $res = file_get_contents($url.'?'.$datas);                                                                               
    return json_decode($res); }                                                                                              
$update = json_decode(file_get_contents('php://input'));                                                                                            
//$update = file_get_contents('php://input');
//$update = json_decode($update, TRUE);
                        
$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";

$messageText = isset($message['text']) ? $message['text'] : "";
$messageText = trim($messageText);
$messageText = strtolower($messageText);
                        
$date = isset($message['date']) ? $message['date'] : "";
                        
$chatId = 163958175; //isset($message['chat']['id']) ? $message['chat']['id'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
                
switch ($messageText) {
    case"/start":
        sendMessage($chatId,"Hi $userName");
        break;
    case"/hello":
        sendMessage($chatId,"Hello $firstName");
        break;
    default:
        sendMessage($chatId,"Oh, I am Sorry!");
        break;
}

function sendMessage($chatId,$message)
{
   $url = $GLOBALS[botAPI] . '/sendMessage?chat_id=' . $chatId . '&text=' . urlencode($message);
file_get_contents($url);
}

?>
