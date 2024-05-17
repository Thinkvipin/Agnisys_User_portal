<?php
namespace App\Exports;

use App\usertracks;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return usertracks::select('email', 'login_time', 'logout_time','url')->where('url', '!=', '')->get();
    }

    public function headings(): array
    {
        return [
            'Email',
            'Login Time',
            'Logout Time',
            'Urls'
        ];
    }
}