<html>
  <head>
    <title>a</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
 
 
 
  <body>
<?php
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
    //DB接続処理
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
$dbhost="ec2-34-234-228-127.compute-1.amazonaws.com";
$dbname="d35oi65egvniqf";
$dbuser="cejawxqfcbuxym";
$dbpass="44fd4ad578cc33d83722a7ee98f01619dfa162bc6a3308e08a4e8feb1db8abc1";
$dbtype="pgsql";
$dsn = "$dbtype:dbname=$dbname host=$dbhost port=5432";
try{
    $pdo=new PDO($dsn,$dbuser,$dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    //print"接続しました<br>";
}catch(PDOException $Exception){
    die('エラー:'.$Exception->getMessage());
    print "データベース接続失敗<br>";
}
/*▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲
▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲▼▲*/
?>

    <br>
    <h1 class="text-light">PLUS YOUR LIFE</h1>
    <h1 class="text-light">出来事を共有しましょう</h1>

    <form name="form1" method="post" action="index.php" enctype="multipart/form-data" class="box11">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    画像を選択：<input type="file" name="upfile"><br>
    <br>ニックネーム<br><input type="text" name="name" maxlength="20"><br>
    <br>コメント<br><textarea name="comment" rows="5" cols="50"></textarea><br>
    <br>パスワード<br><input type="text" name="pass" maxlength="4"><br>
    <br><input type="submit" value="投稿する"><br>
    </form>

<?php/*
//１.画像と名前が入力されていた場合
if(isset($_FILES["upfile"]["name"]) && $_POST["name"]!=""){
    //画像の保存処理
    $file_dir='C:\Users\Owner\Documents\keihi2\images\\';
    $file_path=$file_dir.$_FILES["upfile"]["name"];
    move_uploaded_file($_FILES["upfile"]["tmp_name"],$file_path);//imagesに画像を保存

    //データベースへの書き込み処理
    $T=time();          
    $Y=date('Y',$T);
    $M=date('m',$T);
    $D=date('d',$T);
    $YMD="$Y/$M/$D";
    $img_path="/images//".$_FILES["upfile"]["name"];    //画像のpath
    $sql_insert="INSERT INTO PU(link,nam,com,,pass,year,month,day,ymd) VALUES('?','?','?','?','?','?','?','?')";
    try{
        $stmh=$pdo->prepare($sql_insert);
        $stmh->execute(array($img_path,$_POST["name"],$_POST["comment"],$_POST["pass"],$Y,$M,$D,$YMD));
    }catch(PDOException $Exception){
        print　"エラー";
    }

}*/
?>

<?php
$imgg="/images//";
$imgg2=$imgg."pika.jpg";

?>
<br><IMG src="<?=$imgg2?>" width="10%" height="auto"><br>



<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" integrity="sha256-qM7QTJSlvtPSxVRjVWNM2OfTAz/3k5ovHOKmKXuYMO4=" crossorigin="anonymous"></script>
  </body>