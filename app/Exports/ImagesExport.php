<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Photo;
use Maatwebsite\Excel\Concerns\FromView;

class ImagesExport implements FromView
{
    public function view(): View
    {
        return view('admin..exports.images', [
            'images' => Photo::all()
        ]);
    }
}