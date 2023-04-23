<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Thông tin đơn hàng</h2>
					<ul class="text-left">
						<li><a href="index.php?act=home">Trang chủ</a></li>
						<li><span> // </span>Hóa đơn</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- My account content section start -->
<section class="pages my-account-page section-padding">
<div class="container mt-5">
    <h3 class="text-center mb-4">Danh sách hóa đơn</h3>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Mã HD</th>
                <th scope="col">Ngày lập</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td class="text-center"><?= $row['MaHD'] ?></td>
                    <td class="text-center"><?= $row['NgayLap'] ?></td>
                    <td class="text-center"><?= $row['DiaChi'] ?></td>
                    <td class="text-center"><?= number_format($row['TongTien']) ?> đ</td>
					<td class="text-center">
						<?php if ($row['TrangThai']): ?>
							<span class="btn btn-success btn-md" style="pointer-events: none;">ĐÃ THANH TOÁN</span>
						<?php else: ?>
							<a href="?act=checkout&xuli=pay&MaHD=<?=$row["MaHD"]?>" class="btn btn-warning btn-md">Chưa thanh toán</a>
						<?php endif; ?>
					</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</section>
<!-- my account content section end -->