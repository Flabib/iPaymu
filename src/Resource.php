<?php
/**
 * @author Fahdi Labib <fahdilabib@gmail.com>
 */

namespace Flabib\iPaymu;

class Resource
{
    public $balance, $transaction, $payment, $cstore, $vacn, $vabni, $vabag, $vamandiri, $bankbca;

    /**
     * Resource constructor.
     *
     * @param bool $production
     */
    public function __construct($production) {
        if($production) {
            $base = 'https://my.ipaymu.com/';
        } else {
            $base = 'http://sandbox.ipaymu.com/';
        }

        $this->balance = $base . 'api/saldo';
        $this->transaction = $base . 'api/transaksi';
        $this->payment = $base . 'payment';
        $this->cstore = $base . 'api/payment/cstore';
        $this->vacn = $base . 'api/getva';
        $this->vabni = $base . 'api/getbniva';
        $this->vabag = $base . 'api/getbagva';
        $this->vamandiri = $base . 'api/getmandiriva';
        $this->bankbca = $base . 'api/bcatransfer';

        return $this;
    }

    // will be developed next release
    // public static $PAYMENT_COD_REQUEST_SESSION_ID = 'https://my.ipaymu.com/api/payment/getsid';
    // public static $PAYMENT_COD = 'https://my.ipaymu.com/api/payment/cod';
    // public static $PAYMENT_COD_SHIPPING_FEE = 'https://my.ipaymu.com/api/payment/cod';
    // public static $PAYMENT_COD_AREA = 'https://my.ipaymu.com/api/payment/cod';
}
