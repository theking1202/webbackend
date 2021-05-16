<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('../../connectdb.php');
        $ngaygh=$_POST['date'];
        $giogh=$_POST['time'];
        $tenNhan=$_POST['tenNhan'];
        $sdtNhan=$_POST['sdtNhan'];
        $tenMua=$_POST['tenMua'];
        $sdtMua=$_POST['sdtMua'];
        $t=$_POST['province'];
        $h=$_POST['district'];
        $x=$_POST['ward'];
        
        $conn1=mysqli_connect("localhost","root","","diachi");
        $sqlTinh = "SELECT * FROM province WHERE provinceid='$t'";
        $resultTinh=mysqli_query($conn1,$sqlTinh);
        $tinh=mysqli_fetch_array($resultTinh);
        $tinh1=', '.$tinh['name'];

        $sqlHuyen = "SELECT * FROM district WHERE districtid='$h'";
        $resultHuyen=mysqli_query($conn1,$sqlHuyen);
        $huyen=mysqli_fetch_array($resultHuyen);
        $huyen1=', '.$huyen['name'];

        $sqlXa = "SELECT * FROM ward WHERE wardid='$x'";
        $resultXa=mysqli_query($conn1,$sqlXa);
        $xa=mysqli_fetch_array($resultXa);
        $xa1=', '.$xa['name'];


        $diachiNhan = htmlentities($_POST['diachiNhan'].$xa1.$huyen1.$tinh1);
    ?>
    <?php include_once('../../frontend/layout/headersmall.php')?>
    <div class="container-fluid" style="background-color:lavender">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table" style="text-align: center;background-color:lavender">
                    <tr>
                        <td ><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" ></i><br>1.Giỏ hàng</td>
                        <td><i class="fa fa-user fa-2x" aria-hidden="true" ></i> <br> 2.Chi tiết đơn hàng</td>
                        <td><i class="fa fa-credit-card fa-2x" aria-hidden="true" style="color: indianred;"></i> <br> 3.Thanh toán</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="container mt-3" style="background-color: white;">
        <div class="row">
            <div class="col-md-8">
                <form action="" method="POST" name="frmThanhtoan" id="frmThanhtoan">
                    <b>Hình thức thanh toán</b>
                    <table style="width: 100%;">
                        <?php
                            $sqlTT="SELECT * FROM hinhthucthanhtoan";
                            $resultTT=mysqli_query($conn,$sqlTT);
                            $HTTT=[];
                            while($row=mysqli_fetch_array($resultTT, MYSQLI_ASSOC)){
                                $HTTT[] = array(
                                    $httt_ma=$row['httt_ma'],
                                    $httt_ten=$row['httt_ten'],
                                );
                            }
                        ?>
                        <select name="" id="">
                            <?php foreach($row as $tt):?>
                                <option value=""><?=$tt['httt_ten']?></option>
                            <?php endforeach;?>
                        </select>
                    </table><br>
                    
                    
                    <div style="margin-top:20px;">
                        <a href="giohang.php" >Trở lại giỏ hàng</a>
                    </div>
                    <div class="div" style="text-align:right;">
                        <button name="btnNext" class="btn btn-primary mb-3" style="text-align:right;">Tiếp Tục</button>
                    </div>
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
                <h6>ĐỊA CHỈ GIAO HÀNG</h6><br>
                <table class="table" >
                    <tr>
                        <td>
                            Thông tin người gửi
                        </td>
                        <td style="text-align: right;"> <b><?=$tenMua?> <br> <?=$sdtMua?></b> </td>
                    </tr>
                    <tr>
                        <td>Thông tin người nhận</td>
                        <td style="text-align: right;"> <b><?=$tenNhan?></b> <br> <?=$sdtNhan?> <br> <?=$diachiNhan?> </td>
                    </tr>
                </table>
                <h6>SẢN PHẨM</h6>
                <table class="table">
                <?php
                    $tongtien=0;
                    foreach($_SESSION['gioHang'] as $sp){
                        $thanhtien=$sp['soluong']*$sp['gia'];
                        $tongtien+=$thanhtien;
                ?>
                    <tr>
                        <td><?=$sp['ten']?> x <?=$sp['soluong']?></td>
                        <td style="text-align: right;"> <b><?=number_format($thanhtien,'0','.',',')?></b></td>
                    </tr>
                    <?php }?>
                    <tr>
                        <td>Tổng thành tiền</td>
                        <td style="text-align: right;"> <b><?=number_format($tongtien,'0','.',',')?></b></td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row">
            
        </div>
    </div>
</body>
</html>