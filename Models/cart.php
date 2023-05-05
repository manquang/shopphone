<?php
require_once("model.php");
class Cart extends Model
{
    function detail_sp($id)
    {
        $query =  "SELECT * from SanPham where MaSP = $id ";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }


    function add_db($id, $MaND)
    {
        $query =  "SELECT * from giohang where MaND = $MaND AND MaSP = $id";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng của người dùng,
            // thì tăng số lượng sản phẩm lên 1 đơn vị
            $row = $result->fetch_assoc();
            $quantity = $row["quantity"] + 1;
            $sql = "UPDATE giohang SET quantity = $quantity where MaND = $MaND AND MaSP = $id";
            $result = $this->conn->query($sql);
            return $result;
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng của người dùng,
            // thì thêm sản phẩm vào giỏ hàng với số lượng là 1
            $sql = "INSERT INTO giohang (MaND, MaSP, quantity) VALUES ($MaND, $id, 1)";
            $result = $this->conn->query($sql);
            return $result;
        }
    }
    function delete_db($id, $MaND)
    {
        $sql = "UPDATE giohang SET quantity = quantity - 1 where MaND = $MaND AND MaSP = $id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Giảm số lượng sản phẩm trong giỏ hàng thành công";
        } else {
            echo "Lỗi: " . conn->error;
        }
    }
    function delete_all_db($id, $MaND)
    {
        $sql = "DELETE FROM giohang WHERE MaND = $MaND AND MaSP = $id";
        if ($this->conn->query($sql) === TRUE) {
            echo "Xóa sản phẩm trong giỏ hàng thành công";
        } else {
            echo "Lỗi: " . conn->error;
        }
    }
}