<div class="container">
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/"><b>TRANG CHỦ</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/home/allProduct"><b>TẤT CẢ SẢN PHẨM</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>CÁCH CHỌN GIÀY</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>GIẢM GIÁ</b></a>
                </li>
                <li class="nav-item dropdown" style="color:while;">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Sắp xếp</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/home/sortAscending/Product"><i class='fas fa-sort-amount-up' style='font-size:24px;color:black;'></i><span>Tăng</span></a>
      <a class="dropdown-item" href="/home/sortDescending/Product"><i class='fas fa-sort-amount-down-alt' style='font-size:24px;color:black';></i><span>Giảm</span></a>
    </div>
  </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="#"><b>LIÊN HỆ</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>HỆ THỐNG CỬA HÀNG</b></a>
                </li>
                @if(Auth::user())
                <li class="nav-item active">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#payment"
                        style="height:0.7cm;width:100%;"><b style="color:red;">NẠP TIỀN</b></button>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<!-- The Modal login -->
<div class="modal" id="payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="text-center" style="color:red;margin-left:30%;">NẠP TIỀN</h2>
                <button type="button" class="close" data-dismiss="modal" style="color:red;">X</button>
            </div>
            <!-- Modal body -->
            <form action="/user/addMoney" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="money" id="money" class="form-control" placeholder="Nhập số tiền bạn muốn nạp"
                            aria-describedby="helpId">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" style="width:100%;height:50px;font-size:20px;">NẠP
                        TIỀN</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal" id="useCode">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="text-center" style="color:red;margin-left:30%;">ÁP DỤNG MÃ GIẢM GIÁ</h2>
                <button type="button" class="close" data-dismiss="modal" style="color:red;">X</button>
            </div>
            <!-- Modal body -->
            <form action="/home/userUseCode" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="codes" id="codes" class="form-control" placeholder="Nhập mã giảm giá"
                            aria-describedby="helpId">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" style="width:100%;height:50px;font-size:20px;">ÁP DỤNG</button>
                </div>
            </form>

        </div>
    </div>
</div>
