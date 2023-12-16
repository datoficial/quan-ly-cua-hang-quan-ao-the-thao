<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SanPham::all();
    }
    public function headings(): array
    {
        return [
            'loaisanpham_id',
            'tensanpham',
            'tensanpham_slug',
            'soluong',
            'dongia',
            'hinhanh',
        ];
    }
    public function map($row): array
    {
        return [
        $row->loaisanpham_id,
        $row->tensanpham,
        $row->tensanpham_slug,
        $row->soluong,
        $row->dongia,
        $row->hinhanh,
    ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
}
