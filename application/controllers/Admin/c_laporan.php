<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/m_laporan');
        $this->load->library('pdf');
    }
    public function barang()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN BARANG UTI FASHION', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(30, 6, 'KODE BARANG', 1, 0, 'C');
        $pdf->Cell(45, 6, 'KATEGORI BARANG', 1, 0, 'C');
        $pdf->Cell(70, 6, 'NAMA BARANG', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $barang = $this->m_laporan->barang();
        foreach ($barang as $row) {
            $pdf->Cell(25, 6, $no++, 1, 0, 'C');
            $pdf->Cell(30, 6, $row->id_barang, 1, 0);
            $pdf->Cell(45, 6, $row->nama_kategori, 1, 0);
            $pdf->Cell(70, 6,  $row->nama_barang, 1, 1);
        }
        $pdf->Output();
    }
    public function order()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN ORDER UTI FASHION', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(40, 6, 'ID TRANSAKSI', 1, 0, 'C');
        $pdf->Cell(45, 6, 'ATAS NAMA', 1, 0, 'C');
        $pdf->Cell(50, 6, 'TOTAL PEMBAYARAN', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $order = $this->m_laporan->order_selesai();
        foreach ($order as $row) {
            $pdf->Cell(25, 6, $no++, 1, 0, 'C');
            $pdf->Cell(40, 6, $row->id_transaksi, 1, 0);
            $pdf->Cell(45, 6, $row->atas_nama, 1, 0);
            $pdf->Cell(50, 6,  $row->total_bayar, 1, 1);
        }
        $pdf->Output();
    }
    public function detail_pemesanan($id_transaksi)
    { {
            $pdf = new FPDF('p', 'mm', 'A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial', 'B', 20);
            // mencetak string 
            $pdf->Cell(190, 7, 'UTI FASHION', 0, 1, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(190, 7, 'Pasar Kepuh Kuningan', 0, 1, 'C');
            $pdf->Cell(190, 7, '-----------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
            $pdf->Cell(10, 7, '', 0, 1);
            $pdf->SetFont('Arial', '', 10);
            $transaksi = $this->m_laporan->transaksi($id_transaksi);
            foreach ($transaksi['transaksi'] as $key => $value) {
                $pdf->Cell(40, 7, 'Id Transaksi', 0, 0, 'L');
                $pdf->Cell(50, 7, $value->id_transaksi, 0, 1, 'L');
                $pdf->Cell(40, 7, 'Date/Time', 0, 0, 'L');
                $pdf->Cell(50, 7, $value->tgl_order, 0, 1, 'L');
            }



            $pdf->Cell(10, 7, '', 0, 1);

            $detail = $this->m_laporan->transaksi($id_transaksi);
            foreach ($detail['detail'] as $value) {
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(190, 7, $value->nama_barang, 0, 1, 'L');
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(50, 7, number_format($value->jumlah, 0), 0, 0, 'L');
                $pdf->Cell(50, 7, 'X', 0, 0, 'L');
                $pdf->Cell(50, 7, 'Rp. ' . number_format($value->harga - ($value->diskon / 100 * $value->harga), 0), 0, 0, 'L');
                $pdf->Cell(50, 7, 'Rp. ' . number_format($value->jumlah * ($value->harga - ($value->diskon / 100 * $value->harga)), 0), 0, 1, 'L');
            }

            $pdf->Cell(20, 7, '', 0, 1);
            $pdf->SetFont('Arial', 'B', 10);
            $transaksi = $this->m_laporan->transaksi($id_transaksi);
            foreach ($transaksi['transaksi'] as $key => $value) {
                $pdf->Cell(150, 7, 'TOTAL : ', 0, 0, 'R');
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(30, 7, 'Rp. ' . number_format($value->subtotal, 0), 0, 1, 'R');
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Cell(150, 7, 'BAYAR : ', 0, 0, 'R');
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(30, 7, 'Rp. ' . number_format($value->total_bayar, 0), 0, 1, 'R');
            }
            $pdf->Output();
        }
    }
}
