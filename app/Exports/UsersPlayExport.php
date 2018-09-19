<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use App\Users_play;
use Maatwebsite\Excel\Concerns\FromView;

class UsersPlayExport implements FromView
{
    public function view(): View
    {
        return view('admin..exports.users', [
            'users' => Users_play::all()
        ]);
    }
}