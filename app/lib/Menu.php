<?php

use OA\Line\Message;

Load::lib('OALine/Line.php');

class Menu {
  public static function existsCard($obj) {
    return Message::text()->text('已經輸入過摟！');
  }
}