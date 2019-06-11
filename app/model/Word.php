<?php

namespace M;

defined('MAPLE') || exit('此檔案不允許讀取！');

class Word extends Model {
  // static $hasOne = [];

  static $hasMany = [
    'examples' => 'WordExample'
  ];

  // static $belongToOne = [];

  // static $belongToMany = [];

  // static $uploaders = [];
}
