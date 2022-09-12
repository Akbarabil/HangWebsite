<?php

namespace App;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportExcell
{
    protected $dataPencapaianRPOLapul = array(
        [
            "NAME_USER" => "Dummy 1",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UST" => 9,
            "REAL_UST" => 8,
            "VSTARGET_UST" => 88.889,
            "TARGET_NONUST" => 13,
            "REAL_NONUST" => 53,
            "VSTARGET_NONUST" => 407.692,
            "TARGET_SELERAKU" => 6,
            "REAL_SELERAKU" => 12,
            "VSTARGET_SELERAKU" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );    

    protected $dataAktifitasRPOLapul = array(
        [
            "NAME_USER" => "Dummy 1",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UB" => 9,
            "REAL_UB" => 8,
            "VSTARGET_UB" => 88.889,
            "TARGET_PDGSAYUR" => 13,
            "REAL_PDGSAYUR" => 53,
            "VSTARGET_PDGSAYUR" => 407.692,
            "TARGET_RETAIL" => 6,
            "REAL_RETAIL" => 12,
            "VSTARGET_RETAIL" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataPencapaianRPODapul = array(
        [
            "NAME_USER" => "Dummy 2",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UST" => 9,
            "REAL_UST" => 8,
            "VSTARGET_UST" => 88.889,
            "TARGET_NONUST" => 13,
            "REAL_NONUST" => 53,
            "VSTARGET_NONUST" => 407.692,
            "TARGET_SELERAKU" => 6,
            "REAL_SELERAKU" => 12,
            "VSTARGET_SELERAKU" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataAktifitasRPODapul = array(
        [
            "NAME_USER" => "Dummy 2",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UB" => 9,
            "REAL_UB" => 8,
            "VSTARGET_UB" => 88.889,
            "TARGET_PDGSAYUR" => 13,
            "REAL_PDGSAYUR" => 53,
            "VSTARGET_PDGSAYUR" => 407.692,
            "TARGET_RETAIL" => 6,
            "REAL_RETAIL" => 12,
            "VSTARGET_RETAIL" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataPencapaianAsmen = array(
        [
            "NAME_USER" => "Zidan",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UST" => 9,
            "REAL_UST" => 8,
            "VSTARGET_UST" => 88.889,
            "TARGET_NONUST" => 13,
            "REAL_NONUST" => 53,
            "VSTARGET_NONUST" => 407.692,
            "TARGET_SELERAKU" => 6,
            "REAL_SELERAKU" => 12,
            "VSTARGET_SELERAKU" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataAktifitasAsmen = array(
        [
            "NAME_USER" => "Zidan",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UB" => 9,
            "REAL_UB" => 8,
            "VSTARGET_UB" => 88.889,
            "TARGET_PDGSAYUR" => 13,
            "REAL_PDGSAYUR" => 53,
            "VSTARGET_PDGSAYUR" => 407.692,
            "TARGET_RETAIL" => 6,
            "REAL_RETAIL" => 12,
            "VSTARGET_RETAIL" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataPencapaianAPO = array(
        [
            "NAME_USER" => "Zidan",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UST" => 9,
            "REAL_UST" => 8,
            "VSTARGET_UST" => 88.889,
            "TARGET_NONUST" => 13,
            "REAL_NONUST" => 53,
            "VSTARGET_NONUST" => 407.692,
            "TARGET_SELERAKU" => 6,
            "REAL_SELERAKU" => 12,
            "VSTARGET_SELERAKU" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataAktifitasAPO = array(
        [
            "NAME_USER" => "Doni",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UB" => 9,
            "REAL_UB" => 8,
            "VSTARGET_UB" => 88.889,
            "TARGET_PDGSAYUR" => 13,
            "REAL_PDGSAYUR" => 53,
            "VSTARGET_PDGSAYUR" => 407.692,
            "TARGET_RETAIL" => 6,
            "REAL_RETAIL" => 12,
            "VSTARGET_RETAIL" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataPencapaianSPG = array(
        [
            "NAME_USER" => "Bunga",
            "NAME_AREA" => "MALANG 2",
            "TARGET_UST" => 9,
            "REAL_UST" => 8,
            "VSTARGET_UST" => 88.889,
            "TARGET_NONUST" => 13,
            "REAL_NONUST" => 53,
            "VSTARGET_NONUST" => 407.692,
            "TARGET_SELERAKU" => 6,
            "REAL_SELERAKU" => 12,
            "VSTARGET_SELERAKU" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataAktifitasSPG = array(
        [
            "NAME_USER" => "Alif",
            "NAME_AREA" => "MALANG 1",
            "TARGET_UB" => 9,
            "REAL_UB" => 8,
            "VSTARGET_UB" => 88.889,
            "TARGET_PDGSAYUR" => 13,
            "REAL_PDGSAYUR" => 53,
            "VSTARGET_PDGSAYUR" => 407.692,
            "TARGET_RETAIL" => 6,
            "REAL_RETAIL" => 12,
            "VSTARGET_RETAIL" => 200,
            "AVERAGE" => 1.77885,
            "ID_USER_RANKSALE" => 1
        ]
    );

    protected $dataTransaksiHarian = array(
        [
            "DATE_TRANS" => "2 SEPTEMBER 2022",
            "NAME_USER" => "Zidan",
            "ROLE_USER" => "JATIM 1",
            "AREA_TRANS" => "MALANG 1",
            "TYPE" => "SPREADING",
            "LOKASI" => "Blimbing",
            "UST" => 24,
            "USU" => 20,
            "USP" => 15,
            "USI" => 20,
            "USTR" => 14,
            "USB" => 22,
            "USK" => 20,
            "USR" => 21,
            "UBNG" => 20,
            "FSU" => 19,
            "FSB" => 20,
            "TOTAL_DISPLAY" => 80,
            "TOTAL_OMSET" => 120000


        ]
    );

    protected $dataTrendASMEN = array(
        [
            "NAME_AREA" => "MALANG 1",
            "TARGET" => "24",
            "TYPE" => "NONUST",
            "OMSET" => ["25", "20", "23", "27", "29", "17", "20", "25", "0", "21", "19", "17"]
        ],
        [
            "NAME_AREA" => "MALANG 2",
            "TARGET" => "24",
            "TYPE" => "UST",
            "OMSET" => ["25", "20", "23", "27", "29", "17", "20", "25", "0", "21", "19", "17"]
        ]
    );

    protected $dataTrendRPO = array(
        [
            "NAME_AREA" => "SURABAYA 1",
            "TARGET" => "24",
            "TYPE" => "NONUST",
            "OMSET" => ["25", "20", "23", "27", "29", "17", "20", "25", "0", "21", "19", "17"]
        ],
        [
            "NAME_AREA" => "SURABAYA 2",
            "TARGET" => "24",
            "TYPE" => "UST",
            "OMSET" => ["25", "20", "23", "27", "29", "17", "20", "25", "0", "21", "19", "17"]
        ]
    );

    public function set_data($AktifitasRPOLapul, $AktifitasRPODapul, $AktifitasAsmen, $PencapaianAsmen)
    {        
        $this->dataAktifitasAsmen = $AktifitasAsmen;
        $this->dataPencapaianAsmen = $PencapaianAsmen;
        $this->dataAktifitasRPOLapul = $AktifitasRPOLapul;
        $this->dataAktifitasRPODapul = $AktifitasRPODapul;
        // dump($AktifitasRPOLapul);die;
    }

    public function styling_default_template($FontSize, $ColorText)
    {
        $styleTitle['font']['bold']                           = true;
        $styleDefault['font']['size']                         = $FontSize;
        $styleDefault['font']['color']['argb']                = $ColorText;
        $styleDefault['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE;
        $styleDefault['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

        return $styleDefault;
    }

    public function styling_title_template($ColorFill, $ColorText)
    {
        $styleTitle['font']['bold']                         = true;
        $styleTitle['font']['size']                         = 11;
        $styleTitle['font']['color']['argb']                = $ColorText;
        $styleTitle['fill']['fillType']                     = \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID;
        $styleTitle['fill']['color']['argb']                = $ColorFill;
        $styleTitle['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleTitle['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;
        $styleTitle['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;

        return $styleTitle;
    }

    public function styling_content_template($ColorFill, $ColorText)
    {
        $styleContent['font']['size']                         = 10;
        $styleContent['font']['color']['argb']                = $ColorText;
        $styleContent['fill']['fillType']                     = \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID;
        $styleContent['fill']['color']['argb']                = $ColorFill;
        $styleContent['borders']['outline']['borderStyle']    = \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN;
        $styleContent['alignment']['horizontal']              = \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER;
        $styleContent['alignment']['vertical']                = \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER;

        return $styleContent;
    }

    public function generate_ranking_rpo()
    {
        $spreadsheet = new Spreadsheet();

        $ObjSheet = $spreadsheet->getActiveSheet();
        $ObjSheet->setTitle("RANGKING RPO");

        $ObjSheet->getColumnDimension('B')->setWidth('25');
        $ObjSheet->getColumnDimension('C')->setWidth('25');

        $ObjSheet->getColumnDimension('D')->setWidth('8');
        $ObjSheet->getColumnDimension('E')->setWidth('8');
        $ObjSheet->getColumnDimension('F')->setWidth('8');
        $ObjSheet->getColumnDimension('G')->setWidth('8');
        $ObjSheet->getColumnDimension('H')->setWidth('8');
        $ObjSheet->getColumnDimension('I')->setWidth('8');
        $ObjSheet->getColumnDimension('J')->setWidth('8');
        $ObjSheet->getColumnDimension('K')->setWidth('8');
        $ObjSheet->getColumnDimension('L')->setWidth('8');

        $ObjSheet->getColumnDimension('M')->setWidth('12');
        $ObjSheet->getColumnDimension('N')->setWidth('12');
        $ObjSheet->getColumnDimension('O')->setWidth('2');
        $ObjSheet->getColumnDimension('P')->setWidth('10');
        $ObjSheet->getColumnDimension('Q')->setWidth('10');

        $ObjSheet->getRowDimension('4')->setRowHeight('20');
        $ObjSheet->getRowDimension('5')->setRowHeight('20');
        $ObjSheet->getRowDimension('6')->setRowHeight('30');

        // Activity RPO LAPUL
        $ObjSheet->mergeCells('B2:Q2')->setCellValue('B2', strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('B2:Q2')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('B3', 'AKTIVITY RPO DAPUL')->getStyle('B3')->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F3', 'Bobot 50%')->getStyle('F3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I3', 'Bobot 25%')->getStyle('I3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L3', 'Bobot 25%')->getStyle('L3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N3:Q3')->setCellValue('N3', 'DATA PER ' . strtoupper(date_format(date_create(date("Y-m-d")), 'j F Y')))->getStyle('N3:Q3')->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B4:B6')->setCellValue('B4', 'NAMA')->getStyle('B4:B6')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C4:C6')->setCellValue('C4', 'AREA')->getStyle('C4:C6')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D4:L4')->setCellValue('D4', 'KATEGORI')->getStyle('D4:L4')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D5:F5')->setCellValue('D5', 'AKTIVITAS UB')->getStyle('D5:F5')->applyFromArray($this->styling_title_template('FFFF00FF', 'FF000000'));
        $ObjSheet->mergeCells('G5:I5')->setCellValue('G5', 'PEDAGANG SAYUR')->getStyle('G5:I5')->applyFromArray($this->styling_title_template('FF66FFFF', 'FF000000'));
        $ObjSheet->mergeCells('J5:L5')->setCellValue('J5', 'RETAIL')->getStyle('J5:L5')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));

        $ObjSheet->setCellValue('D6', 'TGT')->getStyle('D6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E6', 'REAL')->getStyle('E6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F6', '% VS TGT')->getStyle('F6')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G6', 'TGT')->getStyle('G6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H6', 'REAL')->getStyle('H6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I6', '% VS TGT')->getStyle('I6')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J6', 'TGT')->getStyle('J6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K6', 'REAL')->getStyle('K6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L6', '% VS TGT')->getStyle('L6')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M4:M6')->setCellValue('M4', '% AVG')->getStyle('M4:M6')->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N4:N6')->setCellValue('N4', 'RANK')->getStyle('N4:N6')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $rowStart = 7;
        for ($i = 0; $i < count($this->dataAktifitasRPODapul); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart, $this->dataAktifitasRPODapul[$i]['NAME_USER'])->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $this->dataAktifitasRPODapul[$i]['NAME_AREA'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $this->dataAktifitasRPODapul[$i]['TARGET_UB'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $this->dataAktifitasRPODapul[$i]['REAL_UB'])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $this->dataAktifitasRPODapul[$i]['VSTARGET_UB'])->getStyle('F' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart, $this->dataAktifitasRPODapul[$i]['TARGET_PDGSAYUR'])->getStyle('G' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart, $this->dataAktifitasRPODapul[$i]['REAL_PDGSAYUR'])->getStyle('H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $this->dataAktifitasRPODapul[$i]['VSTARGET_PDGSAYUR'])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $this->dataAktifitasRPODapul[$i]['TARGET_RETAIL'])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $this->dataAktifitasRPODapul[$i]['REAL_RETAIL'])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $this->dataAktifitasRPODapul[$i]['VSTARGET_RETAIL'])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $this->dataAktifitasRPODapul[$i]['AVERAGE'])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $this->dataAktifitasRPODapul[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart + 1), 'AVERAGE')->getStyle('B' . ($rowStart + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('B' . ($rowStart + 2), 'AVERAGE')->getStyle('B' . ($rowStart + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart + 1), 'DAPUL')->getStyle('C' . ($rowStart + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('C' . ($rowStart + 2), 'NASIONAL')->getStyle('C' . ($rowStart + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $ColorFill = 'FF00FFFF';
                $ColorText = 'FF000000';
            } else {
                $ColorFill = 'FF0000FF';
                $ColorText = 'FFFFFFFF';
            }
            $ObjSheet->getStyle('D' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('E' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('F' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('G' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('H' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('I' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('J' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('K' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('L' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('M' . ($rowStart + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('N' . ($rowStart + $i))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);
        }

        // Pencapaian RPO DAPUL
        $rowStart2 = $rowStart + 4;
        $ObjSheet->setCellValue('B' . $rowStart2, 'PENCAPAIAN RPO')->getStyle('B' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart2, 'Bobot 75%')->getStyle('F' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart2, 'Bobot 0%')->getStyle('I' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart2, 'Bobot 25%')->getStyle('L' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N' . $rowStart2 . ':Q' . $rowStart2)->setCellValue('N' . $rowStart2, 'DATA PER ' . strtoupper(date_format(date_create(date("Y-m-d")), 'j F Y')))->getStyle('N' . $rowStart2 . ':Q' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->setCellValue('B' . ($rowStart2 + 1), 'NAMA')->getStyle('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->setCellValue('C' . ($rowStart2 + 1), 'AREA')->getStyle('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->setCellValue('D' . ($rowStart2 + 1), 'KATEGORI')->getStyle('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->setCellValue('D' . ($rowStart2 + 2), 'NON UST')->getStyle('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->setCellValue('G' . ($rowStart2 + 2), 'UST')->getStyle('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->setCellValue('J' . ($rowStart2 + 2), 'SELERAKU')->getStyle('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart2 + 3), 'TGT')->getStyle('D' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart2 + 3), 'REAL')->getStyle('E' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart2 + 3), '% VS TGT')->getStyle('F' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart2 + 3), 'TGT')->getStyle('G' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart2 + 3), 'REAL')->getStyle('H' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart2 + 3), '% VS TGT')->getStyle('I' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart2 + 3), 'TGT')->getStyle('J' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart2 + 3), 'REAL')->getStyle('K' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart2 + 3), '% VS TGT')->getStyle('L' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->setCellValue('M' . ($rowStart2 + 1), '% AVG')->getStyle('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->setCellValue('N' . ($rowStart2 + 1), 'RANK')->getStyle('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $ObjSheet->setCellValue('P' . ($rowStart2 + 2), 'UBNG')->getStyle('P' . ($rowStart2 + 2))->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'));
        $ObjSheet->setCellValue('P' . ($rowStart2 + 3), 'REAL')->getStyle('P' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));

        $rowStart3 = ($rowStart2 + 4);
        for ($i = 0; $i < count($this->dataPencapaianRPODapul); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart3, $this->dataPencapaianRPODapul[$i]['NAME_USER'])->getStyle('B' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart3, $this->dataPencapaianRPODapul[$i]['NAME_AREA'])->getStyle('C' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart3, $this->dataPencapaianRPODapul[$i]['TARGET_NONUST'])->getStyle('D' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart3, $this->dataPencapaianRPODapul[$i]['REAL_NONUST'])->getStyle('E' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart3, $this->dataPencapaianRPODapul[$i]['VSTARGET_NONUST'])->getStyle('F' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart3, $this->dataPencapaianRPODapul[$i]['TARGET_UST'])->getStyle('G' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart3, $this->dataPencapaianRPODapul[$i]['REAL_UST'])->getStyle('H' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart3, $this->dataPencapaianRPODapul[$i]['VSTARGET_UST'])->getStyle('I' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart3, $this->dataPencapaianRPODapul[$i]['TARGET_SELERAKU'])->getStyle('J' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart3, $this->dataPencapaianRPODapul[$i]['REAL_SELERAKU'])->getStyle('K' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart3, $this->dataPencapaianRPODapul[$i]['VSTARGET_SELERAKU'])->getStyle('L' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart3, $this->dataPencapaianRPODapul[$i]['AVERAGE'])->getStyle('M' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart3, $this->dataPencapaianRPODapul[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('P' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart3++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart3 + 1), 'AVERAGE')->getStyle('B' . ($rowStart3 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('B' . ($rowStart3 + 2), 'AVERAGE')->getStyle('B' . ($rowStart3 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart3 + 1), 'DAPUL')->getStyle('C' . ($rowStart3 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('C' . ($rowStart3 + 2), 'NASIONAL')->getStyle('C' . ($rowStart3 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $ColorFill = 'FF00FFFF';
                $ColorText = 'FF000000';
            } else {
                $ColorFill = 'FF0000FF';
                $ColorText = 'FFFFFFFF';
            }
            $ObjSheet->getStyle('D' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('E' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('F' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('G' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('H' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('I' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('J' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('K' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('L' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('M' . ($rowStart3 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('N' . ($rowStart3 + $i))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);
        }

        // Activity RPO LAPUL
        $rowStart4 = $rowStart3 + 5;
        $ObjSheet->mergeCells('B' . ($rowStart4 - 1) . ':Q' . ($rowStart4 - 1))->setCellValue('B' . ($rowStart4 - 1), strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('B' . ($rowStart4 - 1) . ':Q' . ($rowStart4 - 1))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('B' . $rowStart4, 'AKTIVITY RPO LAPUL')->getStyle('B' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart4, 'Bobot 50%')->getStyle('F' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart4, 'Bobot 25%')->getStyle('I' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart4, 'Bobot 25%')->getStyle('L' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N' . $rowStart4 . ':Q' . $rowStart4)->setCellValue('N' . $rowStart4, 'DATA PER ' . date_format(date_create(date("Y-m-d")), 'j F Y'))->getStyle('N' . $rowStart4 . ':Q' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->setCellValue('B' . ($rowStart4 + 1), 'NAMA')->getStyle('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->setCellValue('C' . ($rowStart4 + 1), 'AREA')->getStyle('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart4 + 1) . ':L' . ($rowStart4 + 1))->setCellValue('D' . ($rowStart4 + 1), 'KATEGORI')->getStyle('D' . ($rowStart4 + 1) . ':L' . ($rowStart4 + 1))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart4 + 2) . ':F' . ($rowStart4 + 2))->setCellValue('D' . ($rowStart4 + 2), 'NON UST')->getStyle('D' . ($rowStart4 + 2) . ':F' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart4 + 2) . ':I' . ($rowStart4 + 2))->setCellValue('G' . ($rowStart4 + 2), 'UST')->getStyle('G' . ($rowStart4 + 2) . ':I' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart4 + 2) . ':L' . ($rowStart4 + 2))->setCellValue('J' . ($rowStart4 + 2), 'SELERAKU')->getStyle('J' . ($rowStart4 + 2) . ':L' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart4 + 3), 'TGT')->getStyle('D' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart4 + 3), 'REAL')->getStyle('E' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart4 + 3), '% VS TGT')->getStyle('F' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart4 + 3), 'TGT')->getStyle('G' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart4 + 3), 'REAL')->getStyle('H' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart4 + 3), '% VS TGT')->getStyle('I' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart4 + 3), 'TGT')->getStyle('J' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart4 + 3), 'REAL')->getStyle('K' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart4 + 3), '% VS TGT')->getStyle('L' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart4 + 1) . ':M' . ($rowStart4 + 3))->setCellValue('M' . ($rowStart4 + 1), '% AVG')->getStyle('M' . ($rowStart4 + 1) . ':M' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N' . ($rowStart4 + 1) . ':N' . ($rowStart4 + 3))->setCellValue('N' . ($rowStart4 + 1), 'RANK')->getStyle('N' . ($rowStart4 + 1) . ':N' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $rowStart5 = ($rowStart4 + 4);
        for ($i = 0; $i < count($this->dataAktifitasRPOLapul); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['NAME_USER'])->getStyle('B' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['NAME_AREA'])->getStyle('C' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['TARGET_UB'])->getStyle('D' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['REAL_UB'])->getStyle('E' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['VSTARGET_UB'])->getStyle('F' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['TARGET_PDGSAYUR'])->getStyle('G' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['REAL_PDGSAYUR'])->getStyle('H' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['VSTARGET_PDGSAYUR'])->getStyle('I' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['TARGET_RETAIL'])->getStyle('J' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['REAL_RETAIL'])->getStyle('K' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['VSTARGET_RETAIL'])->getStyle('L' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['AVERAGE'])->getStyle('M' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart5, $this->dataAktifitasRPOLapul[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart5++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart5 + 1), 'AVERAGE')->getStyle('B' . ($rowStart5 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('B' . ($rowStart5 + 2), 'AVERAGE')->getStyle('B' . ($rowStart5 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart5 + 1), 'LAPUL')->getStyle('C' . ($rowStart5 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('C' . ($rowStart5 + 2), 'NASIONAL')->getStyle('C' . ($rowStart5 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $ColorFill = 'FF00FFFF';
                $ColorText = 'FF000000';
            } else {
                $ColorFill = 'FF0000FF';
                $ColorText = 'FFFFFFFF';
            }
            $ObjSheet->getStyle('D' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('E' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('F' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('G' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('H' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('I' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('J' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('K' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('L' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('M' . ($rowStart5 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('N' . ($rowStart5 + $i))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);
        }

        // Pencapaian RPO LAPUL
        $rowStart6 = $rowStart5 + 4;
        $ObjSheet->setCellValue('B' . $rowStart6, 'PENCAPAIAN RPO')->getStyle('B' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart6, 'Bobot 75%')->getStyle('F' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart6, 'Bobot 0%')->getStyle('I' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart6, 'Bobot 25%')->getStyle('L' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N' . $rowStart6 . ':Q' . $rowStart6)->setCellValue('N' . $rowStart6, 'DATA PER ' . strtoupper(date_format(date_create(date("Y-m-d")), 'j F Y')))->getStyle('N' . $rowStart6 . ':Q' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B' . ($rowStart6 + 1) . ':B' . ($rowStart6 + 3))->setCellValue('B' . ($rowStart6 + 1), 'NAMA')->getStyle('B' . ($rowStart6 + 1) . ':B' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart6 + 1) . ':C' . ($rowStart6 + 3))->setCellValue('C' . ($rowStart6 + 1), 'AREA')->getStyle('C' . ($rowStart6 + 1) . ':C' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart6 + 1) . ':L' . ($rowStart6 + 1))->setCellValue('D' . ($rowStart6 + 1), 'KATEGORI')->getStyle('D' . ($rowStart6 + 1) . ':L' . ($rowStart6 + 1))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart6 + 2) . ':F' . ($rowStart6 + 2))->setCellValue('D' . ($rowStart6 + 2), 'NON UST')->getStyle('D' . ($rowStart6 + 2) . ':F' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart6 + 2) . ':I' . ($rowStart6 + 2))->setCellValue('G' . ($rowStart6 + 2), 'UST')->getStyle('G' . ($rowStart6 + 2) . ':I' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart6 + 2) . ':L' . ($rowStart6 + 2))->setCellValue('J' . ($rowStart6 + 2), 'SELERAKU')->getStyle('J' . ($rowStart6 + 2) . ':L' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart6 + 3), 'TGT')->getStyle('D' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart6 + 3), 'REAL')->getStyle('E' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart6 + 3), '% VS TGT')->getStyle('F' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart6 + 3), 'TGT')->getStyle('G' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart6 + 3), 'REAL')->getStyle('H' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart6 + 3), '% VS TGT')->getStyle('I' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart6 + 3), 'TGT')->getStyle('J' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart6 + 3), 'REAL')->getStyle('K' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart6 + 3), '% VS TGT')->getStyle('L' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart6 + 1) . ':M' . ($rowStart6 + 3))->setCellValue('M' . ($rowStart6 + 1), '% AVG')->getStyle('M' . ($rowStart6 + 1) . ':M' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N' . ($rowStart6 + 1) . ':N' . ($rowStart6 + 3))->setCellValue('N' . ($rowStart6 + 1), 'RANK')->getStyle('N' . ($rowStart6 + 1) . ':N' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $ObjSheet->setCellValue('P' . ($rowStart6 + 2), 'UBNG')->getStyle('P' . ($rowStart6 + 2))->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'));
        $ObjSheet->setCellValue('P' . ($rowStart6 + 3), 'REAL')->getStyle('P' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));

        $rowStart7 = ($rowStart6 + 4);
        for ($i = 0; $i < count($this->dataPencapaianRPOLapul); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['NAME_USER'])->getStyle('B' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['NAME_AREA'])->getStyle('C' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['TARGET_NONUST'])->getStyle('D' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['REAL_NONUST'])->getStyle('E' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['VSTARGET_NONUST'])->getStyle('F' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['TARGET_UST'])->getStyle('G' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['REAL_UST'])->getStyle('H' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['VSTARGET_UST'])->getStyle('I' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['TARGET_SELERAKU'])->getStyle('J' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['REAL_SELERAKU'])->getStyle('K' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['VSTARGET_SELERAKU'])->getStyle('L' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['AVERAGE'])->getStyle('M' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart7, $this->dataPencapaianRPOLapul[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('P' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart7++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart7 + 1), 'AVERAGE')->getStyle('B' . ($rowStart7 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('B' . ($rowStart7 + 2), 'AVERAGE')->getStyle('B' . ($rowStart7 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart7 + 1), 'LAPUL')->getStyle('C' . ($rowStart7 + 1))->applyFromArray($this->styling_title_template('FF00FFFF', 'FF000000'));
        $ObjSheet->setCellValue('C' . ($rowStart7 + 2), 'NASIONAL')->getStyle('C' . ($rowStart7 + 2))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));

        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $ColorFill = 'FF00FFFF';
                $ColorText = 'FF000000';
            } else {
                $ColorFill = 'FF0000FF';
                $ColorText = 'FFFFFFFF';
            }
            $ObjSheet->getStyle('D' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('E' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('F' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('G' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('H' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('I' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('J' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('K' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('L' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('M' . ($rowStart7 + $i))->applyFromArray($this->styling_content_template($ColorFill, $ColorText))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('N' . ($rowStart7 + $i))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);
        }

        $fileName = 'RANKING - RPO - ' . date_format(date_create(date("Y-m")), 'F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function generate_ranking_asmen()
    {
        $spreadsheet = new Spreadsheet();
        $ObjSheet = $spreadsheet->getActiveSheet();
        $ObjSheet->setTitle("RANGKING ASMEN");

        $ObjSheet->getColumnDimension('B')->setWidth('25');
        $ObjSheet->getColumnDimension('C')->setWidth('25');

        $ObjSheet->getColumnDimension('D')->setWidth('8');
        $ObjSheet->getColumnDimension('E')->setWidth('8');
        $ObjSheet->getColumnDimension('F')->setWidth('8');
        $ObjSheet->getColumnDimension('G')->setWidth('8');
        $ObjSheet->getColumnDimension('H')->setWidth('8');
        $ObjSheet->getColumnDimension('I')->setWidth('8');
        $ObjSheet->getColumnDimension('J')->setWidth('8');
        $ObjSheet->getColumnDimension('K')->setWidth('8');
        $ObjSheet->getColumnDimension('L')->setWidth('8');

        $ObjSheet->getColumnDimension('M')->setWidth('12');
        $ObjSheet->getColumnDimension('N')->setWidth('12');
        $ObjSheet->getColumnDimension('O')->setWidth('2');
        $ObjSheet->getColumnDimension('P')->setWidth('10');
        $ObjSheet->getColumnDimension('Q')->setWidth('10');

        $ObjSheet->getRowDimension('4')->setRowHeight('20');
        $ObjSheet->getRowDimension('5')->setRowHeight('20');
        $ObjSheet->getRowDimension('6')->setRowHeight('30');

        // Activity Asmen
        $ObjSheet->mergeCells('B2:Q2')->setCellValue('B2', strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('B2:Q2')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('B3', 'AKTIVITY ASMEN')->getStyle('B3')->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F3', 'Bobot 50%')->getStyle('F3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I3', 'Bobot 25%')->getStyle('I3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L3', 'Bobot 25%')->getStyle('L3')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N3:Q3')->setCellValue('N3', 'DATA PER ' . strtoupper(date_format(date_create(date("Y-m-d")), 'j F Y')))->getStyle('N3:Q3')->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B4:B6')->setCellValue('B4', 'NAMA')->getStyle('B4:B6')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C4:C6')->setCellValue('C4', 'AREA')->getStyle('C4:C6')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D4:L4')->setCellValue('D4', 'KATEGORI')->getStyle('D4:L4')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D5:F5')->setCellValue('D5', 'AKTIVITAS UB')->getStyle('D5:F5')->applyFromArray($this->styling_title_template('FFFF00FF', 'FF000000'));
        $ObjSheet->mergeCells('G5:I5')->setCellValue('G5', 'PEDAGANG SAYUR')->getStyle('G5:I5')->applyFromArray($this->styling_title_template('FF66FFFF', 'FF000000'));
        $ObjSheet->mergeCells('J5:L5')->setCellValue('J5', 'RETAIL')->getStyle('J5:L5')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));

        $ObjSheet->setCellValue('D6', 'TGT')->getStyle('D6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E6', 'REAL')->getStyle('E6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F6', '% VS TGT')->getStyle('F6')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G6', 'TGT')->getStyle('G6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H6', 'REAL')->getStyle('H6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I6', '% VS TGT')->getStyle('I6')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J6', 'TGT')->getStyle('J6')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K6', 'REAL')->getStyle('K6')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L6', '% VS TGT')->getStyle('L6')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M4:M6')->setCellValue('M4', '% AVG')->getStyle('M4:M6')->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N4:N6')->setCellValue('N4', 'RANK')->getStyle('N4:N6')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $rowStart = 7;
        for ($i = 0; $i < count($this->dataAktifitasAsmen); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart, $this->dataAktifitasAsmen[$i]['NAME_USER'])->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $this->dataAktifitasAsmen[$i]['NAME_AREA'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $this->dataAktifitasAsmen[$i]['TARGET_UB'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $this->dataAktifitasAsmen[$i]['REAL_UB'])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $this->dataAktifitasAsmen[$i]['VSTARGET_UB'])->getStyle('F' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart, $this->dataAktifitasAsmen[$i]['TARGET_PDGSAYUR'])->getStyle('G' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart, $this->dataAktifitasAsmen[$i]['REAL_PDGSAYUR'])->getStyle('H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $this->dataAktifitasAsmen[$i]['VSTARGET_PDGSAYUR'])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $this->dataAktifitasAsmen[$i]['TARGET_RETAIL'])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $this->dataAktifitasAsmen[$i]['REAL_RETAIL'])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $this->dataAktifitasAsmen[$i]['VSTARGET_RETAIL'])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $this->dataAktifitasAsmen[$i]['AVERAGE'])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $this->dataAktifitasAsmen[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart + 1), 'AVERAGE')->getStyle('B' . ($rowStart + 1))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart + 1), 'NASIONAL')->getStyle('C' . ($rowStart + 1))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        
        $firstRow = 7;
        $lastRow = $rowStart - 1;
        $ObjSheet->setCellValue('D' . ($rowStart + 1), '=AVERAGE(D'.$firstRow.':D'.$lastRow.')')->getStyle('D' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);        
        $ObjSheet->setCellValue('E' . ($rowStart + 1), '=AVERAGE(E'.$firstRow.':E'.$lastRow.')')->getStyle('E' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('F' . ($rowStart + 1), '=AVERAGE(F'.$firstRow.':F'.$lastRow.')')->getStyle('F' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('G' . ($rowStart + 1), '=AVERAGE(G'.$firstRow.':G'.$lastRow.')')->getStyle('G' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('H' . ($rowStart + 1), '=AVERAGE(H'.$firstRow.':H'.$lastRow.')')->getStyle('H' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('I' . ($rowStart + 1), '=AVERAGE(I'.$firstRow.':I'.$lastRow.')')->getStyle('I' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('J' . ($rowStart + 1), '=AVERAGE(J'.$firstRow.':J'.$lastRow.')')->getStyle('J' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('K' . ($rowStart + 1), '=AVERAGE(K'.$firstRow.':K'.$lastRow.')')->getStyle('K' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('L' . ($rowStart + 1), '=AVERAGE(L'.$firstRow.':L'.$lastRow.')')->getStyle('L' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('M' . ($rowStart + 1), '=AVERAGE(M'.$firstRow.':M'.$lastRow.')')->getStyle('M' . ($rowStart + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('N' . ($rowStart + 1))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        // Pencapaian Asmen
        $rowStart2 = $rowStart + 4;
        $ObjSheet->setCellValue('B' . $rowStart2, 'PENCAPAIAN RPO')->getStyle('B' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart2, 'Bobot 75%')->getStyle('F' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart2, 'Bobot 0%')->getStyle('I' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart2, 'Bobot 25%')->getStyle('L' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('N' . $rowStart2 . ':Q' . $rowStart2)->setCellValue('N' . $rowStart2, 'DATA PER ' . strtoupper(date_format(date_create(date("Y-m-d")), 'j F Y')))->getStyle('N' . $rowStart2 . ':Q' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->setCellValue('B' . ($rowStart2 + 1), 'NAMA')->getStyle('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->setCellValue('C' . ($rowStart2 + 1), 'AREA')->getStyle('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->setCellValue('D' . ($rowStart2 + 1), 'KATEGORI')->getStyle('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->setCellValue('D' . ($rowStart2 + 2), 'NON UST')->getStyle('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->setCellValue('G' . ($rowStart2 + 2), 'UST')->getStyle('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->setCellValue('J' . ($rowStart2 + 2), 'SELERAKU')->getStyle('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart2 + 3), 'TGT')->getStyle('D' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart2 + 3), 'REAL')->getStyle('E' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart2 + 3), '% VS TGT')->getStyle('F' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart2 + 3), 'TGT')->getStyle('G' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart2 + 3), 'REAL')->getStyle('H' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart2 + 3), '% VS TGT')->getStyle('I' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart2 + 3), 'TGT')->getStyle('J' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart2 + 3), 'REAL')->getStyle('K' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart2 + 3), '% VS TGT')->getStyle('L' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->setCellValue('M' . ($rowStart2 + 1), '% AVG')->getStyle('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->mergeCells('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->setCellValue('N' . ($rowStart2 + 1), 'RANK')->getStyle('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $ObjSheet->setCellValue('P' . ($rowStart2 + 2), 'UBNG')->getStyle('P' . ($rowStart2 + 2))->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'));
        $ObjSheet->setCellValue('P' . ($rowStart2 + 3), 'REAL')->getStyle('P' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));

        $rowStart3 = ($rowStart2 + 4);
        for ($i = 0; $i < count($this->dataPencapaianAsmen); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart3, $this->dataPencapaianAsmen[$i]['NAME_USER'])->getStyle('B' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart3, $this->dataPencapaianAsmen[$i]['NAME_AREA'])->getStyle('C' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart3, $this->dataPencapaianAsmen[$i]['TARGET_NONUST'])->getStyle('D' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart3, $this->dataPencapaianAsmen[$i]['REAL_NONUST'])->getStyle('E' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart3, $this->dataPencapaianAsmen[$i]['VSTARGET_NONUST'])->getStyle('F' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart3, $this->dataPencapaianAsmen[$i]['TARGET_UST'])->getStyle('G' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart3, $this->dataPencapaianAsmen[$i]['REAL_UST'])->getStyle('H' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart3, $this->dataPencapaianAsmen[$i]['VSTARGET_UST'])->getStyle('I' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart3, $this->dataPencapaianAsmen[$i]['TARGET_SELERAKU'])->getStyle('J' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart3, $this->dataPencapaianAsmen[$i]['REAL_SELERAKU'])->getStyle('K' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart3, $this->dataPencapaianAsmen[$i]['VSTARGET_SELERAKU'])->getStyle('L' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart3, $this->dataPencapaianAsmen[$i]['AVERAGE'])->getStyle('M' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart3, $this->dataPencapaianAsmen[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('P' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart3++;
        }

        $ObjSheet->getRowDimension($rowStart)->setRowHeight('10');

        $ObjSheet->setCellValue('B' . ($rowStart3 + 1), 'AVERAGE')->getStyle('B' . ($rowStart3 + 1))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));
        $ObjSheet->setCellValue('C' . ($rowStart3 + 1), 'NASIONAL')->getStyle('C' . ($rowStart3 + 1))->applyFromArray($this->styling_title_template('FF0000FF', 'FFFFFFFF'));

        $firstRow = $rowStart2 + 4;
        $lastRow = $rowStart3 - 1;
        $ObjSheet->setCellValue('D' . ($rowStart3 + 1), '=AVERAGE(D'.$firstRow.':D'.$lastRow.')')->getStyle('D' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);        
        $ObjSheet->setCellValue('E' . ($rowStart3 + 1), '=AVERAGE(E'.$firstRow.':E'.$lastRow.')')->getStyle('E' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('F' . ($rowStart3 + 1), '=AVERAGE(F'.$firstRow.':F'.$lastRow.')')->getStyle('F' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('G' . ($rowStart3 + 1), '=AVERAGE(G'.$firstRow.':G'.$lastRow.')')->getStyle('G' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('H' . ($rowStart3 + 1), '=AVERAGE(H'.$firstRow.':H'.$lastRow.')')->getStyle('H' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('I' . ($rowStart3 + 1), '=AVERAGE(I'.$firstRow.':I'.$lastRow.')')->getStyle('I' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('J' . ($rowStart3 + 1), '=AVERAGE(J'.$firstRow.':J'.$lastRow.')')->getStyle('J' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('K' . ($rowStart3 + 1), '=AVERAGE(K'.$firstRow.':K'.$lastRow.')')->getStyle('K' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('L' . ($rowStart3 + 1), '=AVERAGE(L'.$firstRow.':L'.$lastRow.')')->getStyle('L' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->setCellValue('M' . ($rowStart3 + 1), '=AVERAGE(M'.$firstRow.':M'.$lastRow.')')->getStyle('M' . ($rowStart3 + 1))->applyFromArray($this->styling_content_template('FF00FFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('N' . ($rowStart3 + 1))->applyFromArray($this->styling_title_template('FF000000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('S17:S19')->setCellValue('S17', 'AREA')->getStyle('S17:S19')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('T17:AB17')->setCellValue('T17', 'KATEGORI')->getStyle('T17:AB17')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('T18:V18')->setCellValue('T18', 'NON UST')->getStyle('T18:V18')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('W18:Y18')->setCellValue('W18', 'UST')->getStyle('W18:Y18')->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('Z18:AB18')->setCellValue('Z18', 'SELERAKU')->getStyle('Z18:AB18')->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));

        $ObjSheet->setCellValue('T19', 'TGT')->getStyle('T19')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('U19', 'REAL')->getStyle('U19')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('V19', '% VS TGT')->getStyle('V19')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('W19', 'TGT')->getStyle('W19')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('X19', 'REAL')->getStyle('X19')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('Y19', '% VS TGT')->getStyle('Y19')->applyFromArray($this->styling_title_template('FF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('Z19', 'TGT')->getStyle('Z19')->applyFromArray($this->styling_title_template('FFF4B084', 'FF000000'));
        $ObjSheet->setCellValue('AA19', 'REAL')->getStyle('AA19')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->setCellValue('AB19', '% VS TGT')->getStyle('AB19')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('S20:S21')->setCellValue('S20', 'NASIONAL')->getStyle('S20:S21')->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->getStyle('T20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('T21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->getStyle('U20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('U21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('V20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('V21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('W20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('W21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('X20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('X21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('Y20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('Y21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('Z20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('Z21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('AA20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('AA21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('AB20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('AB21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('AD18', 'UBNG')->getStyle('AD18')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('AD19', 'REAL')->getStyle('AD19')->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));
        $ObjSheet->getStyle('AD20')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);
        $ObjSheet->getStyle('AD21')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'))->getAlignment()->setWrapText(true);

        $fileName = 'RANKING - ASMEN - ' . date_format(date_create(date("Y-m")), 'F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function generate_transaksi_harian()
    {
        $spreadsheet = new Spreadsheet();

        $ObjSheet = $spreadsheet->getActiveSheet();
        $ObjSheet->setTitle("Transaksi Harian");

        $ObjSheet->getColumnDimension('A')->setWidth('18');
        $ObjSheet->getColumnDimension('B')->setWidth('30');
        $ObjSheet->getColumnDimension('C')->setWidth('15');
        $ObjSheet->getColumnDimension('D')->setWidth('18');
        $ObjSheet->getColumnDimension('E')->setWidth('18');

        $ObjSheet->getColumnDimension('F')->setWidth('10');
        $ObjSheet->getColumnDimension('G')->setWidth('10');
        $ObjSheet->getColumnDimension('H')->setWidth('10');

        $ObjSheet->getColumnDimension('I')->setWidth('10');
        $ObjSheet->getColumnDimension('J')->setWidth('10');
        $ObjSheet->getColumnDimension('K')->setWidth('10');
        $ObjSheet->getColumnDimension('L')->setWidth('10');
        $ObjSheet->getColumnDimension('M')->setWidth('10');
        $ObjSheet->getColumnDimension('N')->setWidth('10');
        $ObjSheet->getColumnDimension('O')->setWidth('10');
        $ObjSheet->getColumnDimension('P')->setWidth('10');
        $ObjSheet->getColumnDimension('Q')->setWidth('10');
        $ObjSheet->getColumnDimension('R')->setWidth('10');
        $ObjSheet->getColumnDimension('S')->setWidth('10');

        $ObjSheet->getColumnDimension('T')->setWidth('20');
        $ObjSheet->getColumnDimension('U')->setWidth('20');
        $ObjSheet->getColumnDimension('V')->setWidth('35');

        $ObjSheet->setAutoFilter('A7:V' . (count($this->dataTransaksiHarian) + 7));

        $ObjSheet->mergeCells('A1:V2')->setCellValue('A1', "REKAP HARIAN REGIONAL PROMOTION OFFICER")->getStyle('A1:V2')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->mergeCells('A3:V4')->setCellValue('A3', "*Uleg dalam satuan Inner dan Pars dalam satuan paket")->getStyle('A3:V4')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FFFF0000'));

        $ObjSheet->mergeCells('A5:A7')->setCellValue('A5', 'TANGGAL')->getStyle('A5:A7')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));
        $ObjSheet->mergeCells('B5:B7')->setCellValue('B5', 'NAMA')->getStyle('B5:B7')->applyFromArray($this->styling_title_template('FF92D050', 'FF000000'));
        $ObjSheet->mergeCells('C5:C7')->setCellValue('C5', 'JABATAN')->getStyle('C5:C7')->applyFromArray($this->styling_title_template('FF92D050', 'FF000000'));
        $ObjSheet->mergeCells('D5:D7')->setCellValue('D5', 'AREA')->getStyle('D5:D7')->applyFromArray($this->styling_title_template('FF92D050', 'FF000000'));
        $ObjSheet->mergeCells('E5:E7')->setCellValue('E5', 'AKTIFITAS')->getStyle('E5:E7')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('F5:H7')->setCellValue('F5', 'LOKASI')->getStyle('F5:H7')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));

        $ObjSheet->mergeCells('I5:S5')->setCellValue('I5', 'ITEM TERJUAL')->getStyle('I5:S5')->applyFromArray($this->styling_title_template('FFFFC000', 'FFFF0000'));
        $ObjSheet->setCellValue('I6', 'UST')->getStyle('I6')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('J6', 'USU')->getStyle('J6')->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('K6', 'USP')->getStyle('K6')->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('L6', 'USI')->getStyle('L6')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('M6', 'USTR')->getStyle('M6')->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('N6', 'USB')->getStyle('N6')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('O6', 'USK')->getStyle('O6')->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('P6', 'USR')->getStyle('P6')->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('Q6', 'UBNG')->getStyle('Q6')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('R6', 'FSU')->getStyle('R6')->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('S6', 'FSB')->getStyle('S6')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $ObjSheet->getStyle('I7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('J7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('K7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('L7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('M7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('N7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('O7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('P7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('Q7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('R7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->getStyle('S7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));

        $ObjSheet->mergeCells('T5:T6')->setCellValue('T5', 'TOTAL DISPLAY')->getStyle('T5:T6')->applyFromArray($this->styling_title_template('FF92D050', 'FF000000'));
        $ObjSheet->getStyle('T7')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->mergeCells('U5:U7')->setCellValue('U5', 'TOTAL OMSET')->getStyle('U5:U7')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('V5:V7')->setCellValue('V5', 'KETERANGAN')->getStyle('V5:V7')->applyFromArray($this->styling_title_template('FFBFBFBF', 'FF000000'));

        $rowStart = 8;
        for ($i = 0; $i < count($this->dataTransaksiHarian); $i++) {
            $ObjSheet->setCellValue('A' . $rowStart, $this->dataTransaksiHarian[$i]['DATE_TRANS'])->getStyle('A' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('B' . $rowStart, $this->dataTransaksiHarian[$i]['NAME_USER'])->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $this->dataTransaksiHarian[$i]['ROLE_USER'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $this->dataTransaksiHarian[$i]['AREA_TRANS'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $this->dataTransaksiHarian[$i]['TYPE'])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $this->dataTransaksiHarian[$i]['LOKASI'])->mergeCells('F' . $rowStart . ':H' . $rowStart)->getStyle('F' . $rowStart . ':H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $this->dataTransaksiHarian[$i]['UST'])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $this->dataTransaksiHarian[$i]['USU'])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $this->dataTransaksiHarian[$i]['USP'])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $this->dataTransaksiHarian[$i]['USI'])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $this->dataTransaksiHarian[$i]['USTR'])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $this->dataTransaksiHarian[$i]['USB'])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart, $this->dataTransaksiHarian[$i]['USK'])->getStyle('O' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart, $this->dataTransaksiHarian[$i]['USR'])->getStyle('P' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('Q' . $rowStart, $this->dataTransaksiHarian[$i]['UBNG'])->getStyle('Q' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('R' . $rowStart, $this->dataTransaksiHarian[$i]['FSU'])->getStyle('R' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('S' . $rowStart, $this->dataTransaksiHarian[$i]['FSB'])->getStyle('S' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('T' . $rowStart, $this->dataTransaksiHarian[$i]['TOTAL_DISPLAY'])->getStyle('T' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('U' . $rowStart, $this->dataTransaksiHarian[$i]['TOTAL_OMSET'])->getStyle('U' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('V' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        $fileName = 'TRANSAKSI HARIAN - APO atau SALES - ' . date_format(date_create(date("Y-m-d")), 'j F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function generate_trend_asmen()
    {
        $spreadsheet = new Spreadsheet();

        $ObjSheet = $spreadsheet->getActiveSheet();
        $ObjSheet->setTitle("Trend ASMEN");

        $ObjSheet->getColumnDimension('B')->setWidth('5');
        $ObjSheet->getColumnDimension('C')->setWidth('25');
        $ObjSheet->getColumnDimension('D')->setWidth('18');

        $ObjSheet->getColumnDimension('E')->setWidth('10');
        $ObjSheet->getColumnDimension('F')->setWidth('10');
        $ObjSheet->getColumnDimension('G')->setWidth('10');
        $ObjSheet->getColumnDimension('H')->setWidth('10');
        $ObjSheet->getColumnDimension('I')->setWidth('10');
        $ObjSheet->getColumnDimension('J')->setWidth('10');
        $ObjSheet->getColumnDimension('K')->setWidth('10');
        $ObjSheet->getColumnDimension('L')->setWidth('10');
        $ObjSheet->getColumnDimension('M')->setWidth('10');
        $ObjSheet->getColumnDimension('N')->setWidth('10');
        $ObjSheet->getColumnDimension('O')->setWidth('10');
        $ObjSheet->getColumnDimension('P')->setWidth('10');

        $DataUST = array();
        $DataNONUST = array();
        $DataSELERAKU = array();
        for ($i = 0; $i < count($this->dataTrendASMEN); $i++) {
            if ($this->dataTrendASMEN[$i]['TYPE'] == "UST") {
                array_push($DataUST, $this->dataTrendASMEN[$i]);
            } else if ($this->dataTrendASMEN[$i]['TYPE'] == "NON UST") {
                array_push($DataNONUST, $this->dataTrendASMEN[$i]);
            } else {
                array_push($DataSELERAKU, $this->dataTrendASMEN[$i]);
            }
        }

        // UST
        $ObjSheet->mergeCells('B2:P2')->setCellValue('B2', "UST")->getStyle('B2:P2')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('B3:B5')->setCellValue('B3', "NO")->getStyle('B3:B5')->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C3:C5')->setCellValue('C3', "AREA")->getStyle('C3:C5')->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D3:D5')->setCellValue('D3', "TGT")->getStyle('D3:D5')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E3:P4')->setCellValue('E3', "REALISASI OMSET")->getStyle('E3:P4')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E5', 'JAN')->getStyle('E5')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F5', 'FEB')->getStyle('F5')->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G5', 'MAR')->getStyle('G5')->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H5', 'APR')->getStyle('H5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I5', 'MEI')->getStyle('I5')->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J5', 'JUN')->getStyle('J5')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K5', 'JUL')->getStyle('K5')->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L5', 'AUG')->getStyle('L5')->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M5', 'SEP')->getStyle('M5')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N5', 'OKT')->getStyle('N5')->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O5', 'NOV')->getStyle('O5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P5', 'DES')->getStyle('P5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart = 6;
        for ($i = 0; $i < count($DataUST); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart, ($i + 1))->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $DataUST[$i]['NAME_AREA'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $DataUST[$i]['TARGET'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $DataUST[$i]['OMSET'][0])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $DataUST[$i]['OMSET'][1])->getStyle('F' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart, $DataUST[$i]['OMSET'][2])->getStyle('G' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart, $DataUST[$i]['OMSET'][3])->getStyle('H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $DataUST[$i]['OMSET'][4])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $DataUST[$i]['OMSET'][5])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $DataUST[$i]['OMSET'][6])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $DataUST[$i]['OMSET'][7])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $DataUST[$i]['OMSET'][8])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $DataUST[$i]['OMSET'][9])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart, $DataUST[$i]['OMSET'][10])->getStyle('O' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart, $DataUST[$i]['OMSET'][11])->getStyle('P' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        // NON UST
        $rowStart2 = $rowStart + 2;
        $ObjSheet->mergeCells('B' . $rowStart2 . ':P' . $rowStart2)->setCellValue('B' . $rowStart2, "NON UST")->getStyle('B' . $rowStart2 . ':P' . $rowStart2)->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->setCellValue('B' . ($rowStart2 + 1), "NO")->getStyle('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->setCellValue('C' . ($rowStart2 + 1), "AREA")->getStyle('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart2 + 1) . ':D' . ($rowStart2 + 3))->setCellValue('D' . ($rowStart2 + 1), "TGT")->getStyle('D' . ($rowStart2 + 1) . ':D' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E' . ($rowStart2 + 1) . ':P' . ($rowStart2 + 2))->setCellValue('E' . ($rowStart2 + 1), "REALISASI OMSET")->getStyle('E' . ($rowStart2 + 1) . ':P' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E' . ($rowStart2 + 3), 'JAN')->getStyle('E' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F' . ($rowStart2 + 3), 'FEB')->getStyle('F' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G' . ($rowStart2 + 3), 'MAR')->getStyle('G' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart2 + 3), 'APR')->getStyle('H' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart2 + 3), 'MEI')->getStyle('I' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J' . ($rowStart2 + 3), 'JUN')->getStyle('J' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart2 + 3), 'JUL')->getStyle('K' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart2 + 3), 'AUG')->getStyle('L' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M' . ($rowStart2 + 3), 'SEP')->getStyle('M' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N' . ($rowStart2 + 3), 'OKT')->getStyle('N' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O' . ($rowStart2 + 3), 'NOV')->getStyle('O' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P' . ($rowStart2 + 3), 'DES')->getStyle('P' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart3 = ($rowStart2 + 4);
        for ($i = 0; $i < count($DataNONUST); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart3, ($i + 1))->getStyle('B' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart3, $DataNONUST[$i]['NAME_AREA'])->getStyle('C' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart3, $DataNONUST[$i]['TARGET'])->getStyle('D' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart3, $DataNONUST[$i]['OMSET'][0])->getStyle('E' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart3, $DataNONUST[$i]['OMSET'][1])->getStyle('F' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart3, $DataNONUST[$i]['OMSET'][2])->getStyle('G' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart3, $DataNONUST[$i]['OMSET'][3])->getStyle('H' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart3, $DataNONUST[$i]['OMSET'][4])->getStyle('I' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart3, $DataNONUST[$i]['OMSET'][5])->getStyle('J' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart3, $DataNONUST[$i]['OMSET'][6])->getStyle('K' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart3, $DataNONUST[$i]['OMSET'][7])->getStyle('L' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart3, $DataNONUST[$i]['OMSET'][8])->getStyle('M' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart3, $DataNONUST[$i]['OMSET'][9])->getStyle('N' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart3, $DataNONUST[$i]['OMSET'][10])->getStyle('O' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart3, $DataNONUST[$i]['OMSET'][11])->getStyle('P' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart3++;
        }

        // SELERAKU
        $rowStart4 = $rowStart3 + 2;
        $ObjSheet->mergeCells('B' . $rowStart4 . ':P' . $rowStart4)->setCellValue('B' . $rowStart4, "SELERAKU")->getStyle('B' . $rowStart4 . ':P' . $rowStart4)->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));
        $ObjSheet->mergeCells('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->setCellValue('B' . ($rowStart4 + 1), "NO")->getStyle('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->setCellValue('C' . ($rowStart4 + 1), "AREA")->getStyle('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart4 + 1) . ':D' . ($rowStart4 + 3))->setCellValue('D' . ($rowStart4 + 1), "TGT")->getStyle('D' . ($rowStart4 + 1) . ':D' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E' . ($rowStart4 + 1) . ':P' . ($rowStart4 + 2))->setCellValue('E' . ($rowStart4 + 1), "REALISASI OMSET")->getStyle('E' . ($rowStart4 + 1) . ':P' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E' . ($rowStart4 + 3), 'JAN')->getStyle('E' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F' . ($rowStart4 + 3), 'FEB')->getStyle('F' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G' . ($rowStart4 + 3), 'MAR')->getStyle('G' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart4 + 3), 'APR')->getStyle('H' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart4 + 3), 'MEI')->getStyle('I' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J' . ($rowStart4 + 3), 'JUN')->getStyle('J' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart4 + 3), 'JUL')->getStyle('K' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart4 + 3), 'AUG')->getStyle('L' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M' . ($rowStart4 + 3), 'SEP')->getStyle('M' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N' . ($rowStart4 + 3), 'OKT')->getStyle('N' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O' . ($rowStart4 + 3), 'NOV')->getStyle('O' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P' . ($rowStart4 + 3), 'DES')->getStyle('P' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart5 = ($rowStart4 + 4);
        for ($i = 0; $i < count($DataSELERAKU); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart5, ($i + 1))->getStyle('B' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart5, $DataSELERAKU[$i]['NAME_AREA'])->getStyle('C' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart5, $DataSELERAKU[$i]['TARGET'])->getStyle('D' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart5, $DataSELERAKU[$i]['OMSET'][0])->getStyle('E' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart5, $DataSELERAKU[$i]['OMSET'][1])->getStyle('F' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart5, $DataSELERAKU[$i]['OMSET'][2])->getStyle('G' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart5, $DataSELERAKU[$i]['OMSET'][3])->getStyle('H' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart5, $DataSELERAKU[$i]['OMSET'][4])->getStyle('I' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart5, $DataSELERAKU[$i]['OMSET'][5])->getStyle('J' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart5, $DataSELERAKU[$i]['OMSET'][6])->getStyle('K' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart5, $DataSELERAKU[$i]['OMSET'][7])->getStyle('L' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart5, $DataSELERAKU[$i]['OMSET'][8])->getStyle('M' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart5, $DataSELERAKU[$i]['OMSET'][9])->getStyle('N' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart5, $DataSELERAKU[$i]['OMSET'][10])->getStyle('O' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart5, $DataSELERAKU[$i]['OMSET'][11])->getStyle('P' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart5++;
        }

        $fileName = 'TREND - ASMEN - ' . date_format(date_create(date("Y-m")), 'F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function generate_trend_rpo()
    {
        $spreadsheet = new Spreadsheet();

        $ObjSheet = $spreadsheet->getActiveSheet();
        $ObjSheet->setTitle("Trend RPO");

        $ObjSheet->getColumnDimension('B')->setWidth('5');
        $ObjSheet->getColumnDimension('C')->setWidth('25');
        $ObjSheet->getColumnDimension('D')->setWidth('18');

        $ObjSheet->getColumnDimension('E')->setWidth('10');
        $ObjSheet->getColumnDimension('F')->setWidth('10');
        $ObjSheet->getColumnDimension('G')->setWidth('10');
        $ObjSheet->getColumnDimension('H')->setWidth('10');
        $ObjSheet->getColumnDimension('I')->setWidth('10');
        $ObjSheet->getColumnDimension('J')->setWidth('10');
        $ObjSheet->getColumnDimension('K')->setWidth('10');
        $ObjSheet->getColumnDimension('L')->setWidth('10');
        $ObjSheet->getColumnDimension('M')->setWidth('10');
        $ObjSheet->getColumnDimension('N')->setWidth('10');
        $ObjSheet->getColumnDimension('O')->setWidth('10');
        $ObjSheet->getColumnDimension('P')->setWidth('10');

        $DataUST = array();
        $DataNONUST = array();
        $DataSELERAKU = array();
        for ($i = 0; $i < count($this->dataTrendRPO); $i++) {
            if ($this->dataTrendRPO[$i]['TYPE'] == "UST") {
                array_push($DataUST, $this->dataTrendRPO[$i]);
            } else if ($this->dataTrendRPO[$i]['TYPE'] == "NON UST") {
                array_push($DataNONUST, $this->dataTrendRPO[$i]);
            } else {
                array_push($DataSELERAKU, $this->dataTrendRPO[$i]);
            }
        }

        // UST
        $ObjSheet->mergeCells('B2:P2')->setCellValue('B2', "UST")->getStyle('B2:P2')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('B3:B5')->setCellValue('B3', "NO")->getStyle('B3:B5')->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C3:C5')->setCellValue('C3', "AREA")->getStyle('C3:C5')->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D3:D5')->setCellValue('D3', "TGT")->getStyle('D3:D5')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E3:P4')->setCellValue('E3', "REALISASI OMSET")->getStyle('E3:P4')->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E5', 'JAN')->getStyle('E5')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F5', 'FEB')->getStyle('F5')->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G5', 'MAR')->getStyle('G5')->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H5', 'APR')->getStyle('H5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I5', 'MEI')->getStyle('I5')->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J5', 'JUN')->getStyle('J5')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K5', 'JUL')->getStyle('K5')->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L5', 'AUG')->getStyle('L5')->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M5', 'SEP')->getStyle('M5')->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N5', 'OKT')->getStyle('N5')->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O5', 'NOV')->getStyle('O5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P5', 'DES')->getStyle('P5')->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart = 6;
        for ($i = 0; $i < count($DataUST); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart, ($i + 1))->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $DataUST[$i]['NAME_AREA'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $DataUST[$i]['TARGET'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $DataUST[$i]['OMSET'][0])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $DataUST[$i]['OMSET'][1])->getStyle('F' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart, $DataUST[$i]['OMSET'][2])->getStyle('G' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart, $DataUST[$i]['OMSET'][3])->getStyle('H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $DataUST[$i]['OMSET'][4])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $DataUST[$i]['OMSET'][5])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $DataUST[$i]['OMSET'][6])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $DataUST[$i]['OMSET'][7])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $DataUST[$i]['OMSET'][8])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $DataUST[$i]['OMSET'][9])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart, $DataUST[$i]['OMSET'][10])->getStyle('O' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart, $DataUST[$i]['OMSET'][11])->getStyle('P' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        // NON UST
        $rowStart2 = $rowStart + 2;
        $ObjSheet->mergeCells('B' . $rowStart2 . ':P' . $rowStart2)->setCellValue('B' . $rowStart2, "NON UST")->getStyle('B' . $rowStart2 . ':P' . $rowStart2)->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->setCellValue('B' . ($rowStart2 + 1), "NO")->getStyle('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->setCellValue('C' . ($rowStart2 + 1), "AREA")->getStyle('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart2 + 1) . ':D' . ($rowStart2 + 3))->setCellValue('D' . ($rowStart2 + 1), "TGT")->getStyle('D' . ($rowStart2 + 1) . ':D' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E' . ($rowStart2 + 1) . ':P' . ($rowStart2 + 2))->setCellValue('E' . ($rowStart2 + 1), "REALISASI OMSET")->getStyle('E' . ($rowStart2 + 1) . ':P' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E' . ($rowStart2 + 3), 'JAN')->getStyle('E' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F' . ($rowStart2 + 3), 'FEB')->getStyle('F' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G' . ($rowStart2 + 3), 'MAR')->getStyle('G' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart2 + 3), 'APR')->getStyle('H' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart2 + 3), 'MEI')->getStyle('I' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J' . ($rowStart2 + 3), 'JUN')->getStyle('J' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart2 + 3), 'JUL')->getStyle('K' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart2 + 3), 'AUG')->getStyle('L' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M' . ($rowStart2 + 3), 'SEP')->getStyle('M' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N' . ($rowStart2 + 3), 'OKT')->getStyle('N' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O' . ($rowStart2 + 3), 'NOV')->getStyle('O' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P' . ($rowStart2 + 3), 'DES')->getStyle('P' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart3 = ($rowStart2 + 4);
        for ($i = 0; $i < count($DataNONUST); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart3, ($i + 1))->getStyle('B' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart3, $DataNONUST[$i]['NAME_AREA'])->getStyle('C' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart3, $DataNONUST[$i]['TARGET'])->getStyle('D' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart3, $DataNONUST[$i]['OMSET'][0])->getStyle('E' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart3, $DataNONUST[$i]['OMSET'][1])->getStyle('F' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart3, $DataNONUST[$i]['OMSET'][2])->getStyle('G' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart3, $DataNONUST[$i]['OMSET'][3])->getStyle('H' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart3, $DataNONUST[$i]['OMSET'][4])->getStyle('I' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart3, $DataNONUST[$i]['OMSET'][5])->getStyle('J' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart3, $DataNONUST[$i]['OMSET'][6])->getStyle('K' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart3, $DataNONUST[$i]['OMSET'][7])->getStyle('L' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart3, $DataNONUST[$i]['OMSET'][8])->getStyle('M' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart3, $DataNONUST[$i]['OMSET'][9])->getStyle('N' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart3, $DataNONUST[$i]['OMSET'][10])->getStyle('O' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart3, $DataNONUST[$i]['OMSET'][11])->getStyle('P' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart3++;
        }

        // SELERAKU
        $rowStart4 = $rowStart3 + 2;
        $ObjSheet->mergeCells('B' . $rowStart4 . ':P' . $rowStart4)->setCellValue('B' . $rowStart4, "SELERAKU")->getStyle('B' . $rowStart4 . ':P' . $rowStart4)->applyFromArray($this->styling_title_template('FF00FF00', 'FF000000'));
        $ObjSheet->mergeCells('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->setCellValue('B' . ($rowStart4 + 1), "NO")->getStyle('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->setCellValue('C' . ($rowStart4 + 1), "AREA")->getStyle('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF66FF33', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart4 + 1) . ':D' . ($rowStart4 + 3))->setCellValue('D' . ($rowStart4 + 1), "TGT")->getStyle('D' . ($rowStart4 + 1) . ':D' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->mergeCells('E' . ($rowStart4 + 1) . ':P' . ($rowStart4 + 2))->setCellValue('E' . ($rowStart4 + 1), "REALISASI OMSET")->getStyle('E' . ($rowStart4 + 1) . ':P' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FF00B0F0', 'FF000000'));

        $ObjSheet->setCellValue('E' . ($rowStart4 + 3), 'JAN')->getStyle('E' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('F' . ($rowStart4 + 3), 'FEB')->getStyle('F' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FF000000'));
        $ObjSheet->setCellValue('G' . ($rowStart4 + 3), 'MAR')->getStyle('G' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFE26B0A', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart4 + 3), 'APR')->getStyle('H' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart4 + 3), 'MEI')->getStyle('I' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF948A54', 'FF000000'));
        $ObjSheet->setCellValue('J' . ($rowStart4 + 3), 'JUN')->getStyle('J' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart4 + 3), 'JUL')->getStyle('K' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFC0504D', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart4 + 3), 'AUG')->getStyle('L' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFC000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('M' . ($rowStart4 + 3), 'SEP')->getStyle('M' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFFFF', 'FF000000'));
        $ObjSheet->setCellValue('N' . ($rowStart4 + 3), 'OKT')->getStyle('N' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFF79646', 'FF000000'));
        $ObjSheet->setCellValue('O' . ($rowStart4 + 3), 'NOV')->getStyle('O' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));
        $ObjSheet->setCellValue('P' . ($rowStart4 + 3), 'DES')->getStyle('P' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FF00B050', 'FF000000'));

        $rowStart5 = ($rowStart4 + 4);
        for ($i = 0; $i < count($DataSELERAKU); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart5, ($i + 1))->getStyle('B' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart5, $DataSELERAKU[$i]['NAME_AREA'])->getStyle('C' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart5, $DataSELERAKU[$i]['TARGET'])->getStyle('D' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart5, $DataSELERAKU[$i]['OMSET'][0])->getStyle('E' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart5, $DataSELERAKU[$i]['OMSET'][1])->getStyle('F' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart5, $DataSELERAKU[$i]['OMSET'][2])->getStyle('G' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart5, $DataSELERAKU[$i]['OMSET'][3])->getStyle('H' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart5, $DataSELERAKU[$i]['OMSET'][4])->getStyle('I' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart5, $DataSELERAKU[$i]['OMSET'][5])->getStyle('J' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart5, $DataSELERAKU[$i]['OMSET'][6])->getStyle('K' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart5, $DataSELERAKU[$i]['OMSET'][7])->getStyle('L' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart5, $DataSELERAKU[$i]['OMSET'][8])->getStyle('M' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart5, $DataSELERAKU[$i]['OMSET'][9])->getStyle('N' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('O' . $rowStart5, $DataSELERAKU[$i]['OMSET'][10])->getStyle('O' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('P' . $rowStart5, $DataSELERAKU[$i]['OMSET'][11])->getStyle('P' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart5++;
        }

        $fileName = 'TREND - RPO - ' . date_format(date_create(date("Y-m")), 'F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function generate_ranking_apo_spg()
    {
        $spreadsheet = new Spreadsheet();

        $ObjSheet = $spreadsheet->createSheet(0);
        $ObjSheet->setTitle("RANGKING APO & SPG");

        $ObjSheet->getColumnDimension('B')->setWidth('25');
        $ObjSheet->getColumnDimension('C')->setWidth('25');

        $ObjSheet->getColumnDimension('D')->setWidth('8');
        $ObjSheet->getColumnDimension('E')->setWidth('8');
        $ObjSheet->getColumnDimension('F')->setWidth('8');
        $ObjSheet->getColumnDimension('G')->setWidth('8');
        $ObjSheet->getColumnDimension('H')->setWidth('8');
        $ObjSheet->getColumnDimension('I')->setWidth('8');
        $ObjSheet->getColumnDimension('J')->setWidth('8');
        $ObjSheet->getColumnDimension('K')->setWidth('8');
        $ObjSheet->getColumnDimension('L')->setWidth('8');

        $ObjSheet->getColumnDimension('M')->setWidth('12');
        $ObjSheet->getColumnDimension('N')->setWidth('12');
        $ObjSheet->getColumnDimension('O')->setWidth('2');
        $ObjSheet->getColumnDimension('P')->setWidth('10');
        $ObjSheet->getColumnDimension('Q')->setWidth('10');

        $ObjSheet->getRowDimension('5')->setRowHeight('20');
        $ObjSheet->getRowDimension('6')->setRowHeight('20');
        $ObjSheet->getRowDimension('7')->setRowHeight('30');

        $ObjSheet->mergeCells('B2:N2')->setCellValue('B2', strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('B2:N2')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        // Activity APO
        $ObjSheet->setCellValue('B4', 'AKTIVITY APO')->getStyle('B4')->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F4', 'Bobot 50%')->getStyle('F4')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I4', 'Bobot 25%')->getStyle('I4')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L4', 'Bobot 25%')->getStyle('L4')->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->mergeCells('K3:M3')->setCellValue('K3', ' RANGKING ' . strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('K3:M3')->applyFromArray($this->styling_default_template(10, 'FF000000'));

        $ObjSheet->mergeCells('B5:B7')->setCellValue('B5', 'NAMA')->getStyle('B5:B7')->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C5:C7')->setCellValue('C5', 'AREA')->getStyle('C5:C7')->applyFromArray($this->styling_title_template('FFC000', 'FF000000'));
        $ObjSheet->mergeCells('D5:L5')->setCellValue('D5', 'KATEGORI')->getStyle('D5:L5')->applyFromArray($this->styling_title_template('00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D6:F6')->setCellValue('D6', 'AKTIVITAS UB')->getStyle('D6:F6')->applyFromArray($this->styling_title_template('FF81FF', 'FF000000'));
        $ObjSheet->mergeCells('G6:I6')->setCellValue('G6', 'PEDAGANG SAYUR')->getStyle('G6:I6')->applyFromArray($this->styling_title_template('D8E4BC', 'FF000000'));
        $ObjSheet->mergeCells('J6:L6')->setCellValue('J6', 'RETAIL')->getStyle('J6:L6')->applyFromArray($this->styling_title_template('FFFF00', 'FF000000'));

        $ObjSheet->setCellValue('D7', 'TGT')->getStyle('D7')->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('E7', 'REAL')->getStyle('E7')->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('F7', '% VS TGT')->getStyle('F7')->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G7', 'TGT')->getStyle('G7')->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('H7', 'REAL')->getStyle('H7')->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('I7', '% VS TGT')->getStyle('I7')->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J7', 'TGT')->getStyle('J7')->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('K7', 'REAL')->getStyle('K7')->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('L7', '% VS TGT')->getStyle('L7')->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M5:M7')->setCellValue('M5', '% AVG')->getStyle('M5:M7')->applyFromArray($this->styling_title_template('92CDDC', 'FF000000'));
        $ObjSheet->mergeCells('N5:N7')->setCellValue('N5', 'RANGKING')->getStyle('N5:N7')->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $rowStart = 8;
        for ($i = 0; $i < count($this->dataAktifitasAPO); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart, $this->dataAktifitasAPO[$i]['NAME_USER'])->getStyle('B' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart, $this->dataAktifitasAPO[$i]['NAME_AREA'])->getStyle('C' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart, $this->dataAktifitasAPO[$i]['TARGET_UB'])->getStyle('D' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart, $this->dataAktifitasAPO[$i]['REAL_UB'])->getStyle('E' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart, $this->dataAktifitasAPO[$i]['VSTARGET_UB'])->getStyle('F' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart, $this->dataAktifitasAPO[$i]['TARGET_UB'])->getStyle('G' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart, $this->dataAktifitasAPO[$i]['REAL_UB'])->getStyle('H' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart, $this->dataAktifitasAPO[$i]['VSTARGET_UB'])->getStyle('I' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart, $this->dataAktifitasAPO[$i]['TARGET_UB'])->getStyle('J' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart, $this->dataAktifitasAPO[$i]['REAL_UB'])->getStyle('K' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart, $this->dataAktifitasAPO[$i]['VSTARGET_UB'])->getStyle('L' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart, $this->dataAktifitasAPO[$i]['AVERAGE'])->getStyle('M' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart, $this->dataAktifitasAPO[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart++;
        }

        // Pencapaian APO
        $rowStart2 = $rowStart + 2;
        $ObjSheet->setCellValue('B' . $rowStart2, 'PENCAPAIAN APO')->getStyle('B' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart2, 'Bobot 75%')->getStyle('F' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart2, 'Bobot 0%')->getStyle('I' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart2, 'Bobot 25%')->getStyle('L' . $rowStart2)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));

        $ObjSheet->mergeCells('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->setCellValue('B' . ($rowStart2 + 1), 'NAMA')->getStyle('B' . ($rowStart2 + 1) . ':B' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->setCellValue('C' . ($rowStart2 + 1), 'AREA')->getStyle('C' . ($rowStart2 + 1) . ':C' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFC000', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->setCellValue('D' . ($rowStart2 + 1), 'KATEGORI')->getStyle('D' . ($rowStart2 + 1) . ':L' . ($rowStart2 + 1))->applyFromArray($this->styling_title_template('00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->setCellValue('D' . ($rowStart2 + 2), 'NON UST')->getStyle('D' . ($rowStart2 + 2) . ':F' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->setCellValue('G' . ($rowStart2 + 2), 'UST')->getStyle('G' . ($rowStart2 + 2) . ':I' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->setCellValue('J' . ($rowStart2 + 2), 'SELERAKU')->getStyle('J' . ($rowStart2 + 2) . ':L' . ($rowStart2 + 2))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart2 + 3), 'TGT')->getStyle('D' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart2 + 3), 'REAL')->getStyle('E' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart2 + 3), '% VS TGT')->getStyle('F' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart2 + 3), 'TGT')->getStyle('G' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart2 + 3), 'REAL')->getStyle('H' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart2 + 3), '% VS TGT')->getStyle('I' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart2 + 3), 'TGT')->getStyle('J' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart2 + 3), 'REAL')->getStyle('K' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart2 + 3), '% VS TGT')->getStyle('L' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->setCellValue('M' . ($rowStart2 + 1), '% AVG')->getStyle('M' . ($rowStart2 + 1) . ':M' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('92CDDC', 'FF000000'));
        $ObjSheet->mergeCells('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->setCellValue('N' . ($rowStart2 + 1), 'RANGKING')->getStyle('N' . ($rowStart2 + 1) . ':N' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $ObjSheet->setCellValue('P' . ($rowStart2 + 2), 'UBNG')->getStyle('P' . ($rowStart2 + 2))->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'));
        $ObjSheet->setCellValue('P' . ($rowStart2 + 3), 'TGT')->getStyle('P' . ($rowStart2 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));

        $rowStart3 = ($rowStart2 + 4);
        for ($i = 0; $i < count($this->dataPencapaianAPO); $i++) {

            $ObjSheet->setCellValue('B' . $rowStart3, $this->dataPencapaianAPO[$i]['NAME_USER'])->getStyle('B' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart3, $this->dataPencapaianAPO[$i]['NAME_AREA'])->getStyle('C' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart3, $this->dataPencapaianAPO[$i]['TARGET_NONUST'])->getStyle('D' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart3, $this->dataPencapaianAPO[$i]['REAL_NONUST'])->getStyle('E' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart3, $this->dataPencapaianAPO[$i]['VSTARGET_NONUST'])->getStyle('F' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart3, $this->dataPencapaianAPO[$i]['TARGET_UST'])->getStyle('G' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart3, $this->dataPencapaianAPO[$i]['REAL_UST'])->getStyle('H' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart3, $this->dataPencapaianAPO[$i]['VSTARGET_UST'])->getStyle('I' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart3, $this->dataPencapaianAPO[$i]['TARGET_SELERAKU'])->getStyle('J' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart3, $this->dataPencapaianAPO[$i]['REAL_SELERAKU'])->getStyle('K' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart3, $this->dataPencapaianAPO[$i]['VSTARGET_SELERAKU'])->getStyle('L' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart3, $this->dataPencapaianAPO[$i]['AVERAGE'])->getStyle('M' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart3, $this->dataPencapaianAPO[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('P' . $rowStart3)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart3++;
        }

        // Activity SPG
        $rowStart4 = $rowStart3 + 3;
        $ObjSheet->mergeCells('B' . ($rowStart4 - 1) . ':N' . ($rowStart4 - 1))->setCellValue('B' . ($rowStart4 - 1), strtoupper(date_format(date_create(date("Y-m")), 'F Y')))->getStyle('B' . ($rowStart4 - 1) . ':N' . ($rowStart4 - 1))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));
        $ObjSheet->setCellValue('B' . $rowStart4, 'AKTIVITY SPG')->getStyle('B' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart4, 'Bobot 50%')->getStyle('F' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart4, 'Bobot 25%')->getStyle('I' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart4, 'Bobot 25%')->getStyle('L' . $rowStart4)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));

        $ObjSheet->mergeCells('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->setCellValue('B' . ($rowStart4 + 1), 'NAMA')->getStyle('B' . ($rowStart4 + 1) . ':B' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->setCellValue('C' . ($rowStart4 + 1), 'AREA')->getStyle('C' . ($rowStart4 + 1) . ':C' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFC000', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart4 + 1) . ':L' . ($rowStart4 + 1))->setCellValue('D' . ($rowStart4 + 1), 'KATEGORI')->getStyle('D' . ($rowStart4 + 1) . ':L' . ($rowStart4 + 1))->applyFromArray($this->styling_title_template('00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart4 + 2) . ':F' . ($rowStart4 + 2))->setCellValue('D' . ($rowStart4 + 2), 'AKTIVITAS UB')->getStyle('D' . ($rowStart4 + 2) . ':F' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FF81FF', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart4 + 2) . ':I' . ($rowStart4 + 2))->setCellValue('G' . ($rowStart4 + 2), 'PEDAGANG SAYUR')->getStyle('G' . ($rowStart4 + 2) . ':I' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('D8E4BC', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart4 + 2) . ':L' . ($rowStart4 + 2))->setCellValue('J' . ($rowStart4 + 2), 'RETAIL')->getStyle('J' . ($rowStart4 + 2) . ':L' . ($rowStart4 + 2))->applyFromArray($this->styling_title_template('FFFF00', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart4 + 3), 'TGT')->getStyle('D' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart4 + 3), 'REAL')->getStyle('E' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart4 + 3), '% VS TGT')->getStyle('F' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart4 + 3), 'TGT')->getStyle('G' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart4 + 3), 'REAL')->getStyle('H' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart4 + 3), '% VS TGT')->getStyle('I' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart4 + 3), 'TGT')->getStyle('J' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart4 + 3), 'REAL')->getStyle('K' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart4 + 3), '% VS TGT')->getStyle('L' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart4 + 1) . ':M' . ($rowStart4 + 3))->setCellValue('M' . ($rowStart4 + 1), '% AVG')->getStyle('M' . ($rowStart4 + 1) . ':M' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('92CDDC', 'FF000000'));
        $ObjSheet->mergeCells('N' . ($rowStart4 + 1) . ':N' . ($rowStart4 + 3))->setCellValue('N' . ($rowStart4 + 1), 'RANGKING')->getStyle('N' . ($rowStart4 + 1) . ':N' . ($rowStart4 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $rowStart5 = ($rowStart4 + 4);
        for ($i = 0; $i < count($this->dataAktifitasSPG); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart5, $this->dataAktifitasSPG[$i]['NAME_USER'])->getStyle('B' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart5, $this->dataAktifitasSPG[$i]['NAME_AREA'])->getStyle('C' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart5, $this->dataAktifitasSPG[$i]['TARGET_UB'])->getStyle('D' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart5, $this->dataAktifitasSPG[$i]['REAL_UB'])->getStyle('E' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart5, $this->dataAktifitasSPG[$i]['VSTARGET_UB'])->getStyle('F' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart5, $this->dataAktifitasSPG[$i]['TARGET_UB'])->getStyle('G' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart5, $this->dataAktifitasSPG[$i]['REAL_UB'])->getStyle('H' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart5, $this->dataAktifitasSPG[$i]['VSTARGET_UB'])->getStyle('I' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart5, $this->dataAktifitasSPG[$i]['TARGET_UB'])->getStyle('J' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart5, $this->dataAktifitasSPG[$i]['REAL_UB'])->getStyle('K' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart5, $this->dataAktifitasSPG[$i]['VSTARGET_UB'])->getStyle('L' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart5, $this->dataAktifitasSPG[$i]['AVERAGE'])->getStyle('M' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart5, $this->dataAktifitasSPG[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart5)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart5++;
        }


        // Pencapaian SPG
        $rowStart6 = $rowStart5 + 2;
        $ObjSheet->setCellValue('B' . $rowStart6, 'PENCAPAIAN SPG')->getStyle('B' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FF000000'));
        $ObjSheet->setCellValue('F' . $rowStart6, 'Bobot 75%')->getStyle('F' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('I' . $rowStart6, 'Bobot 0%')->getStyle('I' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));
        $ObjSheet->setCellValue('L' . $rowStart6, 'Bobot 25%')->getStyle('L' . $rowStart6)->applyFromArray($this->styling_default_template(10, 'FFFF0000'));

        $ObjSheet->mergeCells('B' . ($rowStart6 + 1) . ':B' . ($rowStart6 + 3))->setCellValue('B' . ($rowStart6 + 1), 'NAMA')->getStyle('B' . ($rowStart6 + 1) . ':B' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('C' . ($rowStart6 + 1) . ':C' . ($rowStart6 + 3))->setCellValue('C' . ($rowStart6 + 1), 'AREA')->getStyle('C' . ($rowStart6 + 1) . ':C' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFC000', 'FF000000'));
        $ObjSheet->mergeCells('D' . ($rowStart6 + 1) . ':L' . ($rowStart6 + 1))->setCellValue('D' . ($rowStart6 + 1), 'KATEGORI')->getStyle('D' . ($rowStart6 + 1) . ':L' . ($rowStart6 + 1))->applyFromArray($this->styling_title_template('00B0F0', 'FF000000'));

        $ObjSheet->mergeCells('D' . ($rowStart6 + 2) . ':F' . ($rowStart6 + 2))->setCellValue('D' . ($rowStart6 + 2), 'NON UST')->getStyle('D' . ($rowStart6 + 2) . ':F' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('FFFFFF00', 'FF000000'));
        $ObjSheet->mergeCells('G' . ($rowStart6 + 2) . ':I' . ($rowStart6 + 2))->setCellValue('G' . ($rowStart6 + 2), 'UST')->getStyle('G' . ($rowStart6 + 2) . ':I' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('FFFF0000', 'FF000000'));
        $ObjSheet->mergeCells('J' . ($rowStart6 + 2) . ':L' . ($rowStart6 + 2))->setCellValue('J' . ($rowStart6 + 2), 'SELERAKU')->getStyle('J' . ($rowStart6 + 2) . ':L' . ($rowStart6 + 2))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));

        $ObjSheet->setCellValue('D' . ($rowStart6 + 3), 'TGT')->getStyle('D' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('E' . ($rowStart6 + 3), 'REAL')->getStyle('E' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('F' . ($rowStart6 + 3), '% VS TGT')->getStyle('F' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('G' . ($rowStart6 + 3), 'TGT')->getStyle('G' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('H' . ($rowStart6 + 3), 'REAL')->getStyle('H' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('I' . ($rowStart6 + 3), '% VS TGT')->getStyle('I' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->setCellValue('J' . ($rowStart6 + 3), 'TGT')->getStyle('J' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('8DB4E2', 'FF000000'));
        $ObjSheet->setCellValue('K' . ($rowStart6 + 3), 'REAL')->getStyle('K' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('92D050', 'FF000000'));
        $ObjSheet->setCellValue('L' . ($rowStart6 + 3), '% VS TGT')->getStyle('L' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FDE9D9', 'FF000000'))->getAlignment()->setWrapText(true);

        $ObjSheet->mergeCells('M' . ($rowStart6 + 1) . ':M' . ($rowStart6 + 3))->setCellValue('M' . ($rowStart6 + 1), '% AVG')->getStyle('M' . ($rowStart6 + 1) . ':M' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('92CDDC', 'FF000000'));
        $ObjSheet->mergeCells('N' . ($rowStart6 + 1) . ':N' . ($rowStart6 + 3))->setCellValue('N' . ($rowStart6 + 1), 'RANGKING')->getStyle('N' . ($rowStart6 + 1) . ':N' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFFF0000', 'FFFFFFFF'));

        $ObjSheet->setCellValue('P' . ($rowStart6 + 2), 'UBNG')->getStyle('P' . ($rowStart6 + 2))->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'));
        $ObjSheet->setCellValue('P' . ($rowStart6 + 3), 'TGT')->getStyle('P' . ($rowStart6 + 3))->applyFromArray($this->styling_title_template('FFBDD7EE', 'FF000000'));

        $rowStart7 = ($rowStart6 + 4);
        for ($i = 0; $i < count($this->dataPencapaianSPG); $i++) {
            $ObjSheet->setCellValue('B' . $rowStart7, $this->dataPencapaianSPG[$i]['NAME_USER'])->getStyle('B' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('C' . $rowStart7, $this->dataPencapaianSPG[$i]['NAME_AREA'])->getStyle('C' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('D' . $rowStart7, $this->dataPencapaianSPG[$i]['TARGET_NONUST'])->getStyle('D' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('E' . $rowStart7, $this->dataPencapaianSPG[$i]['REAL_NONUST'])->getStyle('E' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('F' . $rowStart7, $this->dataPencapaianSPG[$i]['VSTARGET_NONUST'])->getStyle('F' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('G' . $rowStart7, $this->dataPencapaianSPG[$i]['TARGET_UST'])->getStyle('G' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('H' . $rowStart7, $this->dataPencapaianSPG[$i]['REAL_UST'])->getStyle('H' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('I' . $rowStart7, $this->dataPencapaianSPG[$i]['VSTARGET_UST'])->getStyle('I' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('J' . $rowStart7, $this->dataPencapaianSPG[$i]['TARGET_SELERAKU'])->getStyle('J' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('K' . $rowStart7, $this->dataPencapaianSPG[$i]['REAL_SELERAKU'])->getStyle('K' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('L' . $rowStart7, $this->dataPencapaianSPG[$i]['VSTARGET_SELERAKU'])->getStyle('L' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('M' . $rowStart7, $this->dataPencapaianSPG[$i]['AVERAGE'])->getStyle('M' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->setCellValue('N' . $rowStart7, $this->dataPencapaianSPG[$i]['ID_USER_RANKSALE'])->getStyle('N' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);
            $ObjSheet->getStyle('P' . $rowStart7)->applyFromArray($this->styling_content_template('00FFFFFF', '00000000'))->getAlignment()->setWrapText(true);

            $rowStart7++;
        }

        $fileName = 'RANKING - APO - SPG - ' . date_format(date_create(date("Y-m")), 'F Y');
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="' . $fileName . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
