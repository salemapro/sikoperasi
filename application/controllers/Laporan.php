<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_pembayaran");
        $this->load->model("M_pinjaman");
        // $this->load->library('form_validation');
    }

    public function print_data_pembayaran($id)
    {

        // Fetch the payment data for the given id
        $pembayaran = $this->M_pembayaran->get_all_detail($id);
        $pinjaman = $this->M_pinjaman->get_data_by_id($id);

        // Check if data is available
        if (empty($pembayaran)) {
            show_error('No data available to generate the report');
            return;
        }

        if (empty($pinjaman)) {
            show_error('No data available to generate the report');
            return;
        }

        require_once APPPATH . 'third_party/fpdf/fpdf.php';

        // $pdf = new FPDF();
        // $pdf->AddPage();
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->setMargins(20, 18, 18);
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(125);
        $pdf->SetFont('Arial', 'B', '12');
        $pdf->Cell(10, 6, 'Laporan Pembayaran Pinjaman', 0, 6, 'C');
        $pdf->Cell(1, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 10);

        // $pdf->Cell(62);
        // $pdf->Cell(10, 6, 'Data P', 1, 6, 'L');

        //row1
        $pdf->Cell(30, 6, 'No. Pinjaman', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->no_pinjaman, 0, 0, 'L');
        $pdf->Cell(2, 6, '', 0, 0, 'L');
        $pdf->Cell(30, 6, 'Jumlah Cicilan', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->jml_cicilan_pinjam, 0, 0, 'L');
        $pdf->Cell(10, 6, '', 0, 1);

        //row2
        $pdf->Cell(30, 6, 'Tanggal Pinjaman', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->tgl_pinjaman, 0, 0, 'L');

        $pdf->Cell(2, 6, '', 0, 0, 'L');
        $pdf->Cell(30, 6, 'Status Pinjaman', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->catatan_peminjaman, 0, 0, 'L');
        $pdf->Cell(10, 6, '', 0, 1);

        //row3
        $pdf->Cell(30, 6, 'Jumlah Pinjaman', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->jml_pinjaman, 0, 0, 'L');
        $pdf->Cell(2, 6, '', 0, 0, 'L');
        $pdf->Cell(30, 6, 'Tenor', 0, 0, 'L');
        $pdf->Cell(3, 6, ':', 0, 0, 'L');
        $pdf->Cell(96, 6, $pinjaman->tenor, 0, 0, 'L');
        $pdf->Cell(10, 6, '', 0, 1);

        $pdf->Cell(10, 6, '', 0, 1);



        // Table header
        $pdf->Cell(10, 6, 'No', 1);
        $pdf->Cell(45, 6, 'Nama', 1);
        $pdf->Cell(26, 6, 'No Pinjaman', 1);
        $pdf->Cell(35, 6, 'No Pembayaran', 1);
        $pdf->Cell(21, 6, 'Cicilan Ke', 1);
        $pdf->Cell(37, 6, 'Jumlah Bayaran', 1);
        $pdf->Cell(30, 6, 'Status', 1);
        $pdf->Cell(42, 6, 'Tanggal Bayaran', 1);
        $pdf->Ln();

        // Table data
        $no = 1;
        foreach ($pembayaran as $value) {
            $pdf->Cell(10, 6, $no++, 1);
            $pdf->Cell(45, 6, $value->nama_peminjam, 1);
            $pdf->Cell(26, 6, $value->no_pinjaman, 1);
            $pdf->Cell(35, 6, ($value->status_bayar == 1) ? $value->no_pembayaran : '-', 1);
            $pdf->Cell(21, 6, $value->cicilan_ke, 1);
            $pdf->Cell(37, 6, $value->jml_bayar, 1);
            $pdf->Cell(30, 6, ($value->status_bayar == 1) ? 'Sudah Bayar' : 'Belum Bayar', 1);
            $pdf->Cell(42, 6, ($value->status_bayar == 1) ? $value->tgl_bayar : '-', 1);
            $pdf->Ln();
        }

        // Output the PDF file
        // $pdf->Output('D', 'Data_Pembayaran_' . $id . '.pdf');
        $pdf->Output();
    }

    public function print_data_pinjaman_admin()
    {
        $pinjaman = $this->M_pinjaman->getAll();
        if (empty($pinjaman)) {
            show_error('No data available to generate the report');
            return;
        }

        require_once APPPATH . 'third_party/fpdf/fpdf.php';

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->setMargins(20, 18, 18);
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(125);
        $pdf->SetFont('Arial', 'B', '14');
        $pdf->Cell(10, 6, 'Laporan Pinjaman Karyawan', 0, 6, 'C');
        $pdf->Cell(1, 5, '', 0, 1);

        $pdf->SetFont('Arial', '', 10);
        // Table header
        $pdf->Cell(8, 6, 'No', 1);
        $pdf->Cell(45, 6, 'Nama Peminjam', 1);
        $pdf->Cell(23, 6, 'No Pinjaman', 1);
        $pdf->Cell(37, 6, 'Jumlah Pinjaman', 1);
        $pdf->Cell(31, 6, 'Tanggal Pinjaman', 1);
        $pdf->Cell(26, 6, 'Tenor', 1);
        $pdf->Cell(25, 6, 'Jumlah Cicilan', 1);
        $pdf->Cell(37, 6, 'Besar Cicilan', 1);
        $pdf->Cell(27, 6, 'Status', 1);
        $pdf->Ln();

        // Table data
        $no = 1;
        foreach ($pinjaman as $value) {
            $pdf->Cell(8, 6, $no++, 1);
            $pdf->Cell(45, 6, $value->nama_peminjam, 1);
            $pdf->Cell(23, 6, $value->no_pinjaman, 1);
            $pdf->Cell(37, 6, $value->jml_pinjaman, 1);
            $pdf->Cell(31, 6, $value->tgl_pinjaman, 1);
            $pdf->Cell(26, 6, $value->tenor, 1);
            $pdf->Cell(25, 6, $value->jml_cicilan_pinjam, 1);
            $pdf->Cell(37, 6, $value->besar_cicilan_pinjam, 1);
            $pdf->Cell(27, 6, $value->catatan_peminjaman, 1);
            $pdf->Ln();
        }

        // Output the PDF file
        // $pdf->Output('D', 'Data_Pembayaran_' . $id . '.pdf');
        $pdf->Output();
    }
}
