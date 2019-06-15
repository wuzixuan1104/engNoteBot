<?php defined('MAPLE') || exit('此檔案不允許讀取！');

class Card extends Controller {
  public function __construct() {
    Load::sysLib('Asset.php');
    Load::sysLib('Validator.php');
  }

  public function edit() {
    $params = Input::get();

    // $params['model'] = 'M\Word';
    // $params['en'] = '12323';
    // $params['ch'] = '5';
    

    validator(function() use (&$params) {
      Validator::need($params, 'id', 'ID')->isVarchar(190);
      Validator::need($params, 'model', 'Model')->isVarchar(190);
      Validator::need($params, 'en', '英文')->isText();
      Validator::need($params, 'ch', '中文')->isText();

      $params['en'] = urldecode($params['en']);
      $params['ch'] = urldecode($params['ch']);
      $params['model'] = urldecode($params['model']);
    });

    $asset = Asset::create()
                  ->addCSS('/asset/css/site/Card/edit.css')
                  ->addJS('/asset/js/res/jquery-1.10.2.min.js')
                  ->addJS('/asset/js/site/Card/edit.js');

    return View::create('site/Card/edit.php')
                ->with('asset', $asset)
                ->with('params', $params);
  }

  public function update() {
    $params = Input::post();

    validator(function() use (&$params, &$obj) {
      Validator::need($params, 'id', 'ID')->isVarchar(190);
      Validator::need($params, 'model', 'Model')->isVarchar(190);
      Validator::need($params, 'en', '英文')->isText();
      Validator::need($params, 'ch', '中文')->isText();

      if (!$obj = $params['model']::one('id = ?', $params['id']))
        error('找不到此卡片資料');
    });

    transaction(function() use ($params, $obj) {
      $obj->en = $params['en'];
      $obj->ch = $params['ch'];
      return $obj->save();
    });

    return ['msg' => '更新成功！'];
  }
}
