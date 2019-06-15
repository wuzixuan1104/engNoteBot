<!DOCTYPE html>
<html lang="tw">
<head>
  <meta http-equiv="Content-Language" content="zh-tw">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">

  <title>新增例子</title>
  <?php echo $asset->renderCSS(); ?>
  <?php echo $asset->renderJS(); ?>
</head>
<body>
  <h1><?php echo $title; ?></h1>
  <form class="login_form">
    <div class="content en" contenteditable="true" placeholder="請輸入英文" required></div>
    <div class="content ch" contenteditable="true" placeholder="請輸入中文"></div>
    
    <input type="hidden" name="id" value="<?php echo $params['id']; ?>">
    <input type="hidden" name="model" value="<?php echo $params['model']; ?>">
  
    <input id="send" type="button" value="送出">
  </form>

  <script src="https://d.line-scdn.net/liff/1.0/sdk.js"></script>
</body>
</html>