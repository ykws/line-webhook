<?php 

$jsonString = file_get_contents('php://input');
error_log($jsonString);

$jsonObject = json_decode($jsonString);

foreach ($jsonObject->$events as $event) {
  if ($event->type === 'message' && $event->message->type === 'text') {
    $requestBody = array(
      'replyToken' => $event->replyToken,
      'messages'   => array(
        array(
          'type' => 'text',
          'text' => $event->message->text
        )
      )
    )
    
    $curl = curl_init('https://api.line.me/v2/bot/message/reply');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($requestBody));
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json; charser=UTF-8',
      'Authorization: Bearer ' . getenv('CHANNEL_ACCESS_TOKEN')
    ));
    curl_exec($curl);
    
    if (curl_errono($curl)) error_log(curl_error($curl));
    
    curl_close($curl);
  }
}
