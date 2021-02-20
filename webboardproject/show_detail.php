<?php
$item = $_GET['item'];
$link = mysqli_connect("localhost","root");
mysqli_set_charset($link,"utf8");
mysqli_query($link,"USE boarddb ;");

function renHTML($strTemp){
    $strTemp = nl2br(htmlspecialchars($strTemp));
    return $strTemp;
}
$sql = "SELECT * FROM question WHERE qno=$item ;";
$result = mysqli_query($link,$sql);
$dbarr = mysqli_fetch_array($result);
?>
ิ<b>Question</b>
<?php
    echo renHTML($dbarr['qtopic']);
?>
<br>
<table width="100%" border="1" bgcolor="#E0E0E0" bordercolor="black">
<tr><td>

<?php
echo  renHTML($dbarr['qdetail']);
?>
<br>
<b>โดย</b>
<?php
   echo renHTML($dbarr['qname']);
?>
</td>
</tr>
</table>
<br>

<?php
$sql = "SELECT * FROM answer WHERE aq_no=$item ;";
$result = mysqli_query($link,$sql);
if($result){
    while($dbarr = mysqli_fetch_array($result)){
?>

<b>คำตอบที่</b> 

<?php
    echo $dbarr['a_no'];
?>

<br>
<table width="100%" border="1" bgcolor="#E0E0E0" bordercolor="black">
<tr><td>

<?php
    echo renHTML($dbarr['a_detail']);
?>
<br>
<b>โดย</b>
<?php
 echo renHTML($dbarr['a_name']);
?>
</td></tr>
</table><br>

<?php
    }
}
echo '<form method=POST action=add_answer.php?answerno='.$item.'>';
mysqli_close($link);
?>
คำตอบ :
<br>
<textarea name="a_answer"  cols="40" rows="5"></textarea><br>
ชื่อ: <input type="text" name="a_name" size="30"><br><br>
<input type="submit" value="ส่งคำตอบ">
<input type="reset" value="ยกเลิก">
</form>

