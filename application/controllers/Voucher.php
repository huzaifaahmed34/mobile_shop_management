<?php
class Voucher extends CI_Controller {



    function __construct(){

		parent:: __construct();

        $this->load->model('VoucherModel', 'm');

		

    }
    public function PaymentVoucher()

    {
        $this->load->view('admin/header');

        $this->load->view('admin/sidebar');
    $this->load->view('admin/rightsidebar');

        $this->load->view('user/payment_voucher');

        $this->load->view('admin/footer');

    }

 public function AddPaymentVoucher()

    {
        $data=$this->m->AddPaymentVoucher();

        echo json_encode($data);
    

    }
}