<h1>Chỉnh sửa loại hoa</h1>
    <?php
        include_once('../../../connectdb.php');
        $ma=$_GET['lh_ma'];
        $sql="SELECT * FROM loaihoa WHERE lh_ma=$ma";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
    ?>
    <form action="" method="POST">
        <label for="lh_ten">Tên loại hoa</label> <br/>
        <input type="text" name="lh_ten" id="lh_ten" value="<?=$row['lh_ten']?>"/> <br/>
        <label for="lh_mota">Mô tả loại hoa</label> <br/>
        <input type="text" name="lh_mota" id="lh_mota" value="<?=$row['lh_mota']?>"/> <br/>
        <button class="btn btn-primary" name="save">Lưu</button>
    </form>
    <?php
        if(isset($_POST['save'])){
            $ten= htmlentities( $_POST['lh_ten']);
            $mota=$_POST['lh_mota'];
            $sql1="UPDATE loaihoa SET lh_ten='$ten' , lh_mota='$mota' WHERE lh_ma=$ma";
            // var_dump($sql1); die;
            $result1=mysqli_query($conn,$sql1);
            header('location: index.php');
        }
    ?>