<?php
        if(isset($_POST['btnDH'])){
            $ngaygh=$_POST['ngaygh'];
            $giogh=$_POST['giogh'];
            $ngay_gh=$ngaygh.$giogh;
            $ngaylap=date("Y-m-d H:i:s");
            $tenNhan=$_POST['tenNhan'];
            $sdtNhan=$_POST['sdtNhan'];
            $tenMua=$_POST['tenMua'];
            $sdtMua=$_POST['sdtMua'];
            $diachiNhan=$_POST['diachiNhan'];
            $httt_ma=$_POST['httt'];
            include_once('../../connectdb.php');
            $sqlInsertDonHang = "INSERT INTO `dondathang` (`dh_ngaylap`, `dh_ngaygiao`, `dh_noigiao`, `httt_ma`, `tenkhachhang` , `sodienthoaimua` , `tennguoinhan` , `sodienthoainhan`) VALUES ('$ngaylap', '$ngay_gh.', N'$diachiNhan', '$httt_ma', '$tenMua', '$sdtMua' , '$tenNhan', '$sdtNhan')";

            mysqli_query($conn, $sqlInsertDonHang);
            $dh_ma = $conn->insert_id;

            foreach($_SESSION['gioHang'] as $hoa){
                $hoa_ma=$hoa['hoa_ma'];
                $soluong=$hoa['soluong'];
                $gia=$hoa['gia'];
                $sqlInsertSanPhamDonDatHang = "INSERT INTO `hoa_dondathang` (`hoa_ma`, `dh_ma`, `hoa_dh_soluong`, `hoa_dh_dongia`) VALUES ($hoa_ma, $dh_ma, $soluong, $gia)";
                mysqli_query($conn, $sqlInsertSanPhamDonDatHang);
            }
        }
    ?>