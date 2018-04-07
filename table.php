<pre>
<?php

$host = "localhost";
$username = "root";
$password = "";
$data = "CSE356";

$table = "assists";

$conn = mysqli_connect($host,$username, $password, $data);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$file = fopen("hw7.sql", "r");
while (!feof($file)){
	$line = fgets($file);
	mysqli_query($conn, $line);
	echo $line;
}
fclose($file);

?>
</pre>