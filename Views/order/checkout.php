<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Thanh Toán</h2>
					<ul class="text-left">
						<li><a href="index.php?act=home">Trang chủ</a></li>
						<li><span> // </span>Thanh Toán</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- Checkout content section start -->
<section class="pages checkout section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="main-input single-cart-form padding60">
					<div class="log-title">
						<h3><strong>Thông tin nhận hàng</strong></h3>
					</div>
					<div class="custom-input">
						<form action="./public/xacthucmomo.php" method="post" enctype="application/x-www-form-urlencoded">
							<input type="text" name="NguoiNhan" placeholder="Người nhận" required value="<?php echo $_SESSION['login']['Ho']." ".$_SESSION['login']['Ten']  ?>"readonly/>
							<input type="email" name="Email" placeholder="Địa chỉ Email.." required  value="<?=$_SESSION['login']['Email']?>" readonly/>
							<input type="text" name="SDT" placeholder="Số điện thoại.." required value="<?=$_SESSION['login']['SDT']?>" readonly/>
							<input type="text" name="DiaChi" placeholder="Địa chỉ giao hàng" required  value="<?=$diachi?>" readonly/>
							<input type="hidden" name="tongtien" value="<?=($count + 15000)?>">
							<input type="hidden" name="MaHD" value="<?=$_GET['MaHD'] ?>">
							</br>
							<button type="submit" name="momo" class="btn btn-danger btn-block">Thanh toán qua MOMO </button>
						</form>
					</div> <br>
					<div id="paypal-button-container"></div>
				</div>
			</div>
			<input type="hidden" name="" value="<?php echo number_format(($count + 15000)/23000,2) ?>" id="tongtien">
			<div class="col-xs-12 col-sm-6">
				<div class="padding60">
					<div class="log-title">
						<h3><strong>Hóa đơn</strong></h3>
					</div>
					<div class="cart-form-text pay-details table-responsive">
					<table class="table">
						<thead>
							<tr>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $item) { ?>
								<tr>
									<th><?= $item['TenSP'] ?></th>
									<td><?= $item['SoLuong'] ?></td>
									<td><?= number_format($item['SoLuong'] * $item['DonGia']) ?> VNĐ</td>
								</tr>
							<?php } ?>
							<tr>
									<th>Giảm Giá</th>
									<td></td>
									<td>0%</td>
								</tr>
								<tr>
									<th>Vận Chuyển</th>
									<td></td>
									<td>15,000 VNĐ</td>
								</tr>
								<tr>
									<th>Vat</th>
									<td></td>
									<td>0</td>
								</tr>
						</tbody>
						<tfoot>
								<tr>
									<th>Tổng</td>
									<td></td>
									<td><?= number_format($count + 15000) ?> VNĐ</td>
								</tr>
								
							</tfoot>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Checkout content section end -->