<?php
namespace Omnipay\Ecopayz\Message;

/**
 * Ecopayz Complete Purchase Response
 *
 * @author    Alexander Fedra <contact@dercoder.at>
 * @copyright 2014 DerCoder
 * @license   http://opensource.org/licenses/mit-license.php MIT
 * @version   2.0.3 Ecopayz API Specification
 */
class CompletePurchaseResponse extends FetchTransactionResponse
{

    /**
     * Get the Merchant’s transaction ID.
     *
     * @return string transaction reference
     */
    public function getTransactionId()
    {
        return (string) $this->data->ClientTransactionID;
    }

    /**
     * Get the unique ID that identifies the transaction in the Ecopayz system.
     *
     * @return string transaction reference
     */
    public function getTransactionReference()
    {
        return (string) $this->data->SvsTxID;
    }

}
