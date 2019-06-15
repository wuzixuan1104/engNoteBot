<?php defined('MAPLE') || exit('此檔案不允許讀取！');

use OA\Line\Message as Msg;

Load::lib('OALine/Line.php');

class Menu {
  public static function existsCard($obj) {
    $content = [
      Msg\FlexText::create('Ennote 學英文')->setWeight('bold')->setColor('#47b0f5')->setSize('xs'),
      Msg\FlexText::create($obj->en)->setWeight('bold')->setSize('md')->setWrap(true)->setMargin('lg'),
      Msg\FlexText::create($obj->ch ? $obj->ch : '尚未輸入中文翻譯...')->setColor('#737373')->setSize('sm')->setWrap(true)->setMargin('lg'),
      Msg\FlexText::create($obj->updateAt->format('Y-m-d H:i:s'))->setColor('#cecece')->setSize('xxs')->setMargin('lg')->setAlign('end'),
      Msg\FlexSeparator::create()->setMargin('sm'),

      Msg\FlexBox::create([
        Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#d6d6d6')->setAction(Msg\FlexAction::postback('刪除', ['cardDelete', get_class($obj), $obj->id], '已點擊「 刪除 」')),
        Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#e45a5a')->setAction(Msg\FlexAction::uri('編輯', 'line://app/1585633080-5bbyNbWM?id=' . $obj->id . '&model=' . urlencode(get_class($obj)))),
      ])->setLayout('horizontal')->setMargin('lg')->setSpacing('lg'),
    ];

    if (get_class($obj) != 'M\Sentence')
      array_push($content, Msg\FlexBox::create([
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#9c9c9c')->setAction(Msg\FlexAction::uri('舉例子', 'line://app/1585633080-5bbyNbWM?id=' . $obj->id . '&model=' . urlencode(get_class($obj)))),
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#6ca2c1')->setAction(Msg\FlexAction::postback('看例子', ['cardExample', get_class($obj), $obj->id], '已點擊「 看例子 」')),
        ])->setLayout('horizontal')->setMargin('lg')->setSpacing('lg')
      );

    return Msg::flex()->altText('學習卡片')->template( Msg\FlexTemplate::bubble([
      'body' => Msg\FlexBox::create($content)->setLayout('vertical')])
    );
  }
}