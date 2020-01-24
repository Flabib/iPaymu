<?php
/**
 * @author Franky So <frankyso.mail@gmail.com>
 */

namespace Flabib\iPaymu;

use Flabib\iPaymu\Exceptions\ApiKeyInvalid;
use Flabib\iPaymu\Exceptions\ApiKeyNotFound;
use Flabib\iPaymu\Traits\CurlTrait;

class iPaymu
{
    use CurlTrait;

    /**
     * iPaymu Api Key.
     *
     * @var
     */
    protected $apiKey;

    /**
     * @var Cart, Cart Object Builder
     */
    protected $cart;

    /**
     * @var , Url redirect after payment page
     */
    protected $ureturn;

    /**
     * @var , Url Notify when transaction paid
     */
    protected $unotify;

    /**
     * @var , Url Redirect when user cancel the transaction
     */
    protected $ucancel;

    /**
     * @var , Store API Url
     */
    protected $resource;

    /**
     * iPaymu constructor.
     *
     * @param null  $apiKey
     * @param array $url
     * @param bool $production
     *
     * @throws ApiKeyNotFound
     */
    public function __construct($apiKey = null, $production = false, $url = ['', '', ''])
    {
        $this->$resource = new Resource($production);

        $this->setApiKey($apiKey);
        $this->cart = new Cart($this);
        $this->setUcancel($url[0]);
        $this->setUreturn($url[1]);
        $this->setUnotify($url[2]);
    }

    /**
     * Set Api Key.
     *
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @return mixed
     */
    public function getUreturn()
    {
        return $this->ureturn;
    }

    /**
     * @param mixed $ureturn
     */
    public function setUreturn($ureturn)
    {
        $this->ureturn = $ureturn;
    }

    /**
     * @return mixed
     */
    public function getUcancel()
    {
        return $this->ucancel;
    }

    /**
     * @param mixed $ucancel
     */
    public function setUcancel($ucancel)
    {
        $this->ucancel = $ucancel;
    }

    /**
     * @return mixed
     */
    public function getUnotify()
    {
        return $this->unotify;
    }

    /**
     * @param mixed $unotify
     */
    public function setUnotify($unotify)
    {
        $this->unotify = $unotify;
    }

    /**
     * Get ApiKey Value.
     *
     * @param null $apiKey Api Key from iPaymu Dashboard.
     *
     * @throws ApiKeyNotFound
     */
    public function setApiKey($apiKey = null)
    {
        if ($apiKey == null) {
            throw new ApiKeyNotFound();
        }
        $this->apiKey = $apiKey;
    }

    /**
     * Check if Api Key inserted is valid or not.
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function isApiKeyValid()
    {
        try {
            $this->checkBalance();

            return true;
        } catch (ApiKeyInvalid $e) {
            return false;
        }
    }

    /**
     * Check Balance.
     */
    public function checkBalance()
    {
        $response = $this->request($this->response->getBalance(), [
            'key'    => $this->apiKey,
            'format' => 'json',
        ]);

        return $response;
    }

    /**
     * Get Cart Object.
     *
     * @return Cart
     */
    public function cart()
    {
        return $this->cart;
    }

    /**
     * Check Transactions.
     */
    public function checkTransaction($id)
    {
        $response =  $this->request($this->response->getTransaction(), [
            'key' => $this->apiKey,
            'id'  => $id,
        ]);

        return $response;
    }
}
