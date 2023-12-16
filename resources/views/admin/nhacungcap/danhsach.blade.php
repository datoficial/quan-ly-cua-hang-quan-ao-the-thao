@extends('layouts.app')
    @section('content')
    <div class="card">
    <div class="card-header">Nhà cung cấp</div>
    <div class="card-body table-responsive">
    <p><a href="{{ route('admin.nhacungcap.them') }}" class="btn btn-info"><i class="bi bi-plus"></i> Thêm mới</a></p>
    <table class="table table-bordered table-hover table-sm mb-0">
    <thead>
    <tr>
    <th width="5%">#</th>
    <th width="25%">Tên nhà cung cấp</th>
    <th width="20%">Tên nhà cung cấp không dấu</th>
    <th width="40%">Địa chỉ</th>
    <th width="5%">Sửa</th>
    <th width="5%">Xóa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($nhacungcap as $value)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $value->tenncc }}</td>
            <td>{{ $value->tenncc_lug }}</td>
            <td>{{ $value->diachi }}</td>
            <td class="text-center"><a href="{{ route('admin.nhacungcap.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a href="{{ route('admin.nhacungcap.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{$value->tenncc}} không?')"><i class="bi bi-trash text-danger"></i></a></td>
        </tr>

    @endforeach
    </tbody>
    </table>
    </div>
    </div>
@endsection