<?php
require_once("model.php");
class Checkout extends Model
{
  function save($data){
    $f = "";
    $v = "";
    foreach ($data as $key => $value) {
        $f .= $key . ",";
        $v .= "'" . $value . "',";
    }
    $f = trim($f, ",");
    $v = trim($v, ",");
    $query = "INSERT INTO hoadon($f) VALUES ($v);";
    
    $status = $this->conn->query($query);

    $query_mahd = "select MaHD from hoadon ORDER BY NgayLap DESC LIMIT 1";
    $data_mahd = $this->conn->query($query_mahd)->fetch_assoc();

    foreach ($_SESSION['sanpham'] as $value) {
        $MaSP =$value['MaSP'];
        $SoLuong = $value['SoLuong'];
        $DonGia = $value['DonGia'];
        $MaHD = $data_mahd['MaHD'];
        $query_ct = "INSERT INTO chitiethoadon(MaHD,MaSP,SoLuong,DonGia) VALUES ($MaHD,$MaSP,$SoLuong,$DonGia)";

        $status_ct = $this->conn->query($query_ct);
    }
    
    if ($status == true and $status_ct = true) {
        setcookie('msg', 'Đăng ký thành công', time() + 2);
        header('location: ?act=checkout&xuli=order_complete&MaHD=' . $MaHD);

    } else {
        setcookie('msg', 'Đăng ký không thành công', time() + 2);
        header('location: ?act=checkout');
    }
  }
  function pay($id){
    $query = "SELECT sanpham.TenSP, chitiethoadon.SoLuong, chitiethoadon.DonGia
    FROM chitiethoadon
    JOIN sanpham ON chitiethoadon.MaSP = sanpham.MaSP
    WHERE chitiethoadon.MaHD = $id;";
    $resultdata = $this->conn->query($query);
    $data = [];
    while ($row = $resultdata->fetch_assoc()) {
      $data[] = $row;
    }

    $queryadd = "select Diachi,TrangThai from hoadon where MaHD = $id;";
    $resultadd = $this->conn->query($queryadd);
    $add = $resultadd->fetch_assoc();

    $result = new stdClass();
    $result->sanpham = $data;
    $result->diachi = $add['Diachi'];
    $result->status = $add['TrangThai'];

    return $result;
  }
  function execute($data) {
    $f = "";
    $v = "";
    foreach ($data as $key => $value) {
        $f .= $key . ",";
        $v .= "'" . $value . "',";
    }
    $f = trim($f, ",");
    $v = trim($v, ",");
    $query = "INSERT INTO giaodich($f) VALUES ($v);";
    $status = $this->conn->query($query);
  }
}