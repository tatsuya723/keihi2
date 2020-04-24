<html>
  <head>
    <title>a</title>
    <meta charset="utf-8">
    <style type="text/css">
    body {
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    h1 {
        text-align:center;
    }
    form {
        text-align:center;
    }

    </style>
  </head>
  <body>
    <br>
    <h1 class="text-light">Pure CSS Animated Gradient Background</h1>
    <h1 class="text-light">出来事を共有しましょう</h1>

    <form name="form1" method="post" action="index.php" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    画像を選択：<input type="file" name="upfile"><br>
    コメント：<input type="text" name="comment"><br>
    パスワード：<input type="text" name="pass"><br>
    <input type="submit" value="投稿する"><br>


    </form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" integrity="sha256-qM7QTJSlvtPSxVRjVWNM2OfTAz/3k5ovHOKmKXuYMO4=" crossorigin="anonymous"></script>
  </body>