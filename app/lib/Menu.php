<?php

use OA\Line\Message as Msg;

Load::lib('OALine/Line.php');

class Menu {
  public static function existsCard($obj) {

    return Msg::flex()->altText('學習卡片')->template( Msg\FlexTemplate::bubble([
      'body' => Msg\FlexBox::create([
        Msg\FlexText::create('Ennote 學英文')->setWeight('bold')->setColor('#47b0f5')->setSize('xs'),

        Msg\FlexText::create('This is a book')->setWeight('bold')->setSize('md')->setWrap(true)->setMargin('lg'),

        Msg\FlexText::create('這是一本書')->setColor('#737373')->setSize('sm')->setWrap(true)->setMargin('lg'),
        
        Msg\FlexText::create('2019-04-10 11:23:11')->setColor('#cecece')->setSize('xxs')->setMargin('lg')->setAlign('end'),
        
        Msg\FlexSeparator::create()->setMargin('sm'),

        Msg\FlexBox::create([
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#d6d6d6')->setAction(Msg\FlexAction::postback('刪除', ['cardDelete', 'w', 0], '已點擊「 刪除 」')),
          Msg\FlexButton::create('primary')->setHeight('sm')->setColor('#e45a5a')->setAction(Msg\FlexAction::postback('編輯', ['cardEdit', 'w', 0], '已點擊「 編輯 」')),
        ])->setLayout('horizontal')->setMargin('lg')->setSpacing('lg'),

      ])->setLayout('vertical')])
    );
  }
}