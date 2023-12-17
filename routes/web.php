<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\LoaiSanPhamController;
    use App\Http\Controllers\SanPhamController;
    use App\Http\Controllers\TinhTrangController;
    use App\Http\Controllers\DonHangController;
    use App\Http\Controllers\DonHangChiTietController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\KhachHangController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\NhaCungCapController;

    // Đăng ký, đăng nhập, Quên mật khẩu
    Auth::routes();

    Route::get('/login/google', [HomeController::class, 'getGoogleLogin'])->name('google.login');
    Route::get('/login/google/callback', [HomeController::class, 'getGoogleCallback'])->name('google.callback');

    // Các trang dành cho khách chưa đăng nhập
    Route::name('frontend.')->group(function() {
        // Trang chủ
        Route::get('/', [HomeController::class, 'getHome'])->name('home');
        Route::get('/home', [HomeController::class, 'getHome'])->name('home');
        // Trang sản phẩm
        Route::get('/san-pham', [HomeController::class, 'getSanPham'])->name('sanpham');
        Route::get('/san-pham/{tenloai_slug}', [HomeController::class, 'getSanPham'])->name('sanpham.phanloai');
        Route::get('/san-pham/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('sanpham.chitiet');
        // Tin tức
        Route::get('/bai-viet', [HomeController::class, 'getBaiViet'])->name('baiviet');
        Route::get('/bai-viet/{tenchude_slug}', [HomeController::class, 'getBaiViet'])->name('baiviet.chude');
        Route::get('/bai-viet/{tenchude_slug}/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('baiviet.chitiet');
        // Trang giỏ hàng
        Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('giohang');
        Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('giohang.them');
        Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('giohang.xoa');
        Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('giohang.giam');
        Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('giohang.tang');
        Route::post('/gio-hang/cap-nhat', [HomeController::class, 'postGioHang_CapNhat'])->name('giohang.capnhat');
        // Tuyển dụng
        Route::get('/tuyen-dung', [HomeController::class, 'getTuyenDung'])->name('tuyendung');
        // Liên hệ
        Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('lienhe');
    });

    // Trang khách hàng
    Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('user.dangky');
    Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('user.dangnhap');

    // Trang tài khoản khách hàng
    Route::prefix('khach-hang')->name('user.')->group(function() {
        // Trang chủ
        Route::get('/', [KhachHangController::class, 'getHome'])->name('home');
        Route::get('/home', [KhachHangController::class, 'getHome'])->name('home');
        // Đặt hàng
        Route::get('/dat-hang', [KhachHangController::class, 'getDatHang'])->name('dathang');
        Route::post('/dat-hang', [KhachHangController::class, 'postDatHang'])->name('dathang');

        Route::get('/dat-hang-thanh-cong', [KhachHangController::class, 'getDatHangThanhCong'])->name('dathangthanhcong');
        // Xem và cập nhật trạng thái đơn hàng
        Route::get('/don-hang', [KhachHangController::class, 'getDonHang'])->name('donhang');
        Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang'])->name('donhang.chitiet');
        Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang'])->name('donhang.chitiet');
        // Cập nhật thông tin tài khoản
        Route::get('/ho-so-ca-nhan', [KhachHangController::class, 'getHoSoCaNhan'])->name('hosocanhan');
        Route::post('/ho-so-ca-nhan', [KhachHangController::class, 'postHoSoCaNhan'])->name('hosocanhan');
        // Đăng xuất
        Route::post('/dang-xuat', [KhachHangController::class, 'postDangXuat'])->name('dangxuat');
    });
    // Trang tài khoản quản lý
    Route::prefix('admin')->name('admin.')->group(function() {
                // Trang chủ
                Route::get('/', [AdminController::class, 'getHome'])->name('home');
                Route::get('/home', [AdminController::class, 'getHome'])->name('home');
        // Quản lý Loại sản phẩm
        Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
        Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
        Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
        Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
        Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
        Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');

    
        // Quản lý Sản phẩm
        Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
        Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
        Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
        Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
        Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
        Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
        Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
    
        // Quản lý Tình trạng
        Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
        Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
        Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
        Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
        Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
        Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');



        //QuanLy nhacungcap
        Route::get('/nhacungcap', [NhaCungCapController::class, 'getDanhSach'])->name('nhacungcap');
        Route::get('/nhacungcap/them', [NhaCungCapController::class, 'getThem'])->name('nhacungcap.them');
        Route::post('/nhacungcap/them', [NhaCungCapController::class, 'postThem'])->name('nhacungcap.them');
        Route::get('/nhacungcap/sua/{id}', [NhaCungCapController::class, 'getSua'])->name('nhacungcap.sua');
        Route::post('/nhacungcap/sua/{id}', [NhaCungCapController::class, 'postSua'])->name('nhacungcap.sua');
        Route::get('/nhacungcap/xoa/{id}', [NhaCungCapController::class, 'getXoa'])->name('nhacungcap.xoa');
    
        // Quản lý Đơn hàng
        Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
        Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
        Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
        Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
        Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
        Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
    
        // Quản lý Đơn hàng chi tiết
        Route::get('/donhang/chitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
        Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
        Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
        Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');
    
        // Quản lý Tài khoản người dùng
        Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung');
        Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them');
        Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them');
        Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua');
        Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua');
        Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getXoa'])->name('nguoidung.xoa');
    });