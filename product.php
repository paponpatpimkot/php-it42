<?php
include_once 'navbar.php';
include_once 'connect.php';
$sql = "SELECT * FROM product";
$result = $con->query($sql);
?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-primary text-white">ข้อมูลสินค้า</div>
    <div class="card-body">
      <a href="add_product.php" class="btn btn-outline-success mb-3">
        <i class="bi bi-person-plus-fill"></i> เพิ่มข้อมูล
      </a>
      <table class="table table-striped">
        <tr>
          <th class="bg-success text-white">รหัสสินค้า</th>
          <th class="bg-success text-white">ชื่อสินค้า</th>
          <th class="bg-success text-white">ราคาสินค้า</th>
          <th class="bg-success text-white">จำนวน</th>
          <th class="bg-success text-white">สถานะ</th>
          <th class="bg-success text-white">Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
          <td><?php echo $row['pro_id']; ?></td>
          <td><?php echo $row['pro_name'] ?></td>
          <td><?php echo $row['pro_price'] ?></td>
          <td><?php echo $row['pro_amount'] ?></td>
          <td><?php 
              if($row['pro_status'] == 1){
                echo "สินค้าพร้อมจำหน่าย";
              }elseif($row['pro_status'] == 2){
                echo "สินค้าหมด";
              }elseif($row['pro_status'] == 3){
                echo "สินค้ายกเลิกจำหน่าย";
              }
            ?></td>
          <td>
            <a href="edit_product.php?pro_id=<?php echo $row['pro_id'] ?>">แก้ไข</a>
            <a href="del_product.php?pro_id=<?php echo $row['pro_id'] ?>"
              onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>
</div>