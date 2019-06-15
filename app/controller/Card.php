<?php defined('MAPLE') || exit('此檔案不允許讀取！');

class Card extends Controller {
  public function __construct() {
    Load::sysLib('Asset.php');
  }

  public function edit() {
    $asset = Asset::create()
                  ->addCSS('/asset/css/site/Card/edit.css')
                  ->addJS('/asset/js/res/jquery-1.10.2.min.js');

    return View::create('site/Card/edit.php')
                ->with('asset', $asset);
  }
}
