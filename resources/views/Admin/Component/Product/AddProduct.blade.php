
<div class="container">
<div class="row">
		<div class="col-12">
			<!-- Page title -->
			<h4>Thêm mới sản phẩm</h4>
            <hr>
			<!-- Form START -->
			<form class="file-upload" method="POST" action="{{ route('admin.storeproduct') }}" enctype="multipart/form-data">
				@csrf
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
							<input type="hidden" name="id" value="<?= $sp['id'] ?>">
								<div class="col-md-6">
									<label class="form-label">Mã danh mục:</label>
									<div class="form-control" readonly><?= $sp['category_code'] ?></div>
								</div>
								<div class="col-md-6">
									<label class="form-label">Tên danh mục</label>
									<div class="form-control" readonly><?= $sp['name'] ?></div>
								</div>
								<div class="col-md-6">
									<label class="form-label">Thương hiệu</label>
									<input name="brand" type="text" class="form-control" placeholder="">
								</div>
								<div class="col-md-6">
									<label class="form-label">Mã sản phẩm</label>
									<input name="product_code" type="text" class="form-control" placeholder="">
								</div>
								<div class="col-md-6">
									<label class="form-label">Id danh mục:</label>
									<input class="form-control" readonly value="<?= $sp['id'] ?>" name="category_id">
								</div>
								<div class="col-md-6">
									<label class="form-label">Tên sản phẩm</label>
									<input name="name" type="text" class="form-control">
								</div>
								<div class="col-md-6">
								    <label class="form-label">Giá thành</label>
								    <input name="price" type="number" class="form-control" placeholder="" min="100000" value="100000">
								</div>
								<div class="col-md-6">
								  <label class="form-label">Tiêu đề</label>
								  <textarea name="description" class="form-control" placeholder=""></textarea>
								</div>
								<div class="col-md-6">
									<label class="form-label">Số lượng</label>
									<input name="quantity" type="number" class="form-control" placeholder="" value="0">
								</div>
								<div class="col-md-6">
									<label class="form-label">Ảnh sản phẩm</label>
									<input name="image" type="file" class="form-control" placeholder="">
								</div>
							</div> <!-- Row END -->
						</div>
					</div>
				<div class="gap-3 d-md-flex justify-content-md-center text-center">
					<button type="submit" onclick="return confirm('Xác nhận thêm sản phẩm!')" class="btn btn-primary btn-lg mx-auto d-block">Thêm mới</button>
					<a type="button" href="{{ route('admin.listcate') }}" onclick="return confirm('Xác nhận hủy tiến trình')" class="btn btn-danger btn-lg mx-auto d-block">Hủy</a>
				</div>
				</div> <!-- Row END -->

				<!-- Social media detail -->
				<!-- button -->
			</form> <!-- Form END -->
		</div>
	</div>
	</div>