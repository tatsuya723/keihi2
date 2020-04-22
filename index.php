<html>
<head>
<title>データ入力ページ</title>
<meta charset=utf-8>
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


<hr size="9" noshade>
<h1>＃出費入力ページ</h1>
<hr size="4" noshade>
<br>

<?php

if($_POST["NAM"]!="" || $_POST["PRICE"]!="" || $_POST["TYPE"]!="" || $_POST["year"]!="" || $_POST["month"]!="" || $_POST["day"]!=""){

    if($_POST["PRICE"]==""){    //出費入力がない場合、登録できないようにする。入力内容は保存しておく
?>
        <form name="入力" method="post" action="入力.php">
           
           <font size="4" color="#000000">タイトル:</font><br>
           <input type="text" name="NAM" value="<?=htmlspecialchars($_POST["NAM"])?>"> 
           <p>　　</p>
           <font size="4" color="#000000">出費:</font><br>
           <input type="text" name="PRICE"><br>
    
           <font size="4" color="#000000">タイトルの種類を選択:</font><br>
           <select name="TYPE">
           <option value="<?=htmlspecialchars($_POST["TYPE"])?>" selected><?=htmlspecialchars($_POST["TYPE"])?></option>
           <option value="食費">食費</option>
           <option value="生活必需品・インテリア">生活必需品・インテリア</option>
           <option value="車両関連">車両関連</option>
           <option value="遊び・趣味・旅行・外食">遊び・趣味・旅行・外食</option>
           <option value="その他・手続き">その他・手続き</option>
           </select>
           <br>      
    
           <font size="4" color="#000000">日付を指定:</font><br>
           <select name="year">
           <option value="<?=htmlspecialchars($_POST["year"])?>" selected><?=htmlspecialchars($_POST["year"])?></option>
           <option value="2019">2019</option>
           <option value="2020">2020</option>
           <option value="2021">2021</option>
           <option value="2022">2022</option>
           <option value="2023">2023</option>
           <option value="2024">2024</option>
           <option value="2025">2025</option>
           <option value="2026">2026</option>
           <option value="2027">2027</option>
           <option value="2028">2028</option>
           <option value="2029">2029</option>
           <option value="2030">2030</option>
           </select>
           年
           <select name="month">
           <option value="<?=htmlspecialchars($_POST["month"])?>" selected><?=htmlspecialchars($_POST["month"])?></option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           </select>
           月
           <select name="day">
           <option value="<?=htmlspecialchars($_POST["day"])?>" selected><?=htmlspecialchars($_POST["day"])?></option>
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
           <option value="6">6</option>
           <option value="7">7</option>
           <option value="8">8</option>
           <option value="9">9</option>
           <option value="10">10</option>
           <option value="11">11</option>
           <option value="12">12</option>
           <option value="13">13</option>
           <option value="14">14</option>
           <option value="15">15</option>
           <option value="16">16</option>
           <option value="17">17</option>
           <option value="18">18</option>
           <option value="19">19</option>
           <option value="20">20</option>
           <option value="21">21</option>
           <option value="22">22</option>
           <option value="23">23</option>
           <option value="24">24</option>
           <option value="25">25</option>  
           <option value="26">26</option>
           <option value="27">27</option>
           <option value="28">29</option>
           <option value="30">30</option>
           <option value="31">31</option>
           </select>
           日     
           <br>
           <input type="submit" value="送信">
        </form>
<?php
        print"出費金額を入力してください。<br>";
    
    //出費入力があった場合の処理    
    }else{                     
        $PRICE=$_POST["PRICE"];
        
?>
    <form name="入力" method="post" action="入力.php">
       
       <font size="4" color="#000000">タイトル:</font><br>
       <input type="text" name="NAM"> 
       <p>　　</p>
       <font size="4" color="#000000">出費:</font><br>
       <input type="text" name="PRICE"><br>

       <font size="4" color="#000000">タイトルの種類を選択:</font><br>
       <select name="TYPE">
       <option value="" selected>----作業内容を選択してください----</option>
       <option value="食費">食費</option>
       <option value="生活必需品・インテリア">生活必需品・インテリア</option>
       <option value="車両関連">車両関連</option>
       <option value="遊び・趣味・旅行・外食">遊び・趣味・旅行・外食</option>
       <option value="その他・手続き">その他・手続き</option>
       </select>
       <br>      

       <font size="4" color="#000000">日付を指定:</font><br>
       <select name="year">
       <option value="" selected>----年を選択してください----</option>
       <option value="2019">2019</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
       <option value="2023">2023</option>
       <option value="2024">2024</option>
       <option value="2025">2025</option>
       <option value="2026">2026</option>
       <option value="2027">2027</option>
       <option value="2028">2028</option>
       <option value="2029">2029</option>
       <option value="2030">2030</option>
       </select>
       年
       <select name="month">
       <option value="" selected>----月を選択してください----</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       </select>
       月
       <select name="day">
       <option value="" selected>----日を選択してください----</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       <option value="13">13</option>
       <option value="14">14</option>
       <option value="15">15</option>
       <option value="16">16</option>
       <option value="17">17</option>
       <option value="18">18</option>
       <option value="19">19</option>
       <option value="20">20</option>
       <option value="21">21</option>
       <option value="22">22</option>
       <option value="23">23</option>
       <option value="24">24</option>
       <option value="25">25</option>  
       <option value="26">26</option>
       <option value="27">27</option>
       <option value="28">29</option>
       <option value="30">30</option>
       <option value="31">31</option>
       </select>
       日     
       <br>
       <input type="submit" value="送信">
    </form>
<?php
        //日時の設定　指定が無かった場合はその日の日付を取得
        if($_POST["year"]=="" && $_POST["month"]=="" && $_POST["day"]==""){
            $T=time();
            $Y=date('Y',$T);
            $M=date('m',$T);
            $D=date('d',$T);
        }else{
            $Y=$_POST["year"];
            $M=$_POST["month"];
            $D=$_POST["day"];
        }   
        $YMD="$Y/$M/$D";

        //タイトルの設定
        if($_POST["NAM"]==""){
            $NAM="不明";
        }else{
            $NAM=$_POST["NAM"];
        }

        //タイトル種類の設定
        if($_POST["TYPE"]==""){
            $TYPE="不明";
        }else{
            $TYPE=$_POST["TYPE"];
        }

        //データベースへの書き込み処理
        $sql_insert="INSERT INTO syuppi VALUES('NAM=?', 'PRICE=?', 'TYPE=?' , 'year=?' , 'month=?' , 'day=?' , 'ymd=?') ";
        try{
            $stmh=$pdo->prepare($sql_insert);
            $stmh->execute(array($NAM,$PRICE,$TYPE,$Y,$M,$D,$YMD));
            ?><font size="4" color="#ff0000">登録完了</font><br><?php
        }catch(PDOException $Exception){
            print　"エラー";
        }
    }

//全て空白(初期画面)
}else{
?>
    <form name="入力" method="post" action="入力.php">
       
       <font size="4" color="#000000">タイトル:</font><br>
       <input type="text" name="NAM"> 
       <p>　　</p>
       <font size="4" color="#000000">出費:</font><br>
       <input type="text" name="PRICE"><br>

       <font size="4" color="#000000">タイトルの種類を選択:</font><br>
       <select name="TYPE">
       <option value="" selected>----作業内容を選択してください----</option>
       <option value="食費">食費</option>
       <option value="生活必需品・インテリア">生活必需品・インテリア</option>
       <option value="車両関連">車両関連</option>
       <option value="遊び・趣味・旅行・外食">遊び・趣味・旅行・外食</option>
       <option value="その他・手続き">その他・手続き</option>
       </select>
       <br>      

       <font size="4" color="#000000">日付を指定:</font><br>
       <select name="year">
       <option value="" selected>----年を選択してください----</option>
       <option value="2019">2019</option>
       <option value="2020">2020</option>
       <option value="2021">2021</option>
       <option value="2022">2022</option>
       <option value="2023">2023</option>
       <option value="2024">2024</option>
       <option value="2025">2025</option>
       <option value="2026">2026</option>
       <option value="2027">2027</option>
       <option value="2028">2028</option>
       <option value="2029">2029</option>
       <option value="2030">2030</option>
       </select>
       年
       <select name="month">
       <option value="" selected>----月を選択してください----</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       </select>
       月
       <select name="day">
       <option value="" selected>----日を選択してください----</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       <option value="13">13</option>
       <option value="14">14</option>
       <option value="15">15</option>
       <option value="16">16</option>
       <option value="17">17</option>
       <option value="18">18</option>
       <option value="19">19</option>
       <option value="20">20</option>
       <option value="21">21</option>
       <option value="22">22</option>
       <option value="23">23</option>
       <option value="24">24</option>
       <option value="25">25</option>  
       <option value="26">26</option>
       <option value="27">27</option>
       <option value="28">29</option>
       <option value="30">30</option>
       <option value="31">31</option>
       </select>
       日     
       <br>
       <input type="submit" value="送信">
    </form>
<?php

    $sql_insert="INSERT INTO syuppi(NAM,PRICE,TYPE,year,month,day,ymd) VALUES('?','?','?','?','?','?','?')";

    try{
        $stmh=$pdo->prepare($sql_insert);
        $stmh->execute(array($NAM,$PRICE,$TYPE,$Y,$M,$D,$YMD));
        ?><font size="4" color="#ff0000">登録完了</font><br><?php
    }catch(PDOException $Exception){
        print　"エラー";
    }
}
?>

</body>
</html>
