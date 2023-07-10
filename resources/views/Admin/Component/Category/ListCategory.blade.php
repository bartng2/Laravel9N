 <div class="row">
          <div class="col-md-12">
            <h4>Danh sách Danh mục sản phẩm</h4>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i>
                </span>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                    <thead>
                      <tr class="centered-cell">
                        <th>STT</th>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; ?>
                      @foreach($cate as $item)
                      <tr class="centered-cell">
                        <td><?= ++$i ?></td>
                        <td><?= $item['category_code'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td>
                          <form action="{{ route('admin.deletecate', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a type="button" href="{{ route('admin.addproduct', $item['id']) }}" class="btn btn-primary small-button">Thêm sản phẩm</a>
                           <a type="button" href="{{ route('admin.editcate', $item['id']) }}" class="btn btn-warning small-button">Sửa</a>
                          <button type="submit" onclick="return confirm('Xác nhận xóa danh mục!')" class="btn btn-danger small-button">Xóa</button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    @endforeach
                    <tfoot>
                      <tr class="centered-cell">
                        <th>STT</th>
                        <th>Mã danh mục</th>
                        <th>Tên danh mục</th>
                        <th>Chức năng</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
