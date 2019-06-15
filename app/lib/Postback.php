<?php  defined('MAPLE') || exit('此檔案不允許讀取！');

use OA\Line\Message as Msg;

Load::lib('OALine/Line.php');

class Postback {
  public static function cardDelete($model, $id) {
    if (!$obj = $model::one('id = ?', $id))
      return Msg::text()->text('找不到此卡片！');

    return $obj->delete() ? Msg::text()->text('刪除成功！') : Msg::text()->text('刪除失敗！');
  }

  public static function cardExample($model, $id) {

  }
}