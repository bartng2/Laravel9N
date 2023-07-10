
<div class="container">
<div class="row">
		<div class="col-12">
			<!-- Page title -->
			<h4>Thêm mới sản phẩm</h4>
            <hr>
			<!-- Form START -->
			<form class="file-upload" method="GET" action="{{ route('admin.editproduct', $sp['id']) }}" enctype="multipart/form-data">
				@csrf
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
							<input type="hidden" name="id" value="<?= $sp['id'] ?>">
								<div class="col-md-6">
									<label class="form-label">Mã sản phẩm</label>
									<input name="product_code" readonly value="<?= $sp['product_code'] ?>" type="text" class="form-control" placeholder="">
								</div>
								<div class="col-md-6">
									<label class="form-label">Tên sản phẩm</label>
									<input name="name" readonly value="<?= $sp['name'] ?>" type="text" class="form-control">
								</div>
								<div class="col-md-6">
									<label class="form-label">Thương hiệu</label>
									<input name="brand" readonly value="<?= $sp['brand'] ?>" type="text" class="form-control">
								</div>
								<div class="col-md-6">
									<label class="form-label">Giá thành</label>
									<input name="price" readonly value="<?= $sp['price'] ?>" type="number" class="form-control" placeholder="" min="100000"> 
								</div>
								<div class="col-md-6">
								  <label class="form-label">Tiêu đề</label>
								  <textarea name="description" readonly class="form-control" placeholder=""><?= $sp['description'] ?></textarea>
								</div>
								<div class="col-md-6">
									<label class="form-label">Số lượng</label>
									<input name="quantity" readonly value="<?= $sp['quantity'] ?>" type="number" class="form-control" placeholder="">
								</div>
							</div> <!-- Row END -->
						</div>
					</div>
					<div class="col-xxl-4">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-1">
								<div class="text-center">
									<div>
									
										<img height="300" src="{{ asset('storage/'.$sp['image']) }}">
		                          	
									</div>
								</div>
							</div>
						</div>
					</div>
				<div class="gap-3 d-md-flex justify-content-md-center text-center">
					<button type="submit" onclick="return confirm('Đến trang cập nhật sản phẩm!')" class="btn btn-primary btn-lg mx-auto d-block">Cập nhật</button>
					<a type="button" href="{{ route('admin.listproduct') }}" class="btn btn-danger btn-lg mx-auto d-block">Quay lại</a>
				</div>
				</div> <!-- Row END -->

				<!-- Social media detail -->
				<!-- button -->
			</form> <!-- Form END -->
		</div>
	</div>
	</div>