<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

class Phrase extends Model {
  // static $hasOne = [];

  static $hasMany = [
    'examples' => 'PhraseExample'
  ];

  // static $belongToOne = [];

  // static $belongToMany = [];

  // static $uploaders = [];
}
