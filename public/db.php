<?php

require __DIR__ . '/../vendor/autoload.php';

class NotesDB extends SQLite3 {
function __construct() {
$this->open('../notes.db');
}
}

function fetchNotes($db) {
$sql = "SELECT id, name, date FROM note";
$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
echo "id = ". $row['Id'] . ", ";
echo "name = ". $row['Name'] . ", ";
echo "date = ". $row['Date'] ."<br>";
}
}

$db = new NotesDB();
echo "<h1>Before</h1>";
fetchNotes($db);
$date = date('Y-m-d');
$db->query("delete from note where id = 7 or id = 9");
echo "<h1>After</h1>";
fetchNotes($db);

$db->close();