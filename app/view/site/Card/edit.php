<!DOCTYPE html>
<html lang="tw">
<head>
  <meta http-equiv="Content-Language" content="zh-tw">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <title>編輯卡片</title>
  <?php echo $asset->renderCSS(); ?>
  <?php echo $asset->renderJS(); ?>
</head>
<body>
  <form class="login_form">
    <div class="content en" contenteditable="true" placeholder="請輸入英文"></div>
    <div class="content ch" contenteditable="true" placeholder="請輸入中文"></div>
    
    <input id="send" type="button" value="送出">
    <input id="sid" type="hidden" name="sid" value="">
  </form>

  <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
  <script src="https://crm-bot-test.tripresso.com.tw/asset/js/site/Liff/index.js?v=11" language="javascript" type="text/javascript" ></script>
  <!-- <script src="http://dev.crm.bot/asset/js/site/Liff/index.js" language="javascript" type="text/javascript" ></script> -->
</body>
</html>