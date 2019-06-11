<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

class WordExample extends Model {
  // static $hasOne = [];

  // static $hasMany = [];

  static $belongToOne = [
    'word' => 'Word'
  ];

  // static $belongToMany = [];

  // static $uploaders = [];
}
