<?php
    $answerno = $_GET['answerno'];
    $a_answer = $_POST['a_answer'];
    $a_name = $_POST['a_name'];

    $link = mysqli_connect("localhost","root");
    mysqli_set_charset($link,"utf8");
    mysqli_query($link,"USE boarddb ;");

    $sql = "SELECT * FROM answer WHERE aq_no=$answerno ;";
    $count = 1;
    $result = mysqli_query($link,$sql);

    while($dbarr = mysqli_fetch_array($result)){
        $count++;
    }
    $sql = "INSERT INTO answer VALUES ($answerno,$count,'$a_answer','$a_name');";
    $result = mysqli_query($link,$sql);
    if($result){
        $sql = "UPDATE question SET qcount=qcount+1 WHERE qno=$answerno ;";
        $result = mysqli_query($link,$sql);
        echo "คำตอบได้ถูกบันทึกลงฐานข้อมูลแล้ว <br><br>";
        echo '<a href="show_question.php">หน้าหลัก</a>';
    }
    else{
        echo "ไม่สามารถบันทึกข้อมูลลงบนฐานข้อมูลได้ กรุณาตรวจสอบ";

    }
    mysqli_close($link);
?>