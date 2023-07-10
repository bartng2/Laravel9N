
<div class="container">
<div class="row">
		<div class="col-12">
			<!-- Page title -->
			<h4>Thêm mới danh mục sản phẩm</h4>
            <hr>
			<!-- Form START -->
			<form class="file-upload" method="POST" action="{{ route('admin.storecate') }}">
				@csrf
				<div class="row mb-5 gx-5">
					<!-- Contact detail -->
					<div class="col-xxl-8 mb-5 mb-xxl-0">
						<div class="bg-secondary-soft px-4 py-5 rounded">
							<div class="row g-3">
								<!-- First Name -->
								<div class="col-md-6">
									<label class="form-label">Mã danh mục</label>
									<input name="category_code" type="text" class="form-control" placeholder="">
								</div>
								<!-- Last name -->
								<div class="col-md-6">
									<label class="form-label">Tên danh mục</label>
									<input name="name" type="text" class="form-control" placeholder="" aria-label="Last name">
								</div>
							</div> <!-- Row END -->
						</div>
					</div>
				<div class="gap-3 d-md-flex justify-content-md-center text-center">
					<button type="submit" onclick="return confirm('Xác nhận thêm danh mục!')" class="btn btn-primary btn-lg mx-auto d-block">Thêm mới</button>
					<a type="button" onclick="return confirm('Xác nhận hủy tiến trình!')" href="{{ route('admin.listcate') }}" class="btn btn-danger btn-lg mx-auto d-block">Hủy</a>
				</div>
				</div> <!-- Row END -->

				<!-- Social media detail -->
				<!-- button -->
			</form> <!-- Form END -->
		</div>
	</div>
	</div>