<?php

namespace App\Exports;

use App\Photo;
use App\Users_play;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    public function collection()
    {
        $users = Users_play::all();

        // foreach ($photos as $key => $photo) {
        //     $photos[$key]['image'] = 'https://majorlovemomday.com/imgs/'.$photo->image; 
        // }
        
        // dd($users[0]);
        return $users;
    }
}