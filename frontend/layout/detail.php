<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        figure.zoom {
        background-position: 50% 50%;
        position: relative;
        width: 500px;
        overflow: hidden;
        cursor: zoom-in;
        }

        figure.zoom img:hover {
        opacity: 0;
        }

        figure.zoom img {
        transition: opacity 0.5s;
        display: block;
        width: 100%;
        }

    </style>
</head>
<body>
    <?php
        include_once('../../frontend/layout/headersmall.php');
        include_once('../../connectdb.php');
        $hoa_ma=$_GET['hoa_ma'];
        $sql= <<<EOT
        SELECT hoa.hoa_ten, hoa.hoa_mota, hoa.hoa_gia, hoa.hoa_giacu, hsp.hsp_tentaptin
        FROM hoa hoa
        JOIN hinhsanpham hsp ON hoa.hoa_ma=hsp.hoa_ma
        WHERE hoa.hoa_ma=$hoa_ma
EOT;
        $result=mysqli_query($conn,$sql);
        $hoa=mysqli_fetch_array($result);
    ?>
    <div class="container mt-3" style="background-color:white ;">
        <div class="row">
            <div class="col-md-6">
            <figure class="zoom" style="background:url(../../backend/assets/uploads/products/<?=$hoa['hsp_tentaptin']?>)" onmousemove="zoom(event)" ontouchmove="zoom(event)">
                <img src="../../backend/assets/uploads/products/<?=$hoa['hsp_tentaptin']?>" alt="" style="height: 500px;width:500px">
            </figure> 
            </div>
            <div class="col-md-6">
                <h3><?=$hoa['hoa_ten']?></h3> <br/>
                Giá: <s><?=number_format($hoa['hoa_giacu'],'0','.',',')?> VND</s> <br/>
                Giá giảm:<div style="color: pink;font-size: 25px; font-weight:bold"><?=number_format($hoa['hoa_gia'],'0','.',',')?> VND</div>
                <hr>
                <label for="soluong">Số lượng:</label>
                <input type="number" name="soluong" id="soluong">
                <hr>
            </div>
        </div>
    </div>


    <script>
        function zoom(e) {
          var zoomer = e.currentTarget;
          e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
          e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
          x = (offsetX / zoomer.offsetWidth) * 100
          y = (offsetY / zoomer.offsetHeight) * 100
          zoomer.style.backgroundPosition = x + "% " + y + "%";
        }
      </script>
</body>
</html>