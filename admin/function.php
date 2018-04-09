function get_blog_id($conn){
    $sql = "SELECT * FROM `cec-blog` where status = 1";
    $res = mysqli_query($conn, $sql );
    $result = array();
    while($data = mysqli_fetch_assoc($res))
    {
        $result[] = $data['id'];
    }
    return $result;
}