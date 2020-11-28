<?php
session_start();
require_once('connection.php');
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: dang-nhap.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>

    <!-- FONT Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- FONT GOOGLE -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />

    <!-- CSS BS4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header class="px-5">
        <nav class="navbar navbar-expand-lg">

            <div class="col-9 col-md-9 col-lg-9 col-xl-10">
                <div class="header__left">
                    <a class="navbar-brand" href="#">
                        <img src="./img/logo_tdtu.png" alt="Logo">
                        <p>Lớp Học</p>
                    </a>

                    <form class="header__form">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for class" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3 col-md-3 col-lg-3 col-xl-2">
                <div class="header__right">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ">
                            <a class="nav-link pr-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-plus"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Tham gia lớp học</a>
                                <a id="creatClass" class="dropdown-item" href="creatClass.php">Tạo lớp học</a>
                            </div>
                        </li>
                        <li class="nav-item else">
                            <a class="nav-link pr-5" href="#">
                                <i class="fa fa-th"></i>

                            </a>
                        </li>

                        <li class="nav-item user">
                            <a class="nav-link" href="#">
                                <img src="./img/user.jpg" alt="User">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </div>
        </nav>

    </header>
    <div class="js-pride-month-gradient" style="width: 100%; height: 0.8rem; background: linear-gradient(90deg, rgb(100, 91, 83) 0%, rgb(235, 82, 82) 18.23%, rgb(247, 143, 47) 34.37%, rgb(244, 193, 81) 48.96%, rgb(82, 187, 118) 66.15%, rgb(38, 165, 215) 82.29%, rgb(224, 105, 183) 100%);">
    </div>

    <div class="sources">
        <div class="row">
            <?php
            $totalClass = getAllClass();
            while (($row = $totalClass->fetch_assoc())) {
            ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    <div class="card border-info classCard">
                        <img src="./img/img_avatar2.png " alt="" class="card-img-top">
                        <!-- <div class="card-img-top" id='divImage'></div> -->
                        <div class="card-body">
                            <h3 class="card-title">
                                <?$row['ClassName']?> Tên Lớp: <?= $row['ClassName'] ?> </h3>
                            <h4 class="card-title">
                                <?$row['ID']?> ID: <?= $row['ID'] ?> </h4>
                            <span class="card-text">
                                <?$row['Subjects']?> Subjects: <?= $row['Subjects'] ?> </span>
                            <br>
                            <span class="card-text">
                                <?$row['ClassMate']?> ClassMate: <?= $row['ClassMate'] ?> </span>
                            <ul class="list-group list-group-flush text-right settings">
                                <li class="list-group-item delete"><a href="" data-toggle="modal" data-target='#modal-delete-<?= $row['ID'] ?> '><i class="fa fa-trash"></i></a></li>
                                <?php include("./modal.php") ?>
                                <li class="list-group-item edit"><a href="./editClass.php?ID=<?= $row['ID'] ?>"><i class="fa fa-edit"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>


    </div>

            









    <!-- JS BS4 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="main.js"></script>
</body>

</html>