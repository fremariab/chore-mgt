<?php

$SERVER = "localhost";
$USERNAME = "root";
$PSSWRD = "";
$DATABASE = "chores_mgt";
$conn = new mysqli($SERVER, $USERNAME, $PSSWRD, $DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";
