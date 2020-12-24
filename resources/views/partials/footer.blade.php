<footer class="page-footer font-small blue pt-4">
    <div class="container">
 <!-- Footer Links -->
 <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase title-footer">Thông tin liên hệ</h5>

        <p><i class="fa fa-map-marker" aria-hidden="true"></i> 404 Lạch tray, Ngô Quyền, Hải Phòng</p>

        <p><i class="fa fa-phone" aria-hidden="true"></i> (024) 3562 5939 - (024) 3562 5940</p>
       <p>Tầng 8, Tòa nhà Xổ số Kiến thiết (Lottery Tower), Số 77 Trần Nhân Tôn, Phường 9, Quận 5, TP. Hồ Chí Minh
        Điện thoại: 0904 893 279
        Văn phòng Quận 1 TP. Hồ Chí Minh
        Lầu 5 Sailing Tower, 111A Pasteur, phường Bến Nghé, Quận 1, TP. Hồ Chí Minh
        Điện thoại: 090 494 6163</p>


      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase title-footer">Danh mục</h5>

        <ul class="list-unstyled">
            @foreach ($categories as $item)
            <li class="mb-2"><i class="fa fa-chevron-right" aria-hidden="true"></i>

                <a class="category-item-footer" href="{{ route('front.category.product',['slug'=>$item->slug]) }}">{{ $item->name }}</a>

            </li>
            @endforeach
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase title-footer">Khu vực</h5>

        <ul class="list-unstyled">
            @foreach ($locations as $item)
            <li class="mb-2"><i class="fa fa-chevron-right" aria-hidden="true"></i>

                <a class="category-item-footer" href="{{ route('front.category.product',['slug'=>$item->slug]) }}">{{ $item->name }}</a>
            </li>
            @endforeach
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

    </div>
<hr>
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright: PTUDWEB

    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
