<?php
mysql_connect('localhost', '234312', 'williams123') or die(mysql_error());
mysql_select_db('234312db2') or die(mysql_error());
$usName = mysql_real_escape_string($_POST['username']);
$pWord = mysql_real_escape_string($_POST['password']);

$sql = "SELECT password FROM user WHERE user_id='$usName'";
$result = mysql_query($sql) or die($sql . "<br/><br/>" . mysql_error());
$count = mysql_num_rows($result);

if ($count == 1) {
	$row = mysql_fetch_assoc($result);
	if (md5($pWord) == $row['password']) {
		echo true;
	} else {
		echo "Wrong Username or Password";
		return false;
	}
} else {
	echo "Wrong Username or Password";
	return false;
}
?>