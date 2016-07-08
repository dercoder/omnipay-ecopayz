<?php
namespace Omnipay\Ecopayz\Message;

/**
 * Ecopayz Purchase Request
 *
 * When a client connects to the merchant's WEB store and chooses something to purchase,
 * the merchant's application needs to obtain the money amount of this purchase operation,
 * so it offers various payment methods to the client (for example, ecoPayz).
 * When the client chooses ecoPayz, the next step can be executed.
 *
 * @author Alexander Fedra <contact@dercoder.at>
 * @copyright 2015 DerCoder
 * @license http://opensource.org/licenses/mit-license.php MIT
 * @version 2.0.3 Ecopayz API Specification
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Get the Customer ID at Merchant
     *
     * The client's account number at the merchant site.
     *
     * @return string customer id at merchant
     */
    public function getCustomerIdAtMerchant()
    {
        return $this->getParameter('customerIdAtMerchant');
    }

    /**
     * Set the Customer ID at Merchant
     *
     * The client's account number at the merchant site.
     *
     * @param  string $value customer id at merchant
     * @return self
     */
    public function setCustomerIdAtMerchant($value)
    {
        return $this->setParameter('customerIdAtMerchant', $value);
    }

    /**
     * Get the data for this request.
     *
     * @return array request data
     */
    public function getData()
    {
        $this->validate(
            'merchantId',
            'merchantAccountNumber',
            'customerIdAtMerchant',
            'transactionId',
            'amount',
            'currency'
        );

        $data = array();
        $data['PaymentPageID'] = $this->getMerchantId();
        $data['MerchantAccountNumber'] = $this->getMerchantAccountNumber();
        $data['CustomerIdAtMerchant'] = $this->getCustomerIdAtMerchant();
        $data['TxID'] = $this->getTransactionId();
        $data['Amount'] = $this->getAmount();
        $data['Currency'] = $this->getCurrency();
        $data['MerchantFreeText'] = $this->getDescription();
        $data['OnSuccessUrl'] = $this->getOnSuccessUrl();
        $data['OnFailureUrl'] = $this->getOnFailureUrl();
        $data['TransferUrl'] = $this->getTransferUrl();
        $data['CancellationUrl'] = $this->getCancellationUrl();
        $data['CallbackUrl'] = $this->getCallbackUrl();
        $data['Checksum'] = $this->calculateArrayChecksum($data);

        return $data;
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed            $data The data to send
     * @return PurchaseResponse
     */
    public function sendData($data)
    {
        return new PurchaseResponse($this, $data);
    }

        /**
     * SET/GET Callback URL's for dynamic mode
     */

    /**
     * Set the success cb url
     *
     * @param  string $value success cb url
     * @return self
     */
    public function setOnSuccessUrl($value)
    {
        return $this->setParameter('OnSuccessUrl', $value);
    }

    /**
     * Get the success cb url
     *
     * @return string success cb url
     */
    public function getOnSuccessUrl()
    {
        return $this->getParameter('OnSuccessUrl');
    }

    /**
     * Set the failure cb url
     *
     * @param  string $value failure cb url
     * @return self
     */
    public function setOnFailureUrl($value)
    {
        return $this->setParameter('OnFailureUrl', $value);
    }

    /**
     * Get the failure cb url
     *
     * @return string failure cb url
     */
    public function getOnFailureUrl()
    {
        return $this->getParameter('OnFailureUrl');
    }

    /**
     * Set the transfer cb url
     *
     * @param  string $value transfer cb url
     * @return self
     */
    public function setTransferUrl($value)
    {
        return $this->setParameter('TransferUrl', $value);
    }

    /**
     * Get the transfer cb url
     *
     * @return string transfer cb url
     */
    public function getTransferUrl()
    {
        return $this->getParameter('TransferUrl');
    }

    /**
     * Set the cancellation cb url
     *
     * @param  string $value cancellation cb url
     * @return self
     */
    public function setCancellationUrl($value)
    {
        return $this->setParameter('CancellationUrl', $value);
    }

    /**
     * Get the cancellation cb url
     *
     * @return string cancellation cb url
     */
    public function getCancellationUrl()
    {
        return $this->getParameter('CancellationUrl');
    }

    /**
     * Set the callback cb url
     *
     * @param  string $value callback cb url
     * @return self
     */
    public function setCallbackUrl($value)
    {
        return $this->setParameter('CallbackUrl', $value);
    }

    /**
     * Get the callback cb url
     *
     * @return string callback cb url
     */
    public function getCallbackUrl()
    {
        return $this->getParameter('CallbackUrl');
    }
}
