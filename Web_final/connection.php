<?php
$server_username = "root"; // thông tin đăng nhập host
$server_password = ""; // mật khẩu, trong trường hợp này là trống
$server_host = "localhost"; // host là localhost
$database = 'website'; // database là website

// Tạo kết nối đến database dùng mysqli_connect()
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
// Thiết lập kết nối ủa chúng ta khi truy vấn là dạng UTF8 trong trường hợp dữ liệu là tiếng việt có dâu
mysqli_query($conn,"SET NAMES 'UTF8'");

    define('erver_host', "localhost");
    define('server_username', "root");
    define('erver_password', "");
    define('database', "website");
    
    function connection()
    {
        $conn = mysqli_connect(erver_host,server_username , erver_password,database);
        mysqli_query($conn,"SET NAMES 'UTF8'");
        // $conn = mysqli_connect($server_host,$server_username,$server_password,$database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function addClassRoom($ID, $ClassName, $Subjects, $ClassMate, $Images)
    {
        $conn = connection();
        $sql = 'INSERT INTO classes(ID,ClassName,Subjects,ClassMate,Images) values(?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss',$ID, $ClassName, $Subjects , $ClassMate, $Images);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: creatClass.php?status=createClass');
    }

    function getAllClass(){
        $conn = connection();
        $sql = 'SELECT * FROM classes';
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute())
        {
            return array('result' => 0,'error'=>'Fail_getAllClass');
        }

        $totalClass= $stmt->get_result();
        return $totalClass;
    }

    function deleteClass($ID){
        $conn = connection();
        $sql = 'DELETE FROM classes WHERE ID=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: index.php');
    }

    function getOneClass($ID){
        $conn = connection();
        $sql = 'SELECT * FROM classes WHERE ID=?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'fail_exucted: '. $stmt->error);
        }
        $oneClass= $stmt->get_result();
        return $oneClass;
    }

    function updateClass( $ClassName, $Subjects, $ClassMate, $Images, $ID){
        $conn = connection();
        $sql = 'UPDATE classes SET ClassName=?, Subjects=?, ClassMate=?, Images=? WHERE ID=?';
        // $sql = 'INSERT INTO classes(ID,ClassName,Subjects,ClassMate,Images) values(?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $ClassName, $Subjects , $ClassMate, $Images, $ID);
        if(!$stmt->execute())
        {
            return array('result' => 0, 'error' => 'execute failed: '. $stmt->error);
        }
        return array('result' => 1, 'error' => 'Location: index.php');
        
    }

?>