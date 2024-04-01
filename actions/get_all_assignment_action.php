<?php
include "../settings/connection.php";
function getassignments($user_id,$user_role)
{
    global $conn;

    if ($user_role==1|| $user_role==2){
        $sql = "SELECT * 
                FROM assignment as a 
                JOIN chores as c ON c.cid = a.cid 
                JOIN status as s ON s.sid = a.sid 
                JOIN assigned_people as assp ON assp.assignmentid = a.assignmentid 
                JOIN people as p ON p.pid = a.who_assigned 
                ORDER BY a.assignmentid ASC;";
    }else{
        $sql = "SELECT * 
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = a.who_assigned
        WHERE a.who_assigned = '$user_id'
        ORDER BY a.assignmentid ASC";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    }
}

function getongoing($user_id,$user_role)
{
    global $conn;
    $currentDate = date('Y-m-d');

        $sql = "SELECT * FROM assignment AS a JOIN chores AS c ON c.cid = a.cid JOIN status AS s ON s.sid = a.sid JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid JOIN people AS p ON p.pid = a.who_assigned WHERE a.who_assigned = 13 AND (s.sid != 3) ORDER BY a.assignmentid ASC;";
    
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    }
}

function getassignments_inprogress($user_id,$user_role)
{
    global $conn;
    $currentDate = date('Y-m-d');
    if ($user_role==1|| $user_role==2){
        $sql = "SELECT *
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = assp.pid
        WHERE s.sid = 2 AND a.date_due > '$currentDate'";
    }else{
        $sql = "SELECT *
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = a.who_assigned
        WHERE s.sid = 2 AND a.who_assigned = '$user_id' 
        AND a.date_due > '$currentDate'
        ";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    }
}

function getassignments_incomplete()
{
    global $conn;
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    $currentDate = date('Y-m-d');


    if ($user_role==1|| $user_role==2){
        $sql = "SELECT * 
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = a.who_assigned
        WHERE s.sid = 4 OR a.date_due < '$currentDate'

        ";
    }else{
        $sql = "SELECT * 
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = a.who_assigned
        WHERE s.sid = 4 AND a.who_assigned = '$user_id' AND p.pid = assp.pid OR a.date_due < '$currentDate'
        ";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $assignments;
    }
}

function getassignments_completed()
{
    global $conn;
    $user_role = $_SESSION['user_role'];
    $user_id = $_SESSION['user_id'];
    $currentDate = date('Y-m-d');


    if ($user_role==1|| $user_role==2){
        $sql = "SELECT * 
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = assp.pid
        WHERE s.sid = 3
        ";
    }else{
        $sql = "SELECT * 
        FROM assignment AS a
        JOIN chores AS c ON c.cid = a.cid
        JOIN status AS s ON s.sid = a.sid
        JOIN assigned_people AS assp ON assp.assignmentid = a.assignmentid
        JOIN people AS p ON p.pid = a.who_assigned
        WHERE s.sid = 3 AND a.who_assigned = '$user_id' AND p.pid = assp.pid
        ";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    }
}


function getassignments_recent()
{
    global $conn;
    $user_role = $_SESSION['user_role'];

    if ($user_role==1|| $user_role==2){
        $sql = "SELECT * FROM assignment as a,chores as c,status as s,assigned_people as assp, people as p where s.sid=a.sid and c.cid=a.cid  and p.pid=a.who_assigned and p.pid=assp.pid ORDER BY a.assignmentid ASC LIMIT 3";
    }else{
        $sql = "SELECT * FROM assignment as a,chores as c,status as s,assigned_people as assp,people as p where s.sid=a.sid and c.cid=a.cid  and a.who_assigned='$user_id' and p.pid=a.who_assigned and p.pid=assp.pid ORDER BY a.assignmentid ASC LIMIT 3";
    }
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows >= 0) {
        $assignments = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $assignments;
    }
}