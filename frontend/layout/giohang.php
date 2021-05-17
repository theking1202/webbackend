<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng | PT Flower</title>
    <link href="../../backend/vendor/jqueryui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <?php include_once('../../frontend/layout/headersmall.php')?>
    <div class="container-fluid" style="background-color:lavender">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table" style="text-align: center;background-color:lavender">
                    <tr>
                        <td ><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="color: indianred;"></i><br>1.Giỏ hàng</td>
                        <td><i class="fa fa-user fa-2x" aria-hidden="true"></i> <br> 2.Chi tiết đơn hàng</td>
                        <td><i class="fa fa-credit-card fa-2x" aria-hidden="true"></i> <br> 3.Thanh toán</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="container" style="background-color:white">
        <div class="row">
            <?php
                include_once('../../connectdb.php');
                if(isset($_SESSION['gioHang'])):
                        
            ?>   
            <table class="table" style="background-color: white;">
                <th>
                    <td>Tên hoa</td>
                    <td>Số lượng</td>
                    <td>Đơn giá</td>
                    <td>Tổng tiền</td>
                </th>
                <?php foreach($_SESSION['gioHang'] as $sp): $tongtien=$sp['soluong']*$sp['gia']?>
                    
                <tr>
                    <td><img src="../../backend/assets/uploads/products/<?=$sp['hinh']?>" style="height: 100px;width:100px"></td>
                    <td><?=$sp['ten']?></td>
                    <td><?=$sp['soluong']?></td>
                    <td><?=number_format($sp['gia'],'0','.',',')?> VND</td>
                    <td><?=number_format($tongtien,'0','.',',')?> VND</td>
                    <td><a href="deleteCart.php?hoa_ma=<?=$sp['hoa_ma']?>"><i class="fa fa-trash fa-2x" aria-hidden="true" style="color: red;"></i></a></td>
                </tr>
                <hr>
                <?php endforeach;?>
            </table>
            <?php 
                else :
                    echo '<p style="text-align:center">Chưa có sản phẩm trong giỏ hàng <a href="index.php">Tiếp tục mua sắm</a></p>';
                
            endif;
            ?>

            
        </div>
    </div>
    <div class="container mt-3" style="background-color: white;">
        <form action="chitietdonhang.php" method="POST" name="frmChitiet" id="frmChitiet">
            <div class="row">
                    <div class="col-md-6" style="text-align: left;">                
                        <label for="date">Chọn ngày giao hàng: </label><br/>
                        <input class="form-control" type="text" name="date" id="date"  style="width: 250px;" require>
                    <a href="index.php" class="mt-3" style="text-align: left;">Trở lại cửa hàng</a>
                    </div>
                    <div class="col-md-6" >
                        <label for="time">Chọn giờ giao hàng: </label> <br/>
                        <select class="form-control" name="time" id="time" style="width: 250px;" require>
                            <option value="9-12">9-12</option>
                            <option value="12-15">12-15</option>
                            <option value="15-18">15-18</option>
                        </select>
                        <div class="div" style="text-align:right;">
                            <button name="btnTT" class="btn my-3 btn-primary" style="text-align:right;">Tiếp Tục</button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <script>
    // Yêu cầu JQUERY UI thay thế INPUT text có id="txtNgayThangNamSinh" thành công cụ chọn ngày tháng Date Picker
    $('#date').datepicker(
      {
        showButtonPanel: true,    // option hiển thị nút "Today", "Done"
        dateFormat: 'dd/mm/yy'    // option Định dạng format ngày tháng; d: Day Ngày; m: Month tháng; y: Year năm
      }
    );
  </script>
</body>
</html>