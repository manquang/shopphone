<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Order Complete</h2>
					<ul class="text-left">
						<li><a href="index.php?act=home">Trang chủ</a></li>
						<li><span> // </span>HOÀN THÀNH ĐƠN HÀNG</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- order-complete content section start -->
<section class="pages checkout order-complete section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<div class="complete-title">
					<p>Cảm ơn bạn. Đơn đặt hàng của bạn đã được nhận.</p>
					<p><a href="?act=checkout&xuli=pay&MaHD=<?=$data[0]["MaHD"]?>" >Vui Lòng Thanh Toán</a></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<div class="order-details padding60">
					<div class="log-title">
						<h3><strong>CHI TIẾT KHÁCH HÀNG</strong></h3>
					</div>
					<div class="por-dse clearfix">
						<ul>
							<li><span>Tên KH:<strong>:</strong></span> <?php echo $_SESSION['login']['Ho']. " " .$_SESSION['login']['Ten']?></li>
							<li><span>Email<strong>:</strong></span> <?=$_SESSION['login']['Email']?></li>
							<li><span>Số ĐT<strong>:</strong></span> <?=$_SESSION['login']['SDT']?></li>
						</ul>
					</div>
				</div>

			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="order-address bill padding60">
					<div class="log-title">
						<h3><strong>THÔNG TIN THANH TOÁN</strong></h3>
					</div>
					<p><?=$_SESSION['login']['DiaChi']?></p>
					<p>Phone: <?=$_SESSION['login']['SDT']?></p>
					<p>Email: <?=$_SESSION['login']['Email']?></p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- order-complete content section end -->