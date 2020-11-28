<?php
    require_once('connection.php');
?>

<?php
    $ID='';
    // echo "Hello: $ID";
    // echo var_dump($_GET);
    if(isset($_GET['ID'])){
        $ID=trim($_GET['ID']);
        $deleteClass=deleteClass($ID);
        if($deleteClass['result']==0){
            header("Location: modal.php");
        }
        else{
            header("Location: index.php");
        }
    }

?>