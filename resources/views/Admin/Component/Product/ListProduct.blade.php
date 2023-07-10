 <div class="row">
          <div class="col-md-12">
            <h4>Danh sách sản phẩm</h4>
            <hr>
             <div class="d-flex align-items-center">
              <form class="d-flex" method="GET" action="">
                <input name="keyword" class="form-control me-1 small-input" type="text" placeholder="Tìm kiếm sản phẩm..." aria-label="Search">
                <button class="btn btn-outline-primary small-button" type="submit">Lọc</button>
              </form>
              
            </div>
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
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Số lượng</th>
                        <th>Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=0 ?>
                      @foreach($sp as $item):
                      <tr class="centered-cell">
                        <td><?= ++$i; ?></td>
                        <td><?= $item['product_code'] ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>
                          <form method="POST" action="{{ route('admin.deleteproduct', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                           <a type="button" href="{{ route('admin.showproduct', $item['id']) }}" class="btn btn-primary small-button">Xem</a>
                          <a type="button" href="{{ route('admin.editproduct', $item['id']) }}" class="btn btn-warning small-button">Sửa</a>
                          <button type="submit" onclick="return confirm('Xác nhận xóa sản phẩm!')" class="btn btn-danger small-button">Xóa</button>
                          </form>
                        </td>
                      </tr>
                    </tbody>
                    <?php endforeach; ?>
                    <tfoot>
                      <tr class="centered-cell">
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá thành</th>
                        <th>Số lượng</th>
                        <th>Chức năng</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              </div>
            </div>
          </div>
