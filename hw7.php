<?php
$host = "localhost";
$username = "root";
$password = "";
$data = "CSE356";

$table = "assists";

// $mem = new Memcached();
// $mem->addServer("127.0.0.1", 11211);

$pos = $_GET['pos'];
$club = $_GET['club']; 

// $q = "SELECT a.Player AS player, a.Club as club, a.POS as pos, MAX(a.A) as max_assists, avg_assists FROM `assists` AS a, `assists` AS b INNER JOIN (SELECT AVG(c.A) AS avg_assists, c.POS, c.Club FROM `assists` c GROUP BY Club, POS) AS d WHERE a.GS > b.GS AND d.Club = a.Club AND a.Club = b.Club AND a.POS = b.POS AND d.POS = a.POS AND a.POS = '". $pos ."' AND a.Club = '" . $club ."'" ;

$q = "SELECT * FROM assists WHERE club = '" . $club . "' AND pos='" . $pos . "'";

$key = $pos.'@'.$club;

$conn = mysqli_connect($host, $username, $password, $data);
$query = mysqli_query($conn, $q);

$results = array();
$assists = 0;
$count = 0;
$max_assists_index = 0;
$max_assists = -1;

while ($row = mysqli_fetch_assoc($query)){
	$response = array('pos' => $row['POS'],
						'player' => $row['Player'],
						'club' => $row['Club'],
						'max_assists' => $row['A'],
						'GS' => $row['GS']);

	$assists += ($row['A'] + 0);
	if ($row['A'] > $max_assists){
		$max_assists_index = $count;
		$max_assists = $row['A'];
	} else if ($row['A'] == $max_assists){
		if ($row['GS'] > $results[$max_assists_index]['GS']){
			$max_assists_index = $count;
			$max_assists = $row['A'];
		}
	}
	array_push($results, $response);
	$count++;
}


$a = array('pos' => $results[$max_assists_index]['pos'] ,
			'player' => $results[$max_assists_index]['player'],
			'club' => $results[$max_assists_index]['club'],
			'max_assists' => $results[$max_assists_index]['max_assists'] + 0,
			'avg_assists' => ($assists / $count) );

echo json_encode($a);

?>