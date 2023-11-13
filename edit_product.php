<?php
include 'navbar.php';
include 'connect.php';
$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM product WHERE pro_id='$pro_id'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) { // เช็คว่ามีการกดปุ่มหรือยัง
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];
  if ($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');history.back();</script>";
  } else {
    $num = mysqli_num_rows($con->query("SELECT pro_name FROM product WHERE pro_name='$pro_name'"));
    if ($num == 1) {
      echo "<script>alert('ชื่อสินค้านี้มีอยู่แล้ว');history.back();</script>";
    } else {
      $sql = "UPDATE product SET pro_name='$pro_name',pro_price='$pro_price',pro_amount='$pro_amount,
      pro_status='$pro_status'WHERE username='$username'";
      $result = $con->query($sql);
      if (!$result) {
        echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
      } else {
        header('location:product.php');
      }
    }
  } //ปิดเช็คค่าว่าง
} // ปิดเช็คการกดปุ่ม
?>
<div class="container mt-5 w-50">
  <div class="card">
    <div class="card-header bg-primary
     text-white">
      เพิ่มข้อมูลสินค้า
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
          <label class="form-label">ชื่อสินค้า</label>
          <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">ราคาสินค้า</label>
          <input type="text" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">จำนวนสินค้า</label>
          <input type="number" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount'] ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">สถานะ</label>
          <select name="pro_status" class="form-select">
            <option value="<?php echo $row['pro_status'] ?>">
              <?php
              if ($row['pro_status'] == 1) {
                echo "สินค้าพร้อมจำหน่าย";
              } elseif ($row['pro_status'] == 2) {
                echo "สินค้าหมด";
              } elseif ($row['pro_status'] == 3) {
                echo "สินค้ายกเลิกจำหน่าย";
              }
              ?>
            </option>
            <option value="1">สินค้าพร้อมจำหน่าย</option>
            <option value="2">สินค้าหมด</option>
            <option value="3">สินค้ายกเลิกจำหน่าย</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">
          บันทึกข้อมูล</button>
      </form>
    </div>
  </div>
</div>