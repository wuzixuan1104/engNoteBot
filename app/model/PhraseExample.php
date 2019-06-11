<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

class PhraseExample extends Model {
  // static $hasOne = [];

  // static $hasMany = [];

  static $belongToOne = [
    'phrase' => 'Phrase'
  ];

  // static $belongToMany = [];

  // static $uploaders = [];
}
