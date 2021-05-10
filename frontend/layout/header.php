<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../backend/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../backend/vendor/font-awesome/css/font-awesome.css">
    <title>Document</title>
    <style>
        a:hover{
            text-decoration: none;
            color:black;
        }
        ul{
            text-align: left;
            margin-left: 40px;
            padding: 0px;
            list-style-type: none;
        }
        ul li a{  
            text-decoration: none;
            color:black;
            font-size: 20px;
            display: block;
            
        }
        ul li{
            height: 33px;
        }
        ul li a:hover{
            color: black;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body style="background-color: #dcdcdc;">
    <div class="container-fluid" style="background-color: white;">
        <div class="row text-center" style="height: 100px;">
            <div class="col-md-1"></div>
            <div class="col-md-2 mt-4">
                <img src="../../backend/assets/imgs/pt.png">
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-4">
                <nav class="navbar">
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                    </form>
                    <a href="">
                        <i class="fa fa-cart-plus fa-3x ml-0" aria-hidden="true"></i>
                    </a>
                </nav>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1"></div>
        </div>

        <div class="row" style="background-color: #ffe6f2;">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                    <h4 class="ml-4">Loại sản phẩm</h4>
                
                <ul>
                    <li><a href="../../../backend/functions/loaihoa/index.php">Hoa sinh nhật</a></li>
                    <li><a href="../../../backend/functions/hoa/index.php">Hoa cưới</a></li>
                    <li><a href="../../../backend/functions/hinhhoa/index.php">Hoa khai trương</a></li>
                    <li><a href="../../../backend/functions/dondathang/index.php">Hoa chúc mừng</a></li>
                    <li><a href="../../../backend/functions/nhanvien/index.php">Hoa tình yêu</a></li>
                    <li><a href="../../../backend/functions/chucvu/index.php">Hoa chia buồn</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="../../backend/assets/imgs/slider1.png" class="d-block w-100" alt="..." style="height: 250px;">
                        </div>
                        <div class="carousel-item">
                        <img src="../../backend/assets/imgs/slider2.png" class="d-block w-100" alt="..." style="height: 250px;">
                        </div>
                        <div class="carousel-item">
                        <img src="../../backend/assets/imgs/slider6.png" class="d-block w-100" alt="..." style="height: 250px;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-2">
                <?php
                    //include_once('../../connectdb.php');
                    $conn=mysqli_connect("localhost","root","","ptflower");
                    $sql = <<<EOT
                    select hoa.hoa_ten, hoa.hoa_gia, hoa.hoa_giacu, hsp.hsp_tentaptin 
                    from hoa 
                    JOIN hinhsanpham AS hsp ON hoa.hoa_ma=hsp.hoa_ma
                    WHERE hoa.hoa_ma=15
EOT;
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_array($result);
                ?>
                <a href="detail.php?hoa_ma=15">
                    <div class="card px-0 mx-0" style="width: 11rem;">
                        <img class="card-img-top mx-auto" style="width: 124px; height= 100px;" src="../../backend/assets/uploads/products/<?=$row['hsp_tentaptin']?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?=$row['hoa_ten']?></h5>
                            <s class="card-text"><?=number_format($row['hoa_giacu'],'0','.',',')?> VND</s>
                            <p class="card-text" style="color: red;"><?=number_format($row['hoa_gia'],'0','.',',')?> VND</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <?php include_once("../../frontend/layout/script.php")?>
</body>
</html>