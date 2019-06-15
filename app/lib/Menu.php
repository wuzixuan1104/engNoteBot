<?php defined('MAPLE') || exit('此檔案不允許讀取！');

use OA\Line\Message as Msg;

Load::lib('OALine/Line.php');

class Menu {
  public static function existsCard($obj) {
    return Msg::flex()->altText('學習卡片')->template( Msg\FlexTemplate::bubble([
      'body' => Msg\FlexBox::create([
        Msg\FlexText::create('Ennote 學英文')->setWeight('bold')->setColor('#47b0f5')->setSize('xs'),
        Msg\FlexText::create($obj->en)->setWeight('bold')->setSize('md')->setWrap(true)->setMargin('lg'),
        Msg\FlexText::create($obj->ch ? $obj->ch : '尚未輸入中文翻譯...')->setColor('#737373')->setSize('sm')->setWrap(true)->setMargin('lg'),
        Msg\FlexText::create($obj->updateAt->format('Y-m-d H:i:s'))->setColor('#cecece')->setSize('xxs')->setMargin('lg')->setAlign('end'),
        Msg\FlexSeparator::create()->setMargin('sm'),

        Msg\FlexBox::create([
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#d6d6d6')->setAction(Msg\FlexAction::postback('刪除', ['cardDelete', get_class($obj), $obj->id], '已點擊「 刪除 」')),
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#e45a5a')->setAction(Msg\FlexAction::uri('編輯', 'line://app/1585633080-5bbyNbWM?test=123&t=234')),
        ])->setLayout('horizontal')->setMargin('lg')->setSpacing('lg'),

      ])->setLayout('vertical')])
    );
  }
}