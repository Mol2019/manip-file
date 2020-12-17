<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FileImport;
use App\Exports\FileExport;

class FileController extends Controller
{
    //
    public function fileImportExport()
    {

    }

    public function fileImport(Request $request)
    {
        Excel::import(new FileImport, $request->file('file'));
    }

    public function fileExport()
    {
        Excel::download(new FileExport, 'personnes-collection.xlsx');
    }
}
