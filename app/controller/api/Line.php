<?php defined('MAPLE') || exit('此檔案不允許讀取！');

use \OA\Line\Event as Event;
use \OA\Line\Curl as Curl;
use \OA\Line\Message as Message;

Load::lib('OALine/Line.php');
Load::lib('line/Menu.php');

class Line extends ApiController {

  public function index() {
    foreach (Event::all() as $event) {
      Log::info($event);
      if (!$source = \M\LineSource::oneByEvent($event))
        continue;
      
      $speaker = \M\LineSource::speakerByEvent($event);
      if (!$logModel = $source->getLogModelByEvent($speaker, $event))
        continue;

      $logClass = get_class($logModel);

      switch ($logClass) {
        case 'M\LineText':
          if ($isSys = $logModel->checkSysTxt())
            continue;

          break;

        case 'M\LinePostback':
          Load::lib('line/Postback.php');

          $params = $logModel->data();
          $method = array_shift($params);

          if (!($method && method_exists('Postback', $method))) {
            Message::text()->text('工程師還沒有設定相對應的功能！')->replyTo($logModel->replyToken);
            continue;
          }

          if ($msg = call_user_func_array(['Postback', $method], $params)) 
            if ($msg instanceof Message) {
              $msg->replyTo($logModel->replyToken);
            } 
          break;
      }
    }
    
    return true;
  }
}
