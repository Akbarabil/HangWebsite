<?php

namespace App\Http\Controllers;

use App\Product;
use App\Regional;
use App\TargetSale;
use App\logmd;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;
use Session;

class TargetSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']              = "Target Penjualan";
        $data['sidebar']            = "master";
        $data['sidebar2']           = "targetsale";

        $data['target_sales']       = TargetSale::all();
        $data['products']           = Product::all();
        $data['regionals']          = Regional::all();

        return view('master.targetsale.targetsale', $data);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'file_excel_template'       => 'required'
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);
        if ($validator->fails()) {
            return redirect('master/target-sale')->withErrors($validator);
        }
        $file = $request->file('file_excel_template');
        // dd($file);
        $sheet      = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getRealPath());
        $highestRow = $sheet->getActiveSheet()->getHighestRow();
        $highestColumn = $sheet->getActiveSheet()->getHighestColumn();
        $arrSheet   = $sheet->getActiveSheet()->rangeToArray(
            'A9:' . $highestColumn . $highestRow
        );
        // dd($arrSheet);
        $arrs = [];
        foreach ($arrSheet as $arr) {
            if ($arr[1] == null) break;
            array_push($arrs, $arr);
        }
        // dd($arrs);
        foreach ($arrs as $arr) {
            $target_sale = new TargetSale();
            $regional = Regional::where('NAME_REGIONAL', '=', $arr[1])->first();
            $product = Product::where('CODE_PRODUCT', '=', $arr[2])->first();
            $target_sale->ID_PRODUCT      = $product->ID_PRODUCT;
            $target_sale->ID_REGIONAL     = $regional->ID_REGIONAL;
            $target_sale->QUANTITY        = $arr[3];
            $target_sale->START_PP        = Carbon::createFromFormat('d/m/Y', $arr[4])->format('Y-m-d');
            $target_sale->END_PP          = Carbon::createFromFormat('d/m/Y', $arr[5])->format('Y-m-d');
            $target_sale->save();
        }
        // Excel::import(new RegionalPriceImport, $file->getRealPath());

        return redirect('master/target-sale')->with('succ_msg', 'Berhasil menambahkan data target penjualan!');

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id'             => 'required',
            'product_edit'    => 'required',
            'regional_edit'  => 'required',
            'quantity'       => 'required',
            'status'         => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);
        if ($validator->fails()) {
            return redirect('master/target-sale')->withErrors($validator);
        }
        
        $target_sale = TargetSale::find($request->input('id'));

        $oldValues = $target_sale->getOriginal();

        $target_sale->ID_PRODUCT         = $request->input('product_edit');
        $target_sale->ID_REGIONAL        = $request->input('regional_edit');
        $target_sale->QUANTITY           = $request->input('quantity');
        $target_sale->DELETED_AT         = $request->input('status') == '1' ? NULL : date('Y-m-d H:i:s');

        $changedFields = array_keys($target_sale->getDirty());
        $target_sale->save();

        $newValues = [];
        foreach($changedFields as $field) {
            $newValues[$field] = $target_sale->getAttribute($field);
        }

        $id_userU = SESSION::get('id_user');

        if (!empty($newValues)) {
            DB::table('log_md')->insert([
                'UPDATED_BY' => $id_userU,
                'DETAIL' => 'Updating Target Sale ' . (string)$request->input('id'),
                'OLD_VALUES' => json_encode(array_intersect_key($oldValues, $newValues)),
                'NEW_VALUES' => json_encode($newValues),
                'log_time' => now(),
            ]);
        }  
        // dd($regional_price);
        return redirect('master/target-sale')->with('succ_msg', 'Berhasil mengubah data target penjualan!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'             => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);
        if ($validator->fails()) {
            return redirect('master/target-sale')->withErrors($validator);
        }
        
        $target_sale = TargetSale::find($request->input('id'));
        $target_sale->delete();
        // dd($regional_price);
        return redirect('master/target-sale')->with('succ_msg', 'Berhasil menghapus data target penjualan!');
        //
    }
    public function download_template()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $styleHeading1['font']['bold'] = true;
        $styleHeading1['font']['size'] = 20;

        $styleHeading2['font']['bold'] = true;
        $styleHeading2['font']['size'] = 14;

        $styleHeading3['font']['bold'] = true;
        $styleHeading3['font']['size'] = 12;

        $styleTitle['font']['bold']                         = true;
        $styleTitle['font']['size']                         = 11;
        $styleTitle['font']['color']['argb']                = \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE;
        $styleTitle['fill']['fillType']                     = \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID;
        $styleTitle['fill']['color']['argb']                = 'FF595959';
        $styleTitle['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleTitle['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;
        $styleTitle['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;

        $styleTitle2['font']['bold']                         = true;
        $styleTitle2['font']['size']                         = 11;
        $styleTitle2['font']['color']['argb']                = \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE;
        $styleTitle2['fill']['fillType']                     = \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID;
        $styleTitle2['fill']['color']['argb']                = 'FF0070C0';
        $styleTitle2['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleTitle2['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;
        $styleTitle2['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;

        $styleContent['font']['size']                         = 11;
        $styleContent['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;
        $styleContent['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

        $styleContentCenter['font']['size']                         = 11;
        $styleContentCenter['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;
        $styleContentCenter['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleContentCenter['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

        $styleContentCenterBold['font']['size']                         = 11;
        $styleContentCenterBold['font']['bold']                         = true;
        $styleContentCenterBold['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;
        $styleContentCenterBold['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleContentCenterBold['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;
        $sheet->getColumnDimension('A')->setWidth('3');
        $sheet->getColumnDimension('B')->setWidth('30');
        $sheet->getColumnDimension('C')->setWidth('20');
        $sheet->getColumnDimension('D')->setWidth('25');
        $sheet->getColumnDimension('E')->setWidth('20');
        $sheet->getColumnDimension('F')->setWidth('20');

        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo Finna');
        $drawing->setDescription('Logo Finna');
        $drawing->setPath(public_path('images/new-logo.png')); /* put your path and image here */
        $drawing->setCoordinates('A1');
        $drawing->setWorksheet($sheet);

        $sheet->getRowDimension('7')->setRowHeight('30');
        $sheet->setCellValue('A7', "TARGET PENJUALAN")->getStyle('A7')->applyFromArray($styleHeading1);

        $sheet->setCellValue('A8', 'NO')->getStyle('A8')->applyFromArray($styleTitle);
        $sheet->setCellValue('B8', 'REGIONAL')->getStyle('B8')->applyFromArray($styleTitle);
        $sheet->setCellValue('C8', 'KODE PRODUK')->getStyle('C8')->applyFromArray($styleTitle);
        $sheet->setCellValue('D8', 'QUANTITY')->getStyle('D8')->applyFromArray($styleTitle);
        $sheet->setCellValue('E8', 'START DATE')->getStyle('E8')->applyFromArray($styleTitle);
        $sheet->setCellValue('F8', 'END DATE')->getStyle('F8')->applyFromArray($styleTitle);
        $products      = Product::all();
        $arrs_product = [];
        foreach ($products as $product) {
            array_push($arrs_product, $product->CODE_PRODUCT);
        }
        $regionals       = Regional::all();
        $arrs_regional = [];
        foreach ($regionals as $regional) {
            array_push($arrs_regional, $regional->NAME_REGIONAL);
        }
        $rowStart = 9;
        for ($i = 1; $i <= 20; $i++) {
            $sheet->setCellValue('A' . $rowStart, $i)->getStyle('A' . $rowStart)->applyFromArray($styleContentCenterBold)->getAlignment()->setWrapText(true);

            $sheet->getStyle('B' . $rowStart)->applyFromArray($styleContentCenterBold)->getAlignment()->setWrapText(true);
            $lstRegional = $sheet->getCell('B' . $rowStart)->getDataValidation();
            $lstRegional->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)->setShowDropDown(true);
            $lstRegional->setFormula1('"' . implode(',', $arrs_regional) . '"');

            $sheet->getStyle('C' . $rowStart)->applyFromArray($styleContentCenterBold)->getAlignment()->setWrapText(true);
            $lstProduct = $sheet->getCell('C' . $rowStart)->getDataValidation();
            $lstProduct->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_LIST)->setShowDropDown(true);
            $lstProduct->setFormula1('"' . implode(',', $arrs_product) . '"');

            $sheet->getStyle('D' . $rowStart)->applyFromArray($styleContent)->getAlignment()->setWrapText(true);

            $sheet->getStyle('E' . $rowStart)->applyFromArray($styleContent)->getAlignment()->setWrapText(true);
            $lstProduct = $sheet->getCell('E' . $rowStart)->getDataValidation();
            $lstProduct->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_DATE);

            $sheet->getStyle('F' . $rowStart)->applyFromArray($styleContent)->getAlignment()->setWrapText(true);
            $lstProduct = $sheet->getCell('F' . $rowStart)->getDataValidation();
            $lstProduct->setType(\PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_DATE);


            $rowStart++;
        }
        $fileName = 'TEMPLATE_TARGET_PENJUALAN_' . ((int)date('Y') + 1);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
