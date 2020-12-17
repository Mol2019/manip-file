<?php

namespace App\Imports;

use App\Models\File;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\Exports\FileExport;
use Maatwebsite\Excel\Facades\Excel;




class FileImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {   
        //dd($rows);
        $data = [];
        $i = 0;
        foreach($rows as $personne) : 
            $arrayChaine=explode(",",$personne['member']);
            $data[$i]['nom'] = substr($arrayChaine[0], 4, strlen($arrayChaine[0]) - 1);  ;
            $data[$i]['prenoms'] = $arrayChaine[count($arrayChaine) - 1];
            $data[$i]['alias'] = $personne['alias'] ?? NULL;
            $data[$i]['date_de_naissance'] = NULL;
            $data[$i]['lieu_de_naissance'] = $personne["lieu_de_naissance"] ?? NULL;
            $data[$i]['autres informations'] = $personne["autres_informations"] ?? NULL;
            $data[$i]['fonction'] = "Honorable de ". $personne['constituency'].", état de ".$personne['county'].", Kenya";
            $data[$i]['decret de nommination'] = $personne["decret"] ?? NULL;
            $data[$i]['photo'] = $personne['photo'] ?? NULL;
            $data[$i]['lien_utile'] = $personne['lien'] ?? NULL; 
            $i++; 
        endforeach;

        Excel::store(new FileExport($data), 'PPE COLLECTION OF KENYA.xlsx');
       
        //dd($data);
    }
}
