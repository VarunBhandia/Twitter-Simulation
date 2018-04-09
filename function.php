<?php

include("..config/config.php"); 

function get_tweet1_id($conn){
    $sql = "SELECT * FROM `tweet1`";
    $res = mysqli_query($conn, $sql );
    $result = array();
    while($data = mysqli_fetch_assoc($res))
    {
        $result[] = $data['id'];
    }
    return $result;
}

function get_tweet1_url($conn){
    $sql = "SELECT * FROM `tweet1`";
    $res = mysqli_query($conn, $sql );
    $result = array();
    while($data = mysqli_fetch_assoc($res))
    {
        $result[] = $data['urls'];
    }
    return $result;
}
?>