<?php
$topic = $_POST['topic'];
$detail = $_POST['detail'];
$name = $_POST['name'];

// กำหนดชื่อ host และ username
$link = mysqli_connect("localhost","root");
mysqli_set_charset($link,"utf8");
$sql = "Use boarddb;";
$result = mysqli_query($link,$sql);
$sql = "SELECT * FROM question; ";
$result = mysqli_query($link,$sql);
$count = 0;

while($dbarr = mysqli_fetch_array($result)){
     $count ++;
}
$itemno = $count+1;
$sql = "INSERT INTO question(qno, qtopic, qdetail, qname, qcount) VALUES ($itemno,'$topic','$detail','$name',0);";
$result = mysqli_query($link,$sql);
if($result){
    echo "เพิ่มกระทู้ใหม่สำเร็จแล้ว <br>";
    mysqli_close($link);
}else{
    echo "ไม่สามารถเพิ่มกระทู้ใหม่ลงในฐานข้อมูลได้ <br>";
}
echo '<a href="show_question.php">แสดงกระทู้ทั้งหมด</a> <br>';
echo '<a href="form_question.html">กลับไปหน้าแรก</a> <br>';
?>