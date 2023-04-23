<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Giỏ Hàng</h2>
					<ul class="text-left">
						<li><a href="?act=home">Trang chủ</a></li>
						<li><span> // </span>Giỏ Hàng</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- cart content section start -->
<section class="pages cart-page section-padding">
	<div class="container">
	<?php if (isset($_SESSION['sanpham'])) { ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive padding60">
					<table class="wishlist-table text-center" id="dxd">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
								<th>Xóa</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_SESSION['sanpham'])) {
								foreach ($_SESSION['sanpham'] as $value) { ?>
									<tr>
										<td class="td-img text-left">
											<a href="?act=detail&id=<?= $value['MaSP'] ?>"><img src="public/<?= $value['HinhAnh1'] ?>" alt="Add Product" /></a>
											<div class="items-dsc">
												<h5><a href="?act=detail&id=<?= $value['MaSP'] ?>"><?= $value['TenSP'] ?></a></h5>
											</div>
										</td>
										<td><?= number_format($value['DonGia']) ?> VNĐ</td>
										<td>
											<form action="" method="POST">
												<div class="plus-minus">
													<a href="?act=cart&xuli=delete&id=<?=$value['MaSP']?>" class="dec qtybutton" type="button">-</a>
													<b class="plus-minus-box"><?= $value['SoLuong'] ?></b>
													<a href="?act=cart&xuli=update&id=<?=$value['MaSP']?>" class="inc qtybutton" type="button">+</a>
												</div>
											</form>
										</td>
										<td>
											<strong><?= number_format($value['ThanhTien']) ?> VNĐ</strong>
										</td>
										<td><a href="?act=cart&xuli=deleteall&id=<?= $value['MaSP'] ?>"><i class="mdi mdi-close" title="Remove this product"></i></a></td>
									</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row margin-top">
			<div class="col-sm-6">
				<div class="single-cart-form padding60">
					<div class="log-title">
						<h3><strong>Chi tiết đơn hàng</strong></h3>
					</div>
					<div class="cart-form-text pay-details table-responsive custom-input">
						<form class="form-horizontal" action="?act=checkout&xuli=save" method="post">
							<div class="form-group">
								<label class="col-sm-4 control-label">Tổng Giỏ Hàng</label>
								<div class="col-sm-8 text-right">
									<p class="form-control-static"><?= number_format($count) ?> VNĐ</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Giảm giá</label>
								<div class="col-sm-8 text-right">
									<p class="form-control-static">0%</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Vận Chuyển</label>
								<div class="col-sm-8 text-right">
									<p class="form-control-static">15,000 VNĐ</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Vat</label>
								<div class="col-sm-8 text-right">
									<p class="form-control-static">0 VNĐ</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Tổng tiền</label>
								<div class="col-sm-8 text-right">
									<p class="form-control-static"><?=number_format($count+15000)?> VNĐ</p>
								</div>
							</div>
							<div class="form-group">
								<label for="NguoiNhan" class="col-sm-4 control-label">Người nhận</label>
								<div class="col-sm-8">
									<input type="text" name="NguoiNhan" class="form-control" id="NguoiNhan" placeholder="Người nhận" required value="<?php echo $_SESSION['login']['Ho']." ".$_SESSION['login']['Ten']  ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="Email" class="col-sm-4 control-label">Địa chỉ Email</label>
								<div class="col-sm-8">
									<input type="email" name="Email" class="form-control" id="Email" placeholder="Địa chỉ Email.." required  value="<?=$_SESSION['login']['Email']?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="SDT" class="col-sm-4 control-label">Số điện thoại</label>
								<div class="col-sm-8">
									<input type="text" name="SDT" class="form-control" id="SDT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10"  value="<?=$_SESSION['login']['SDT']?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="DiaChi" class="col-sm-4 control-label">Địa chỉ giao hàng</label>
								<div class="col-sm-8">
									<input type="text" name="DiaChi" class="form-control" id="DiaChi" placeholder="Địa chỉ giao hàng" required  value="<?=$_SESSION['login']['DiaChi']?>"/>
								</div>
							</div>
							<div class="form-group">
								<div class="submit-text coupon text-right">
									<button type="submit">Đặt hàng</button>
								</div>
							</div>	
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="single-cart-form padding60">
					<div class="log-title">
						<h3><strong>Mã giảm giá</strong></h3>
					</div>
					<div class="cart-form-text custom-input">
						<p>Nhập mã giảm giá nếu bạn có !!</p>
						<form action="" method="post">
							<input type="text" name="subject" placeholder="Nhập mã tại đây..." />
							<div class="submit-text coupon">
								<button type="submit">Áp dụng</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<div class="row">
			<div class="col-xs-12">
				<div class="single-cart-form padding60">
					<h3 class="text-center mb-4">Chưa có sản phẩm.</h3>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</section>
<!-- cart content section end -->