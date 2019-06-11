<?php defined('MAPLE') || exit('此檔案不允許讀取！');

return [
  'up' => "CREATE TABLE `Sentence` (
    `id`        int(11) unsigned NOT NULL AUTO_INCREMENT,
    `en`        text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '英文',
    `ch`        text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中文',
    `updateAt`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新時間',
    `createAt`  datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '新增時間',
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;",

  'down' => "DROP TABLE IF EXISTS `Sentence`;",

  'at' => "2019-06-11 21:38:35"
];
