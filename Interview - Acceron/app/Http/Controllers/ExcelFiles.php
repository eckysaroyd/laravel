<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Employee;


class ExcelFiles extends Controller
{
    public function import()
    {
        $path = storage_path('Employee Sample Data.xlsx');

        $spreadsheet = IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();

        $data = [];

        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $data[] = $rowData;
        }

        // Assuming you have a "YourModel" model, adjust accordingly
        foreach ($data as $row) {
            Employee::create([
                'Employee ID'=> $row[0],
                'Full Name'=> $row[1],
                'Job Title'=> $row[2],
                'Department'=> $row[3],
                'Business Unit'=> $row[4],
                'Gender'=> $row[5],
                'Ethnicity'=> $row[6],
                'Age'=> $row[7],
                'Hire Date'=> $row[8],
                'Annual Salary'=> $row[9],
                'Bonus'=> $row[10],
                'Country'=> $row[11],
                'City'=> $row[12],
                'Exit Date'=> $row[13],

            ]);
        }

        return "Data imported successfully!";
    }
}
