@extends('layouts.frontend')
@section('title', 'Sản phẩm theo loại')
@section('content')

@if($loaisanpham)
    <!-- Hiển thị thông tin loại sản phẩm -->
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mx-auto mt-3">{{$loaisanpham->tenloai}}</h2>
    </div>
    <!-- Hoặc bất kỳ thông tin nào bạn muốn hiển thị từ loại sản phẩm -->
@endif
<section class="container pt-3 pb-5">
<div class="row mx-auto">
    @foreach($sanpham as $value)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="card product-card">
        <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $loaisanpham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}">
                <img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" class="card-img-top" alt="{{ $value->tenloai }}">
            </a>
            <div class="card-body">
                <p class="card-title">
                    <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $loaisanpham->tenloai_slug, 'tensanpham_slug' => $value->tensanpham_slug]) }}">{{ $value->tensanpham }}</a>
</p>
                <p class="card-text fs-sm">{{ $value->motasanpham }}</p>
                <p class="product-meta d-block fs-xs pb-1">{{ $value->tenloai }}</p>

                <div class="d-flex justify-content-between">
                    <div class="product-price">
                        <span class="text-accent">{{ number_format($value->dongia, 0, ',', '.') }}</span>
                    </div>
                    <div class="star-rating">
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star-filled active"></i>
                        <i class="star-rating-icon ci-star"></i>
                    </div>
                </div>
                <div class="card-body card-body-hidden">
                    <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" class="btn btn-primary btn-sm d-block w-100 mb-2">
                        <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $sanpham -> links() }}
</section>
@endsection
