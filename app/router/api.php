<?php defined('MAPLE') || exit('此檔案不允許讀取！');

Router::dir('api', function() {
  Router::post('line')->controller('Line@index');
  Router::get('line')->controller('Line@index');
});