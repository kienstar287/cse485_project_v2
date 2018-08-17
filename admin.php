<?php 
session_start();
include("lib_db.php");
include("checklogin.php");

$user = checkLoggedUser();
$teaches = array();
if ($user['type']=='admin') {
$sql ="select * from Giaovien";
    $sql .=" order by id_gv desc";
    $teaches = exec_select($sql);
}
    // var_dump($teaches);
    $img_gv = isset($_REQUEST["img_gv"])?$_REQUEST["img_gv"]:""; 
 ?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js">
    </script>
</head>

<body>

    <div class="page">
        <div class="top-menu-bar">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <li class="nav-item">
                                <?php if ($user['type']=='admin') {
                                echo '<a class="nav-link" href="admin.php">Quản lý</a>';
                            }
                            else {
                                echo '<a class="nav-link" href="">Hỗ trợ</a>';
                            } 
                            ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Giới thiệu</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#">Liên hệ</a>
                            </li>
                            <li class="nav-item text-primary">
                                <a href="#">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                            </li>
                            &nbsp;
                            <li class="nav-item">
                                <a href="#">
                                    <i class="fa fa-google-plus-square text-danger"> </i>
                                </a>
                            </li>
                    </ul>
                    <form class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="login.php" class="btn btn-info btn-sm ">
                                <i class="fa fa-user"></i>&nbsp;
                                <?php echo($user ? $user['username'] : 'Đăng nhập')?>
                            </a>

                        </li>
                        &nbsp;
                        <li class="nav-item">

                            <!-- Kiểm tra có tài khoản đăng nhập không  -->
                            <?php
                               
                            if (isset($_SESSION['user']) == true) {
                               
                                echo "<a href='logout.php' class='btn btn-info btn-sm' >Đăng xuất</a>";
                              
                            }
                            else
                            {
                                echo "<a href='register.php' class='btn btn-info btn-sm' >Đăng ký</a>";
                            }
                                ?>

                        </li>
                    </form>
                </div>
            </nav>
        </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-row mt-2">
                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" role="navigation">
                        <li class="nav-item">
                            <a href="#lorem" class="nav-link active" data-toggle="tab" role="tab" aria-controls="lorem">Quản
                                lý giáo viên</a>
                        </li>
                        <li class="nav-item">
                            <a href="#ipsum" class="nav-link" data-toggle="tab" role="tab" aria-controls="ipsum">Quản
                                lý môn học</a>
                        </li>
                        <li class="nav-item">
                            <a href="#dolor" class="nav-link " data-toggle="tab" role="tab" aria-controls="dolor">Quản
                                lý lớp học</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sit-amet" class="nav-link" data-toggle="tab" role="tab" aria-controls="sit-amet">Thông
                                báo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#thongbao" class="nav-link" data-toggle="tab" role="tab" aria-controls="thongbao">Tin
                                tức</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tintuc" class="nav-link" data-toggle="tab" role="tab" aria-controls="tintuc">User</a>
                        </li>

                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane fade show active col-lg-12" id="lorem" role="tabpanel">

                            <div class="container">
                                <div class="card-block ">
                                    <h4>Danh sách giáo viên</h4>

                                    <button data-toggle="modal" data-target="#exampleModalCenter" class=" btn btn-outline-primary waves-effect waves-light f-right d-inline-block md-trigger pull-right"
                                        type="button">
                                        <i class="icofont icofont-plus m-r-5"></i> Thêm Mới
                                    </button>

                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Id</th>
                                            <th>Tên giáo viên</th>
                                            <th>Môn học</th>
                                            <th>Giới tính</th>
                                            

                                            <th>SĐT</th>
                                            <th>Thông tin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0;
                                        foreach($teaches as $itemgv) 
                                        {
                                            $i++;
                                            ?>
                                        <tr>
                                            <td>
                                               <img src="http://localhost:8080/cse485/<?=$itemgv['img_gv']?>" width="50" height="50" alt=""> 
                                            </td>
                                            <td>
                                                <?=$itemgv['id_gv']?>
                                            </td>
                                            <td>
                                            <?=$itemgv['ten_gv']?>
                                            </td>
                                            <td>
                                            <?=$itemgv['monhoc']?>
                                            </td>
                                            <td><?php if ($itemgv['gioitinh']=='0') {
                                echo 'Nam';
                            }
                            else {
                                echo 'Nữ';
                            } 
                                                
                                            ?></td>
                                            <td>
                                            <?=$itemgv['sdt']?>
                                            </td>

                                            
                                            <td>
                                            <?=$itemgv['thongtin']?>
                                            </td>

                                            <td class="center">
                                                <div class="d-none d-md-block d-lg-block  text-center">
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Chi tiết">
                                                        <u class="text m-r-10 text-primary">Xem</u>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Chỉnh sửa">
                                                        <u class="text m-r-10 text-primary">Sửa</u>
                                                    </a>
                                                    <a href="javascript:;" data-toggle="tooltip" title=""
                                                        data-original-title="Xóa">
                                                        <u class="text text-primary">Xóa</u>
                                                    </a>
                                                </div>
                                                <div class=" d-xs-block d-sm-block d-md-none d-sm-none ">

                                                    <button aria-expanded="false" aria-haspopup="true" class="btn btn-outline-primary btn-sm dropdown-toggle waves-effect waves-light"
                                                        data-toggle="dropdown" id="dropdown-2" ngbdropdowntoggle=""
                                                        type="button">
                                                        <i class="icofont icofont-wheel"></i>
                                                    </button>


                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item border text-primary" href="#">
                                                            <i class="icofont icofont-eye-alt"></i>&nbsp;&nbsp;&nbsp;Xem</a>
                                                        <a class="dropdown-item border text-primary" href="#">
                                                            <i class="icofont icofont-edit"></i>&nbsp;&nbsp;&nbsp;Sửa</a>
                                                        <a class="dropdown-item border text-primary" href="javascript:;">
                                                            <i class="icofont icofont-ui-delete"></i>&nbsp;&nbsp;&nbsp;Xóa</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <div class="tab-pane fade" id="ipsum" role="tabpanel">
                            <h1>Ipsum</h1>

                            <p>Aenean pharetra risus quis placerat euismod. Praesent mattis lorem eget massa euismod
                                sollicitudin. Donec porta nulla ut blandit vehicula. Mauris sagittis lorem nec mauris
                                placerat, et molestie elit vehicula. Donec libero ex, condimentum et mi dapibus,
                                euismod ornare ligula.</p>

                            <p>In faucibus tempus ante, et tempor magna luctus id. Ut a maximus ipsum. Duis eu velit
                                nec libero pretium pellentesque. Maecenas auctor hendrerit pulvinar. Donec sed tortor
                                interdum, sodales elit vel, tempor turpis. In tristique vestibulum eros vel congue.
                                Vivamus maximus posuere fringilla. Nullam in est commodo, tristique ligula eu,
                                tincidunt enim. Duis iaculis sodales lectus vitae cursus.</p>
                        </div>
                        <div class="tab-pane fade" id="dolor" role="tabpanel">
                            <h1>Dolor</h1>

                            <p>Ut eget lectus tristique, tempus purus sit amet, porta augue. Mauris lobortis sem nec
                                augue ultricies blandit. Nullam sed sem venenatis, pretium urna eget, scelerisque
                                dolor. Morbi nec volutpat leo, quis faucibus tortor. Aenean vel rutrum mauris.
                                Pellentesque lectus massa, tincidunt quis leo non, sodales sagittis nulla. Proin
                                interdum est at nulla laoreet, pulvinar pretium nisl rutrum. In vel elit a risus
                                rhoncus accumsan vulputate non sapien. Sed et rhoncus velit. Nunc commodo augue
                                fermentum, hendrerit neque at, ullamcorper arcu. Nulla tincidunt orci a lectus
                                efficitur elementum. Donec molestie urna vestibulum augue placerat faucibus. In vitae
                                orci vel mauris cursus viverra ac sit amet nisl. Phasellus odio tortor, ullamcorper
                                eget ullamcorper eget, molestie eget justo. Integer elementum purus eget arcu fermentum
                                tincidunt. Nullam erat tellus, dictum sit amet nisi eu, rutrum fermentum odio.</p>
                        </div>
                        <div class="tab-pane fade" id="sit-amet" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi
                                sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet
                                mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat
                                auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus
                                consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum
                                vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a
                                velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus
                                fermentum.</p>
                        </div>
                        <div class="tab-pane fade" id="thongbao" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi
                                sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet
                                mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat
                                auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus
                                consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum
                                vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a
                                velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus
                                fermentum.</p>
                        </div>
                        <div class="tab-pane fade" id="tintuc" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi
                                sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet
                                mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat
                                auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus
                                consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum
                                vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a
                                velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus
                                fermentum.</p>
                        </div>
                        <div class="tab-pane fade" id="user" role="tabpanel">
                            <h1>Sit Amet</h1>

                            <p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi
                                sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet
                                mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat
                                auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus
                                consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum
                                vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a
                                velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus
                                fermentum.</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-12">

            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="add_exec.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="card-block p-b-0">

                            <div class="Contact">
                                <div class="card-block p-t-0">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-md-12 text-center ">
                                            <div class="text-center m-t-10">
                                                <img align="center" id="img_gv" alt="card-img" class="img-fluid p-b-10 img-radius img-120"
                                                    src="<?= 'http://localhost:8080/' + $img_gv?>">


                                            </div>

                                            <div align="center" class="custom-file mb-3 f-12 ">
                                                <input type="file" name="fileToUpload" id="fileToUpload">

                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-lg-8 col-md-12  p-r-0 p-l-0">
                                            <div class="content">
                           
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Tên giáo viên:


                                                            <input class="form-control" type="text" name="ten_gv"
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Môn học:


                                                            <input class="form-control" type="text" name="monhoc"
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-12  m-t-5">
                                                        <div class="col-sm-12 col-lg-12 ">

                                                            <i class="" for="uname"></i>Giới tính:


                                                            <div class="col-md-12 p-b-10">
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="0">Nam
                                                                    </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input"
                                                                            name="gioitinh" value="1">Nữ
                                                                    </label>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                   

                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>SĐT:



                                                            <input class="form-control" type="text" name="sdt"
                                                                required="">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 m-t-10">
                                                        <div class="col-sm-12 col-lg-12">

                                                            <i class="" for="uname"></i>Thông tin:

                                                            <textarea rows="3" cols="5" class="form-control m-t-10" name="thongtin"
                                                                placeholder="Default textarea">............</textarea>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>





                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</body>
<?php
if ($user['type']!='admin') {
    echo '<script>';
    echo 'alert("Bạn không có quyền truy cập");';
    echo 'window.location="index.php"';
    echo '</script>';
}
?>
</html>