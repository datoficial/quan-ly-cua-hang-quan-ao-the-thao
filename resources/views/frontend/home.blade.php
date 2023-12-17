@extends('layouts.frontend')
@section('title', 'Trang chủ')
@section('content')

        <section class="container mt-4 mb-grid-gutter">
			<div class="bg-faded-info rounded-3 py-4">
				<div class="row align-items-center">
					<div class="col-md-5">
						<div class="px-4 pe-sm-0 ps-sm-5">
							<span class="badge bg-danger">Khuyến mãi đặc biệt</span>
							<h3 class="mt-4 mb-1 text-body fw-light">Sản phẩm hot</h3>
							<h2 class="mb-1">Bộ quần áo Arsenal</h2>
							<p class="h5 text-body fw-light">Số lượng sản phẩm có hạn!</p>
							<a class="btn btn-accent" href="#">Xem chi tiết<i class="ci-arrow-right fs-ms ms-1"></i></a>
						</div>
					</div>
					<div class="col-md-7"><img src="{{ asset('public/img/offer1.jpg') }}" /></div>
				</div>
			</div>
		</section>
	
		@foreach($loaisanpham as $value)
		<section class="container pt-3 pb-5">
			<div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
				<h2 class="h3 mb-0 pt-3 me-2">{{$value -> tenloai}}</h2>
				<div class="pt-3">
					<a class="btn btn-outline-accent btn-sm" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $value->tenloai_slug]) }}">
						Xem tất cả<i class="ci-arrow-right ms-1 me-n1"></i>
					</a>
				</div>
			</div>
			<div class="row pt-2 mx-n2">
				@foreach($value->SanPham->take(8) as $sp)
				<div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
					<div class="card product-card">
						<a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
							<img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" style="width: 400px; height: 300px;" />
						</a>
						<div class="card-body py-2">
							<a class="product-meta d-block fs-xs pb-1" href="#">{{ $value->tenloai }}</a>
							<h3 class="product-title fs-sm">
								<a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $value->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{ $sp->tensanpham }}</a>
							</h3>
							<div class="d-flex justify-content-between">
								<div class="product-price">
									<span class="text-accent">{{ number_format($sp->dongia, 0, ',', '.') }}<small>đ</small></span>
								</div>
								<div class="star-rating">
									<i class="star-rating-icon ci-star-filled active"></i>
									<i class="star-rating-icon ci-star-filled active"></i>
									<i class="star-rating-icon ci-star-filled active"></i>
									<i class="star-rating-icon ci-star-filled active"></i>
									<i class="star-rating-icon ci-star"></i>
								</div>
							</div>
						</div>
						<div class="card-body card-body-hidden">
							<a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}">
								<i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
							</a>
						</div>
					</div>
					<hr class="d-sm-none">
				</div>

				@endforeach
			</div>
		</section>
		@endforeach
@endsection
