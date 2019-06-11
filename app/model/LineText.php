<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

class LineText extends Model {
  // static $hasOne = [];

  // static $hasMany = [];

  // static $belongToOne = [];

  // static $belongToMany = [];

  // static $uploaders = [];

  const SYSTEM_TEXT = [
    '訊息已成功寄出！請稍候客服會盡快回覆您：）',
    '已點擊「',
  ];

  public function checkSysTxt() {
    foreach (self::SYSTEM_TEXT as $txt) {
      if (strstr($this->text, $txt)) 
        return true;
    }
    return false;
  }
}
