<?php
    require_once('connection.php');
?>
<?php
    $ID='';
    $className='';
    $Subjects='';
    $ClassMate='';
    $classImage='';
    $error='';
    // echo "id: $ID";
    // echo var_dump($_POST);
    // echo var_dump(isset($_POST['ClassName']));
    // echo "3: $Subjects";
    // echo "4: $ClassMate";
    // echo "5: $Img";
    // isset($_POST['ID']) && isset($_POST['ClassName']) && isset($_POST['Subjects']) && isset($_POST['ClassMate']) 
    //      && isset($_POST['Images'])
    if( isset($_POST['className']) && isset($_POST['subject']) && isset($_POST['classMate']) && 
    isset($_POST['classImage'])){
     
        $ClassName=trim( $_POST['className']);
        $Subjects= trim($_POST['subject']);
        $ClassMate=trim( $_POST['classMate']);
        $ID = substr(md5(uniqid(mt_rand(), true)) , 0, 7);
        $classImage= $_POST['classImage'];

        // echo $ID."</br>";
        // echo $ClassName."</br>";
        // echo $Subjects."</br>";
        // echo $ClassMate."</br>";
        // echo $classImage."</br>";
        if($ClassName === ""){
            header("Location: creatClass.php");
        }
        else{
            echo $ID."</br>";
            $addClass=addClassRoom($ID, $ClassName, $Subjects, $ClassMate, $classImage);
            if($addClass['result']==0){
                header("Location: creatClass.php");
            }
            else{
                header("Location: index.php");
            }
        }
    }
    // else{
    //     header("Location: addClass.php?status=fail_addClass");
    // }

?>

