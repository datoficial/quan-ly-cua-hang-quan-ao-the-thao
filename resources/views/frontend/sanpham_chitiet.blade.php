@extends('layouts.frontend')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="page-title-overlap bg-dark pt-4">
			<div class="container d-lg-flex justify-content-between py-2 py-lg-3">
				<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
							<li class="breadcrumb-item">
								<a class="text-nowrap" href="{{route('frontend.home')}}"><i class="ci-home"></i>Trang chủ</a>
							</li>
							<li class="breadcrumb-item text-nowrap">
								<a href="">Sản phẩm</a>
							</li>
							<li class="breadcrumb-item text-nowrap active" aria-current="page">Chi tiết</li>
						</ol>
					</nav>
				</div>
				<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
					<h1 class="h3 text-light mb-0">{{$sanpham->tensanpham}}</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="bg-light shadow-lg rounded-3 px-4 py-3 mb-5">
				<div class="px-lg-3">
					<div class="row">
						<div class="col-lg-7 pe-lg-0 pt-lg-4">
							<div class="product-gallery">
								<div class="product-gallery-preview order-sm-2">
									<div class="product-gallery-preview-item active" id="first" align="center">
										<img class="image-zoom" src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" data-zoom="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" style="width:500px; height:500px;"/>
										<div class="image-zoom-pane"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 pt-4 pt-lg-0">
							<div class="product-details ms-auto pb-3">
								<div class="d-flex justify-content-between align-items-center mb-2">
									<a href="#reviews" data-scroll>
										<div class="star-rating">
											<i class="star-rating-icon ci-star-filled active"></i>
											<i class="star-rating-icon ci-star-filled active"></i>
											<i class="star-rating-icon ci-star-filled active"></i>
											<i class="star-rating-icon ci-star-filled active"></i>
											<i class="star-rating-icon ci-star"></i>
										</div>
										<span class="d-inline-block fs-sm text-body align-middle mt-1 ms-1">74 đánh giá</span>
									</a>
								</div>
								<div class="mb-3">
									<span class="h3 fw-normal text-accent me-1">{{ number_format($sanpham->dongia, 0, ',', '.') }}<small>đ</small></span>
                                    <p>Số sản phẩm còn lại: {{$sanpham->soluong}}</p>
								</div>
								<form class="mb-grid-gutter" method="post">
									<div class="mb-3 d-flex align-items-center">
										<select class="form-select me-3" style="width:5rem;">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
										<a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}">
								<i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
							</a>
									</div>
								</form>
								<div class="accordion mb-4" id="productPanels">
									<div class="accordion-item">
										<h3 class="accordion-header">
											<a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo">
												<i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Khuyến mãi
											</a>
										</h3>
										<div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
											<div class="accordion-body">
                                            <p>Chào mừng mùa lễ hội! Chúng tôi rất vui được thông báo về chương trình khuyến mãi hấp dẫn cho bạn:</p>
        <ul>
            <li>Giảm giá 20% cho tất cả các sản phẩm trong ngày Black Friday.</li>
            <li>Miễn phí vận chuyển cho đơn hàng từ 1.000.000 VNĐ trở lên.</li>
            <li>Ưu đãi đặc biệt cho các sản phẩm mới trong tháng này.</li>
        </ul>
        <p>Hãy nhanh tay đặt hàng để không bỏ lỡ cơ hội này!</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="border-top my-lg-3 py-5">
			<div class="container pt-md-2" id="reviews">
				<div class="row pb-3">
					<div class="col-lg-4 col-md-5">
						<h2 class="h3 mb-4">74 đánh giá</h2>
						<div class="star-rating me-2">
							<i class="ci-star-filled fs-sm text-accent me-1"></i>
							<i class="ci-star-filled fs-sm text-accent me-1"></i>
							<i class="ci-star-filled fs-sm text-accent me-1"></i>
							<i class="ci-star-filled fs-sm text-accent me-1"></i>
							<i class="ci-star fs-sm text-muted me-1"></i>
						</div>
						<span class="d-inline-block align-middle">4.1 điểm</span>
						<p class="pt-3 fs-sm text-muted">58 trong tổng số 74 (77%)<br>Khách hàng đã đề nghị mua sản phẩm này.</p>
					</div>
					<div class="col-lg-8 col-md-7">
						<div class="d-flex align-items-center mb-2">
							<div class="text-nowrap me-3">
								<span class="d-inline-block align-middle text-muted">5</span>
								<i class="ci-star-filled fs-xs ms-1"></i>
							</div>
							<div class="w-100">
								<div class="progress" style="height:4px;">
									<div class="progress-bar bg-success" role="progressbar" style="width:60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<span class="text-muted ms-3">43</span>
						</div>
						<div class="d-flex align-items-center mb-2">
							<div class="text-nowrap me-3">
								<span class="d-inline-block align-middle text-muted">4</span>
								<i class="ci-star-filled fs-xs ms-1"></i>
							</div>
							<div class="w-100">
								<div class="progress" style="height:4px;">
									<div class="progress-bar" role="progressbar" style="width:27%; background-color:#a7e453;" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<span class="text-muted ms-3">16</span>
						</div>
						<div class="d-flex align-items-center mb-2">
							<div class="text-nowrap me-3">
								<span class="d-inline-block align-middle text-muted">3</span>
								<i class="ci-star-filled fs-xs ms-1"></i>
							</div>
							<div class="w-100">
								<div class="progress" style="height:4px;">
									<div class="progress-bar" role="progressbar" style="width:17%; background-color:#ffda75;" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<span class="text-muted ms-3">9</span>
						</div>
						<div class="d-flex align-items-center mb-2">
							<div class="text-nowrap me-3">
								<span class="d-inline-block align-middle text-muted">2</span>
								<i class="ci-star-filled fs-xs ms-1"></i>
							</div>
							<div class="w-100">
								<div class="progress" style="height:4px;">
									<div class="progress-bar" role="progressbar" style="width:9%; background-color:#fea569;" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<span class="text-muted ms-3">4</span>
						</div>
						<div class="d-flex align-items-center">
							<div class="text-nowrap me-3">
								<span class="d-inline-block align-middle text-muted">1</span>
								<i class="ci-star-filled fs-xs ms-1"></i>
							</div>
							<div class="w-100">
								<div class="progress" style="height: 4px;">
									<div class="progress-bar bg-danger" role="progressbar" style="width:4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<span class="text-muted ms-3">2</span>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection