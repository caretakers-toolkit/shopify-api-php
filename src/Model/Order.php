<?php

/*
 * This file is part of the slince/shopify-api-php
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Slince\Shopify\Model;

use DateTime;

class Order extends Model
{
    use AdminGraphqlApiId;

    /**
     * @var string
     */
    protected $email;

    /**
<<<<<<< HEAD:src/Model/Order.php
     * @var DateTime
=======
     * @var \DateTimeInterface
>>>>>>> master:src/Manager/Order/Order.php
     */
    protected $closedAt;

    /**
<<<<<<< HEAD:src/Model/Order.php
     * @var DateTime
=======
     * @var \DateTimeInterface
>>>>>>> master:src/Manager/Order/Order.php
     */
    protected $createdAt;

    /**
<<<<<<< HEAD:src/Model/Order.php
     * @var DateTime
=======
     * @var \DateTimeInterface
>>>>>>> master:src/Manager/Order/Order.php
     */
    protected $updatedAt;

    /**
     * @var \DateTimeInterface
     */
    protected $deletedAt;

    /**
     * @var int
     */
    protected $number;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $gateway;

    /**
     * @var bool
     */
    protected $test;

    /**
     * @var float
     */
    protected $totalPrice;

    /**
     * @var float
     */
    protected $subtotalPrice;

    /**
     * @var float
     */
    protected $totalWeight;

    /**
     * @var float
     */
    protected $totalTax;

    /**
     * @var bool
     */
    protected $taxesIncluded;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $financialStatus;

    /**
     * @var bool
     */
    protected $confirmed;

    /**
     * @var float
     */
    protected $totalDiscounts;

    /**
     * @var float
     */
    protected $totalLineItemsPrice;

    /**
     * @var string
     */
    protected $cartToken;

    /**
     * @var bool
     */
    protected $buyerAcceptsMarketing;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $referringSite;

    /**
     * @var string
     */
    protected $landingSite;

    /**
     * @var DateTime
     */
    protected $cancelledAt;

    /**
     * @var string
     */
    protected $cancelReason;

    /**
     * @var float
     */
    protected $totalPriceUsd;

    /**
     * @var string
     */
    protected $checkoutToken;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var int
     */
    protected $locationId;

    /**
     * @var string
     */
    protected $sourceIdentifier;

    /**
     * @var string
     */
    protected $sourceUrl;

    /**
     * @var DateTime
     */
    protected $processedAt;

    /**
     * @var string
     */
    protected $deviceId;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $browserIp;

    /**
     * @var string
     */
    protected $landingSiteRef;

    /**
     * @var string
     */
    protected $orderNumber;

    /**
     * @var array
     */
    protected $discountCodes;

    /**
     * @var array
     */
    protected $noteAttributes;

    /**
     * @var array
     */
    protected $paymentGatewayNames;

    /**
     * @var string
     */
    protected $processingMethod;

    /**
     * @var int
     */
    protected $checkoutId;

    /**
     * @var string
     */
    protected $sourceName;

    /**
     * @var string
     */
    protected $fulfillmentStatus;

    /**
     * @var array
     */
    protected $taxLines;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var string
     */
    protected $contactEmail;

    /**
     * @var string
     */
    protected $orderStatusUrl;

    /**
     * @var LineItem[]
     */
    protected $lineItems;

    /**
     * @var ShippingLine[]
     */
    protected $shippingLines;

    /**
     * @var OrderAddress
     */
    protected $billingAddress;

    /**
     * @var OrderAddress
     */
    protected $shippingAddress;

    /**
     * @var Fulfillment[]
     */
    protected $fulfillments;

    /**
     * @var ClientDetails
     */
    protected $clientDetails;

    /**
     * @var Refund[]
     */
    protected $refunds;

    /**
     * @var PaymentDetails
     */
    protected $paymentDetails;

    /**
     * @var DiscountApplication[]
     */
    protected $discountApplications;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
<<<<<<< HEAD:src/Model/Order.php
     * @return DateTime
=======
     * @return \DateTimeInterface
>>>>>>> master:src/Manager/Order/Order.php
     */
    public function getClosedAt()
    {
        return $this->closedAt;
    }

    public function setClosedAt(?DateTime $closedAt)
    {
        $this->closedAt = $closedAt;
    }

    /**
<<<<<<< HEAD:src/Model/Order.php
     * @return DateTime
=======
     * @param \DateTimeInterface $closedAt
     *
     * @return Order
>>>>>>> master:src/Manager/Order/Order.php
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(?DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

<<<<<<< HEAD:src/Model/Order.php
    public function setUpdatedAt(?DateTime $updatedAt)
=======
    /**
     * @param \DateTimeInterface $updatedAt
     *
     * @return Order
     */
    public function setUpdatedAt($updatedAt)
>>>>>>> master:src/Manager/Order/Order.php
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTimeInterface $deletedAt
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;
    }


    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * @param string $gateway
     */
    public function setGateway($gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return bool
     */
    public function isTest()
    {
        return $this->test;
    }

    /**
     * @param bool $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @param float $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    /**
     * @return float
     */
    public function getSubtotalPrice()
    {
        return $this->subtotalPrice;
    }

    /**
     * @param float $subtotalPrice
     */
    public function setSubtotalPrice($subtotalPrice)
    {
        $this->subtotalPrice = $subtotalPrice;
    }

    /**
     * @return float
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param float $totalWeight
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;
    }

    /**
     * @return float
     */
    public function getTotalTax()
    {
        return $this->totalTax;
    }

    /**
     * @param float $totalTax
     */
    public function setTotalTax($totalTax)
    {
        $this->totalTax = $totalTax;
    }

    /**
     * @return bool
     */
    public function isTaxesIncluded()
    {
        return $this->taxesIncluded;
    }

    /**
     * @param bool $taxesIncluded
     */
    public function setTaxesIncluded($taxesIncluded)
    {
        $this->taxesIncluded = $taxesIncluded;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getFinancialStatus()
    {
        return $this->financialStatus;
    }

    /**
     * @param string $financialStatus
     */
    public function setFinancialStatus($financialStatus)
    {
        $this->financialStatus = $financialStatus;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * @param bool $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * @return float
     */
    public function getTotalDiscounts()
    {
        return $this->totalDiscounts;
    }

    /**
     * @param float $totalDiscounts
     */
    public function setTotalDiscounts($totalDiscounts)
    {
        $this->totalDiscounts = $totalDiscounts;
    }

    /**
     * @return float
     */
    public function getTotalLineItemsPrice()
    {
        return $this->totalLineItemsPrice;
    }

    /**
     * @param float $totalLineItemsPrice
     */
    public function setTotalLineItemsPrice($totalLineItemsPrice)
    {
        $this->totalLineItemsPrice = $totalLineItemsPrice;
    }

    /**
     * @return string
     */
    public function getCartToken()
    {
        return $this->cartToken;
    }

    /**
     * @param string $cartToken
     */
    public function setCartToken($cartToken)
    {
        $this->cartToken = $cartToken;
    }

    /**
     * @return bool
     */
    public function isBuyerAcceptsMarketing()
    {
        return $this->buyerAcceptsMarketing;
    }

    /**
     * @param bool $buyerAcceptsMarketing
     */
    public function setBuyerAcceptsMarketing($buyerAcceptsMarketing)
    {
        $this->buyerAcceptsMarketing = $buyerAcceptsMarketing;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getReferringSite()
    {
        return $this->referringSite;
    }

    /**
     * @param string $referringSite
     */
    public function setReferringSite($referringSite)
    {
        $this->referringSite = $referringSite;
    }

    /**
     * @return string
     */
    public function getLandingSite()
    {
        return $this->landingSite;
    }

    /**
     * @param string $landingSite
     */
    public function setLandingSite($landingSite)
    {
        $this->landingSite = $landingSite;
    }

    /**
     * @return DateTime
     */
    public function getCancelledAt()
    {
        return $this->cancelledAt;
    }

    public function setCancelledAt(?DateTime $cancelledAt)
    {
        $this->cancelledAt = $cancelledAt;
    }

    /**
     * @return string
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * @param string $cancelReason
     */
    public function setCancelReason($cancelReason)
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * @return float
     */
    public function getTotalPriceUsd()
    {
        return $this->totalPriceUsd;
    }

    /**
     * @param float $totalPriceUsd
     */
    public function setTotalPriceUsd($totalPriceUsd)
    {
        $this->totalPriceUsd = $totalPriceUsd;
    }

    /**
     * @return string
     */
    public function getCheckoutToken()
    {
        return $this->checkoutToken;
    }

    /**
     * @param string $checkoutToken
     */
    public function setCheckoutToken($checkoutToken)
    {
        $this->checkoutToken = $checkoutToken;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * @param int $locationId
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * @return string
     */
    public function getSourceIdentifier()
    {
        return $this->sourceIdentifier;
    }

    /**
     * @param string $sourceIdentifier
     */
    public function setSourceIdentifier($sourceIdentifier)
    {
        $this->sourceIdentifier = $sourceIdentifier;
    }

    /**
     * @return string
     */
    public function getSourceUrl()
    {
        return $this->sourceUrl;
    }

    /**
     * @param string $sourceUrl
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl = $sourceUrl;
    }

    /**
     * @return DateTime
     */
    public function getProcessedAt()
    {
        return $this->processedAt;
    }

    public function setProcessedAt(?DateTime $processedAt)
    {
        $this->processedAt = $processedAt;
    }

    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getBrowserIp()
    {
        return $this->browserIp;
    }

    /**
     * @param string $browserIp
     */
    public function setBrowserIp($browserIp)
    {
        $this->browserIp = $browserIp;
    }

    /**
     * @return string
     */
    public function getLandingSiteRef()
    {
        return $this->landingSiteRef;
    }

    /**
     * @param string $landingSiteRef
     */
    public function setLandingSiteRef($landingSiteRef)
    {
        $this->landingSiteRef = $landingSiteRef;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @param string $orderNumber
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return array
     */
    public function getDiscountCodes()
    {
        return $this->discountCodes;
    }

    /**
     * @param array $discountCodes
     */
    public function setDiscountCodes($discountCodes)
    {
        $this->discountCodes = $discountCodes;
    }

    /**
     * @return array
     */
    public function getNoteAttributes()
    {
        return $this->noteAttributes;
    }

    /**
     * @param array $noteAttributes
     */
    public function setNoteAttributes($noteAttributes)
    {
        $this->noteAttributes = $noteAttributes;
    }

    /**
     * @return array
     */
    public function getPaymentGatewayNames()
    {
        return $this->paymentGatewayNames;
    }

    /**
     * @param array $paymentGatewayNames
     */
    public function setPaymentGatewayNames($paymentGatewayNames)
    {
        $this->paymentGatewayNames = $paymentGatewayNames;
    }

    /**
     * @return string
     */
    public function getProcessingMethod()
    {
        return $this->processingMethod;
    }

    /**
     * @param string $processingMethod
     */
    public function setProcessingMethod($processingMethod)
    {
        $this->processingMethod = $processingMethod;
    }

    /**
     * @return int
     */
    public function getCheckoutId()
    {
        return $this->checkoutId;
    }

    /**
     * @param int $checkoutId
     */
    public function setCheckoutId($checkoutId)
    {
        $this->checkoutId = $checkoutId;
    }

    /**
     * @return string
     */
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param string $sourceName
     */
    public function setSourceName($sourceName)
    {
        $this->sourceName = $sourceName;
    }

    /**
     * @return string
     */
    public function getFulfillmentStatus()
    {
        return $this->fulfillmentStatus;
    }

    /**
     * @param string $fulfillmentStatus
     */
    public function setFulfillmentStatus($fulfillmentStatus)
    {
        $this->fulfillmentStatus = $fulfillmentStatus;
    }

    /**
     * @return array
     */
    public function getTaxLines()
    {
        return $this->taxLines;
    }

    /**
     * @param array $taxLines
     */
    public function setTaxLines($taxLines)
    {
        $this->taxLines = $taxLines;
    }

    public function addTaxLine(TaxLine $taxLine)
    {
        $this->taxLines[] = $taxLine;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return string
     */
    public function getOrderStatusUrl()
    {
        return $this->orderStatusUrl;
    }

    /**
     * @param string $orderStatusUrl
     */
    public function setOrderStatusUrl($orderStatusUrl)
    {
        $this->orderStatusUrl = $orderStatusUrl;
    }

    /**
     * @return LineItem[]
     */
    public function getLineItems()
    {
        return $this->lineItems;
    }

    /**
     * @param LineItem[] $lineItems
     */
    public function setLineItems($lineItems)
    {
        $this->lineItems = $lineItems;
    }

    public function addLineItem(LineItem $lineItem)
    {
        $this->lineItems[] = $lineItem;
    }

    /**
     * @return ShippingLine[]
     */
    public function getShippingLines()
    {
        return $this->shippingLines;
    }

    /**
     * @param ShippingLine[] $shippingLines
     */
    public function setShippingLines($shippingLines)
    {
        $this->shippingLines = $shippingLines;
    }

    public function addShippingLine($shippingLine)
    {
        $this->shippingLines[] = $shippingLine;
    }

    /**
     * @return OrderAddress
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(OrderAddress $billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return OrderAddress
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(OrderAddress $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return Fulfillment[]
     */
    public function getFulfillments()
    {
        return $this->fulfillments;
    }

    /**
     * @param Fulfillment[] $fulfillments
     */
    public function setFulfillments($fulfillments)
    {
        $this->fulfillments = $fulfillments;
    }

    public function addFulfillment(Fulfillment $fulfillment)
    {
        $this->fulfillments[] = $fulfillment;
    }

    /**
     * @return ClientDetails
     */
    public function getClientDetails()
    {
        return $this->clientDetails;
    }

    public function setClientDetails(ClientDetails $clientDetails)
    {
        $this->clientDetails = $clientDetails;
    }

    /**
     * @return Refund[]
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @param Refund[] $refunds
     */
    public function setRefunds($refunds)
    {
        $this->refunds = $refunds;
    }

    public function addRefund(Refund $refund)
    {
        $this->refunds[] = $refund;
    }

    /**
     * @return PaymentDetails
     */
    public function getPaymentDetails()
    {
        return $this->paymentDetails;
    }

    public function setPaymentDetails(PaymentDetails $paymentDetails)
    {
        $this->paymentDetails = $paymentDetails;
    }

    /**
     * @return DiscountApplication[]
     */
    public function getDiscountApplications()
    {
        return $this->discountApplications;
    }

    /**
     * @param DiscountApplication[] $discountApplications
     */
    public function setDiscountApplications($discountApplications)
    {
        $this->discountApplications = $discountApplications;
    }

    public function addDiscountApplication(DiscountApplication $discountApplication)
    {
        $this->discountApplications[] = $discountApplication;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }
}
