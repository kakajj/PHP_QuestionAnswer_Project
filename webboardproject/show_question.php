<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>หน้าหลัก</title>
    <!-- https://google.github.io/material-design-icons/#icon-font-for-the-web -->
    <!-- Using via Google Web Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- https://tailwindcss.com/docs/installation -->
    <!-- Using Tailwind via CDN -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <!-- https://v3.vuejs.org/guide/installation.html#release-notes -->
    <!-- Vue CDN -->
    <script src="https://unpkg.com/vue@next"></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'></script>
</head>

<body>
    <div class="heading text-center font-bold text-2xl m-5 text-gray-800">สร้างโพสท์ใหม่</div>
    <style>
        body {
            background:lightblue !important;
        }
    </style>
    <h2>กระทู้ทั้งหมด</h2>
    <hr>
    <?php
        $link = mysqli_connect("localhost","root");
        mysqli_set_charset($link,'utf8');
        mysqli_query($link,"USE boarddb ;");

        $sql = "SELECT * FROM Question ORDER BY qno ASC ;";
        $result = mysqli_query($link,$sql);
        while($dbarr = mysqli_fetch_array($result)){
            echo $dbarr['qno'];
            echo '<a href=show_detail.php?item='.$dbarr["qno"].'>';
            echo "$dbarr[qtopic]</a>&nbsp;";
            echo "$dbarr[qname]";
            echo "&nbsp; [" . $dbarr['qcount']."]<br>\n";
       }
       mysqli_close($link);
    ?>
    <hr><a href="form_question.html">ตั้งกระทู้ใหม่</a>


</body>

</html>