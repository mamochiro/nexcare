<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ImagesExport;
use App\Exports\UsersExport;
use App\Exports\UsersPlayExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //
     public function exportPhoto() 
    {
        return Excel::download(new ImagesExport, 'photos.xlsx');
    }

     public function exportUser() 
    {
        return Excel::download(new UsersPlayExport, 'users.xlsx');
    }

}
