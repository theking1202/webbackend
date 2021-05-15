<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asd</title>
</head>
<body>
    <?php include_once('../../frontend/layout/headersmall.php')?>
    <div class="container-fluid" style="background-color:lavender">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table" style="text-align: center;background-color:lavender">
                    <tr>
                        <td ><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i><br>1.Giỏ hàng</td>
                        <td><i class="fa fa-user fa-2x" aria-hidden="true" style="color: indianred;"></i> <br> 2.Chi tiết đơn hàng</td>
                        <td><i class="fa fa-credit-card fa-2x" aria-hidden="true"></i> <br> 3.Thanh toán</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
                <?php
                    include_once('../../connectdb.php');
                    $ngaygh=$_POST['date'];
                    $giogh=$_POST['time'];
                ?>
    <div class="container mt-3" style="background-color: white;">
        <div class="row">
            <div class="col-md-8">
                <form action="thanhtoan.php" method="POST" name="frmThanhtoan" id="frmThanhtoan">
                    <label for="">Thông tin đơn hàng:</label>
                    <table style="width: 100%;">
                        <tr>
                            <td>
                                <label for="tenNhan">Họ Tên</label><br>
                                <input type="text" name="tenNhan" id="tenNhan" class="form-control">
                            </td>
                            <td>
                                <label for="sdtNhan">Số điện thoại</label><br>
                                <input type="text" name="sdtNhan" id="sdtNhan" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="diachiNhan">Địa chỉ</label>
                                <?php include_once('../../backend/functions/diachi/index.php')?>
                                <input type="text" name="diachiNhan" id="diachiNhan"class="form-control" placeholder="Số nhà, tên đường,..">
                            </td>
                        </tr>
                    </table><br>
                    <b class="mt-5">Thông tin người đặt hàng</b>
                    <table style="width: 100%;" >
                        <tr>
                            <td>
                                <label for="tenMua">Họ Tên</label><br>
                                <input type="text" name="tenMua" id="tenMua" class="form-control">
                            </td>
                            <td>
                                <label for="sdtMua">Số điện thoại</label><br>
                                <input type="text" name="sdtMua" id="sdtMua" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="date" id="date" value="<?=$ngaygh?>">
                    <input type="hidden" name="date" id="date" value="<?=$giogh?>">
                </form>
            </div>
            <div class="col-md-4">
                <h6>THÔNG TIN GIAO HÀNG</h6><br>
                <table class="table">
                    <tr>
                        <td>
                            Ngày giao hàng
                        </td>
                        <td> <b><?=$ngaygh?></b> </td>
                    </tr>
                    <tr>
                        <td>Giờ giao hàng</td>
                        <td> <b><?=$giogh?></b></td>
                    </tr>
                </table>
                <h6>SẢN PHẨM</h6>
                <table class="table">
                <?php
                    foreach($_SESSION['gioHang'] as $sp){
                        $tongtien=$sp['soluong']*$sp['gia'];
                ?>
                    <tr>
                        <td><?=$sp['ten']?>x<?=$sp['soluong']?></td>
                        <td style="text-align: right;"> <b><?=number_format($tongtien,'0','.',',')?></b></td>
                    </tr>
                    <?php }?>
                </table>

            </div>
        </div>
    </div>

</body>
</html>