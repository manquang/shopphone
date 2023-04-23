<?php
require_once("Models/checkout.php");
class CheckoutController
{
    var $checkout_model;
    public function __construct()
    {
        $this->checkout_model = new Checkout();
    }
    function list()
    {
        if (isset($_SESSION['login'])) {
            $data_danhmuc = $this->checkout_model->danhmuc();

            $data_chitietDM = array();

            for ($i = 1; $i <= count($data_danhmuc); $i++) {
                $data_chitietDM[$i] = $this->checkout_model->chitietdanhmuc($i);
            }

            $count = 0;
            if (isset($_SESSION['sanpham'])) {
                foreach ($_SESSION['sanpham'] as $value) {
                    $count += $value['ThanhTien'];
                }
            }
            require_once('Views/index.php');
        } else {
            header('location: ?act=taikhoan');
        }
    }
    function pay($id)
    {
        if (isset($_SESSION['login'])) {
            $data_danhmuc = $this->checkout_model->danhmuc();

            $data_chitietDM = array();

            for ($i = 1; $i <= count($data_danhmuc); $i++) {
                $data_chitietDM[$i] = $this->checkout_model->chitietdanhmuc($i);
            }
            $count = 0;
            $result = $this->checkout_model->pay($id);
            $data = $result->sanpham;
            $diachi = $result->diachi;

            if ($data) {
                if ($result->status) {
                    header('location: ?act=taikhoan&xuli=bill');
                }
                else {
                    foreach ($data as $item) {
                        $count += $item['SoLuong'] * $item['DonGia'];
                    }
                }
            }
             // $test = $data[0]["TenSP"];
            
        } else {
            header('location: ?act=taikhoan');
        }
        require_once('Views/index.php');
    }
    function  save()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');

        $count = 0;
        if (isset($_SESSION['sanpham']) && $_SESSION['sanpham']) {
            foreach ($_SESSION['sanpham'] as $value) {
                $count += $value['ThanhTien'];
            }
        } else {
            header('location: ?act=cart');
        }

        $data = array(
            'MaND' => $_SESSION['login']['MaND'],
            'NgayLap' => $ThoiGian,
            'NguoiNhan' =>    $_POST['NguoiNhan'],
            'SDT' => $_POST['SDT'],
            'DiaChi' => $_POST['DiaChi'],
            'TongTien' => $count,
            'TrangThai'  =>  '0',
        );
        $this->checkout_model->save($data);
        unset($_SESSION['sanpham']);
    }
    function order_complete($id)
    {
        $data_danhmuc = $this->checkout_model->danhmuc();

        $data_chitietDM = array();

        for ($i = 1; $i <= count($data_danhmuc); $i++) {
            $data_chitietDM[$i] = $this->checkout_model->chitietdanhmuc($i);
        }
        $count = 0;
        if (isset($_SESSION['sanpham'])) {
            foreach ($_SESSION['sanpham'] as $value) {
                $count += $value['ThanhTien'];
            }
        }

        $data = $this->checkout_model->hoadon_chitiet($id);
        // $data = $id;
        
        
        require_once('Views/index.php');
    }
    function execute($id, $method, $MaHD) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ThoiGian =  date('Y-m-d H:i:s');

        $data = array(
            'ID' => $id,
            'TgianGiaoDich' => $ThoiGian,
            'MaHD' =>    $MaHD,
            'PhuongthucTT' => $method,
        );
        $this->checkout_model->execute($data);

    }
}
