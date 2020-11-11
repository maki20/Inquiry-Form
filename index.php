<?php 
  var_dump($_POST);  

  $page_flag = 0;

  //確認画面を表示する条件
  //氏名、メールアドレスの両方が入力されている場合及び、btn_confirmが空では無い場合、確認画面に進む。
  //if ( !empty($_POST['your_name']) && !empty($_POST['email']) && !empty($_POST['btn_confirm'])){
    
  //}


  //氏名、メールアドレスのいずれか、或いは両方が空である場合、メッセージを表示。


  $errors = [];
 
  if (!empty($_POST)) {
    if (empty($_POST['your_name'])) {
      $errors[] = '名前を入力してください。';
    }
    if (empty($_POST['email'])) {
      $errors[] = 'メールアドレスを入力してください。';
    }
    if (empty($_POST['content'])) {
      $errors[] = 'メールアドレスを入力してください。';
    }

  }

  var_dump($errors);


  if ((count($errors) == 0) && !empty($_POST['btn_confirm'])){
    $page_flag = 1;
  } elseif ( !empty($_POST['btn_submit'])){
    $page_flag= 2;
  }

?>  




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせフォーム</title>
  <style rel="stylsheet" type="text/css">
  body {
	padding: 20px;
	text-align: center;
}

h1 {
	margin-bottom: 20px;
	padding: 20px 0;
	color: #209eff;
	font-size: 122%;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
}

.error-box > li{
  list-style: none;
  color:red;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

input[name=btn_confirm],
input[name=btn_submit],
input[name=btn_back] {
	margin-top: 10px;
	padding: 5px 20px;
	font-size: 100%;
	color: #fff;
	cursor: pointer;
	border: none;
	border-radius: 3px;
	box-shadow: 0 3px 0 #2887d1;
	background: #4eaaf1;
}

input[name=btn_back] {
	margin-right: 20px;
	box-shadow: 0 3px 0 #777;
	background: #999;
}

.element_wrap {
	margin-bottom: 10px;
	padding: 10px 0;
	border-bottom: 1px solid #ccc;
	text-align: center;
}

label {
	display: inline-block;
	margin-bottom: 10px;
	font-weight: bold;
	width: 150px;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: left;
}
</style>
</head>
<body>
<h1>お問い合わせフォーム</h1>

<?php if(!empty($errors)): ?> 
    <ul class="error-box">
    <?php foreach($errors as $error): ?> 
      <li><?php echo $error; ?></li>
    <?php endforeach ?> 
    </ul>
  <?php endif ?>


<?php if( $page_flag === 1): ?>



<form method="post" action="">
  <div class="element_wrap">
    <label>氏名</label>
    <p><?php echo $_POST['your_name']; ?></p>
  </div>
  <div class="element_wrap">
    <label>メールアドレス</label>
    <p><?php echo $_POST['email']; ?></p>
  </div> 
  <input type="submit" name="btn_back" value="戻る">
  <input type="submit" name="btn_submit" value="送信">
  <input type="hidden" name="your_name" value="<?php echo $_POST['your_name']; ?>">
  <input type="hidden" name="email" value="<?php echo $_POST['email'];?>">
</form>



<?php elseif( $page_flag === 2): ?>
  <p> 送信が完了しました。 </p>  

<?php else: ?>  

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="element_wrap">
		<label>氏名</label>
    <input type="text" name="your_name" value="<?php echo $_POST['your_name']; ?>">
  </div>
  
	<div class="element_wrap">
		<label>メールアドレス</label>
		<input type="text" name="email" value="<?php echo $_POST['email']; ?>">
  </div>
	<input type="submit" name="btn_confirm" value="入力内容を確認する">
</form>

<?php endif; ?>
</body>
</html>