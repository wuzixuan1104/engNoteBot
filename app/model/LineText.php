<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

use \OA\Line\Message;

\Load::lib('Menu.php');
\Load::lib('OALine/Line.php');

class LineText extends Model {
  // static $hasOne = [];

  // static $hasMany = [];

  // static $belongToOne = [];

  // static $belongToMany = [];

  // static $uploaders = [];

  const MATCH_TYPE = ['w', 'p', 's'];
  const SYSTEM_TEXT = [
    '已點擊「',
  ];

  public function checkSysTxt() {
    foreach (self::SYSTEM_TEXT as $txt) {
      if (strstr($this->text, $txt)) 
        return true;
    }
    return false;
  }

  public function checkType($match) {
    if (!(in_array($match[1], self::MATCH_TYPE) && $match[2]))
      return false;

    $params = [
      'en' => $match[2],
      'ch' => $match[3],
    ];
    
    switch($match[1]) {
      case 'w':
        if ($obj = \M\Word::one('en = ?', $match[2])) {
          if ($obj->ch != $match[3] && ($obj->ch = $match[3]))
            $obj->save();
        } elseif (!$obj = \M\Word::create($params)) {
          return false;
        }

        break;
      case 'p':
        if ($obj = \M\Phrase::one('en = ?', $match[2])) {
          if ($obj->ch != $match[3] && ($obj->ch = $match[3]))
            $obj->save();
        } elseif (!$obj = \M\Phrase::create($params)) {
          return false;
        }
        break;
      case 's':
        if ($obj = \M\Sentence::one('en = ?', $match[2])) {
          if ($obj->ch != $match[3] && ($obj->ch = $match[3]))
            $obj->save();
        } elseif (!$obj = \M\Sentence::create($params)) {
          return false;
        }
        break;
    }

    return \Menu::existsCard($obj);
  }
}
