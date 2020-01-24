<?php
/**
 * @author Franky So <frankyso.mail@gmail.com>
 */

namespace flabib\iPaymu;

class Resource
{
    protected $balance, $transaction, $payment;

    /**
     * Resource constructor.
     *
     * @param bool $production
     */
    public function __construct($production = false) {
        if($production) {
            $base = 'https://my.ipaymu.com/';
        } else {
            $base = 'http://sandbox.ipaymu.com/';
        }

        $this->balance = $base + 'api/saldo';
        $this->transaction = $base + 'api/transaksi';
        $this->payment = $base + 'payment';

        return $this;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getTransaction() {
        return $this->transaction;
    }

    public function getPayment() {
        return $this->payment;
    }

    // will be developed next release
    // public static $PAYMENT_COD_REQUEST_SESSION_ID = 'https://my.ipaymu.com/api/payment/getsid';
    // public static $PAYMENT_COD = 'https://my.ipaymu.com/api/payment/cod';
    // public static $PAYMENT_COD_SHIPPING_FEE = 'https://my.ipaymu.com/api/payment/cod';
    // public static $PAYMENT_COD_AREA = 'https://my.ipaymu.com/api/payment/cod';
}
