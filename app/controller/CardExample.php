<?php defined('MAPLE') || exit('此檔案不允許讀取！');

class CardExample extends Controller {
  public function __construct() {
    Load::sysLib('Asset.php');
    Load::sysLib('Validator.php');
  }

  public function insert() {
    $params = Input::get();

    validator(function() use (&$params, &$obj) {
      Validator::need($params, 'id', 'ID')->isVarchar(190);
      Validator::need($params, 'model', 'Model')->isVarchar(190);

      $params['model'] = urldecode($params['model']);
      if (!$obj = $params['model']::one('id = ?', $params['id']))
        error('找不到此卡片資料');

      $params['model'] .= 'Example';
    });

    $asset = Asset::create()
                  ->addCSS('/asset/css/site/CardExample/insert.css')
                  ->addJS('/asset/js/res/jquery-1.10.2.min.js')
                  ->addJS('/asset/js/site/CardExample/insert.js');

    return View::create('site/CardExample/insert.php')
                ->with('asset', $asset)
                ->with('params', $params)
                ->with('title', $obj->en);
  }

  public function create() {
    $params = Input::post();

    validator(function() use (&$params, &$obj) {
      Validator::need($params, 'id', 'ID')->isVarchar(190);
      Validator::need($params, 'model', 'Model')->isVarchar(190);
      Validator::need($params, 'en', '英文')->isText();
      Validator::need($params, 'ch', '中文')->isText();
    });

    transaction(function() use ($params, $obj) {
      if ($params['model'] = 'M\WordExample')
        $params['wordId'] = $params['id'];
      elseif ($params['model'] = 'M\PhraseExample')
        $params['phraseId'] = $params['id'];
      else 
        return false;

      return $params['model']::create($params);
    });

    return ['msg' => '新增成功！'];
  }
}
