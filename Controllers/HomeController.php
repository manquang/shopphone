<?php
require_once("Models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function list()
    {
        $data_danhmuc = $this->home_model->danhmuc();

        $data_chitietDM = array();

        for($i=1; $i <=count($data_danhmuc);$i++){
            $data_chitietDM[$i] = $this->home_model->chitietdanhmuc($i);
        }

        $data_limit1 = $this->home_model->limit(0,4);
        $data_limit2 = $this->home_model->limit(4,4);
        $data_limit3 = $this->home_model->limit(8,4);
        $data_limit4 = $this->home_model->limit(12,4);
        $data_arr = array($data_limit1,$data_limit2,$data_limit3,$data_limit4);
        $data_random = $this->home_model->random(2);

        $data_banner = $this->home_model->banner(0,2);

        $data_sanpham1 = $this->home_model->sanpham_danhmuc(0,8,1);
        $data_sanpham2 = $this->home_model->sanpham_danhmuc(0,8,2);
        $data_sanpham3 = $this->home_model->sanpham_danhmuc(0,8,3);

        if (isset($_SESSION['isLogin'])) {
            $count = 0;
            if (isset($_SESSION['sanpham']) && !empty($_SESSION['sanpham'])) {
                foreach ($_SESSION['sanpham'] as $value) {
                    $count += $value['ThanhTien'];
                }
            }
            else {
                $_SESSION['sanpham'] = [];
                $list_cart = $this->home_model->get_list_cart($_SESSION['login']['MaND']);
                if ($list_cart != null) {
                    foreach ($list_cart as $cart_item) {
                        $id = $cart_item['MaSP']; // lấy mã sản phẩm
                        $arr['MaSP'] = $cart_item['MaSP'];
                        $arr['TenSP'] = $cart_item['TenSP'];
                        $arr['DonGia'] = $cart_item['DonGia'];
                        $arr['SoLuong'] = $cart_item['quantity'];
                        $arr['ThanhTien'] = $cart_item['DonGia'] * $cart_item['quantity'];
                        $count += $arr['ThanhTien'];
                        $arr['HinhAnh1'] = $cart_item['HinhAnh1'];
                        $_SESSION['sanpham'][$id] = $arr; // lưu vào session theo mã sản phẩm
                    }
                }
            }
        }

        require_once('Views/index.php');
    }
}