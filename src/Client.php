<?php

/*
 * This file is part of the slince/shopify-api-php
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Slince\Shopify;

use Doctrine\Common\Inflector\Inflector;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slince\Di\Container;
use Slince\Shopify\Exception\ClientException;
use Slince\Shopify\Exception\InvalidArgumentException;
use Slince\Shopify\Hydrator\Hydrator;
use Slince\Shopify\Service\Contracts;

/**
 * @method Contracts\ArticleManagerInterface getArticleManager
 * @method Contracts\AssetManagerInterface getAssetManager
 * @method Contracts\BlogManagerInterface getBlogManager
 * @method Contracts\CarrierServiceManagerInterface getCarrierServiceManager
 * @method Contracts\CollectManagerInterface getCollectManager
 * @method Contracts\CommentManagerInterface getCommentManager
 * @method Contracts\CountryManagerInterface getCountryManager
 * @method Contracts\CustomCollectionManagerInterface getCustomCollectionManager
 * @method Contracts\CustomerManagerInterface getCustomerManager
 * @method Contracts\AddressManagerInterface getAddressManager
 * @method Contracts\CustomerSavedSearchManagerInterface getCustomerSavedSearchManager
 * @method Contracts\DiscountCodeManagerInterface getDiscountCodeManager
 * @method Contracts\DraftOrderManagerInterface getDraftOrderManager
 * @method Contracts\FulfillmentManagerInterface getFulfillmentManager
 * @method Contracts\FulfillmentServiceManagerInterface getFulfillmentServiceManager
 * @method Contracts\InventoryItemManagerInterface getInventoryItemManager
 * @method Contracts\InventoryLevelManagerInterface getInventoryLevelManager
 * @method Contracts\LocationManagerInterface getLocationManager
 * @method Contracts\OrderManagerInterface getOrderManager
 * @method Contracts\RiskManagerInterface getRiskManager
 * @method Contracts\PageManagerInterface getPageManager
 * @method Contracts\PolicyManagerInterface getPolicyManager
 * @method Contracts\PriceRuleManagerInterface getPriceRuleManager
 * @method Contracts\ProductManagerInterface getProductManager
 * @method Contracts\ImageManagerInterface getImageManager
 * @method Contracts\VariantManagerInterface getVariantManager
 * @method Contracts\ProvinceManagerInterface getProvinceManager
 * @method Contracts\RecurringApplicationChargeManagerInterface getRecurringApplicationChargeManager
 * @method Contracts\RedirectManagerInterface getRedirectManager
 * @method Contracts\RefundManagerInterface getRefundManager
 * @method Contracts\ShippingZoneManagerInterface getShippingZoneManager
 * @method Contracts\ShopManagerInterface getShopManager
 * @method Contracts\SmartCollectionManagerInterface getSmartCollectionManager
 * @method Contracts\ThemeManagerInterface getThemeManager
 * @method Contracts\TransactionManagerInterface getTransactionManager
 * @method Contracts\WebhookManagerInterface getWebhookManager
 */
class Client
{
    const NAME = 'SlinceShopifyClient';
    const VERSION = '3.0.0';

    /**
     * Whether delay the next request.
     *
     * @var bool
     */
    protected static $delayNextRequest = false;
    /**
     * Array of services classes.
     *
     * @var array
     */
    public $serviceClass = [
        Service\ArticleManager::class,
        Service\AssetManager::class,
        Service\BlogManager::class,
        Service\CarrierServiceManager::class,
        Service\CollectManager::class,
        Service\CommentManager::class,
        Service\CountryManager::class,
        Service\CustomCollectionManager::class,
        Service\CustomerManager::class,
        Service\AddressManager::class,
        Service\CustomerSavedSearchManager::class,
        Service\DiscountCodeManager::class,
        Service\DraftOrderManager::class,
        Service\FulfillmentManager::class,
        Service\FulfillmentServiceManager::class,
        Service\InventoryItemManager::class,
        Service\InventoryLevelManager::class,
        Service\LocationManager::class,
        Service\OrderManager::class,
        Service\RiskManager::class,
        Service\PageManager::class,
        Service\PolicyManager::class,
        Service\PriceRuleManager::class,
        Service\ProductManager::class,
        Service\ImageManager::class,
        Service\VariantManager::class,
        Service\ProvinceManager::class,
        Service\RecurringApplicationChargeManager::class,
        Service\RedirectManager::class,
        Service\RefundManager::class,
        Service\ScriptTagManager::class,
        Service\ShippingZoneManager::class,
        Service\ShopManager::class,
        Service\SmartCollectionManager::class,
        Service\ThemeManager::class,
        Service\TransactionManager::class,
        Service\WebhookManager::class,
    ];

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var CredentialInterface
     */
    protected $credential;

    /**
     * The shop.
     *
     * @var string
     */
    protected $shop;

    /**
     * @var string
     */
    protected $apiVersion = '2019-10';

    /**
     * @var ResponseInterface
     */
    protected $lastResponse;

    /**
     * @var string
     */
    protected $metaCacheDir;

    /**
     * @var Hydrator
     */
    protected $hydrator;

    public function __construct(CredentialInterface $credential, string $shop, array $options = [])
    {
        $this->container = new Container();
        $this->container->register($this);
        $this->credential = $credential;
        $this->setShop($shop);
        $this->applyOptions($options);
        $this->initializeBaseServices();
    }

    /**
     * Applies the array of request options to the client.
     * @param array $options
     */
    protected function applyOptions(array $options)
    {
        isset($options['httpClient']) && $this->httpClient = $options['httpClient'];
        if (!isset($options['metaCacheDir'])) {
            throw new InvalidArgumentException('You must provide option "metaCacheDir"');
        }
        $this->metaCacheDir = $options['metaCacheDir'];
        if (isset($options['apiVersion'])) {
            if (!preg_match('/^[0-9]{4}-[0-9]{2}$|^unstable$/', $options['apiVersion'])) {
                throw new InvalidArgumentException('Version string must be of YYYY-MM or unstable');
            }
            $this->apiVersion = $options['apiVersion'];
        }
    }

    /**
     * Initialize base services.
     */
    protected function initializeBaseServices()
    {
        foreach ($this->serviceClass as $serviceClass) {
            $this->container->register($serviceClass::getServiceName(), $serviceClass);
        }
    }

    public function __call($name, $arguments)
    {
        if ('Manager' === substr($name, -7)) {
            $serviceName = substr($name, 3, -7);

            return $this->container->get(Inflector::tableize(Inflector::pluralize($serviceName)));
        }
        throw new \InvalidArgumentException(sprintf('The method "%s" is not exists', $name));
    }

    /**
     * Gets the credential.
     *
     * @return CredentialInterface
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Gets the shop.
     *
     * @return string
     */
    public function getShop(): string
    {
        return $this->shop;
    }

    /**
     * sets the shop name for the client.
     *
     * @param string $shop
     */
    public function setShop(string $shop)
    {
        if (!preg_match('/^[a-zA-Z0-9\-]{3,100}\.myshopify\.(?:com|io)$/', $shop)) {
            throw new InvalidArgumentException('Shop name should be 3-100 letters, numbers, or hyphens e.g. your-store.myshopify.com');
        }
        $this->shop = $shop;
    }

    /**
     * Perform a GET request.
     *
     * @param string $resource
     * @param array  $query
     *
     * @return array
     */
    public function get(string $resource, array $query = []): array
    {
        return $this->doRequest('GET', $resource, [
            'query' => $query,
        ]);
    }

    /**
     * Send an HTTP request.
     *
     * @param string $method
     * @param string $resource
     * @param array  $options
     *
     * @return array
     */
    protected function doRequest(string $method, string $resource, array $options = []): array
    {
        $request = new Request($method, $this->buildUrl($resource), [
            'Content-Type' => 'application/json',
        ]);
        $response = $this->sendRequest($request, $options);
        $body = $response->getBody();

        return $body->getSize()
            ? \GuzzleHttp\json_decode($body, true)
            : [];
    }

    /**
     * Builds an url by given resource name.
     *
     * @param string $resource
     *
     * @return string
     */
    protected function buildUrl(string $resource): string
    {
        return sprintf('https://%s/admin/api/%s/%s.json', $this->shop, $this->apiVersion, $resource);
    }

    /**
     * Send a request.
     *
     * @param RequestInterface $request
     * @param array $options
     * @return ResponseInterface
     * @throws ClientException
     * @codeCoverageIgnore
     */
    public function sendRequest(RequestInterface $request, array $options = [])
    {
        if (static::$delayNextRequest) {
            usleep(1000000 * rand(3, 10));
        }
        $request = $request->withHeader('User-Agent', static::NAME.'/'.static::VERSION);
        $request = $this->credential->applyToRequest($request);
        try {
            $response = $this->getHttpClient()->send($request, $options);
            $this->lastResponse = $response;
        } catch (RequestException $exception) {
            $exception = new ClientException($request, $exception->getResponse(), $exception->getMessage());
            throw $exception;
        }
        list($callsMade, $callsLimit) = explode('/', $response->getHeaderLine('http_x_shopify_shop_api_call_limit'));
        static::$delayNextRequest = $callsMade / $callsLimit >= 0.8;

        return $response;
    }

    /**
     * Gets the http client.
     *
     * @return HttpClient
     */
    public function getHttpClient(): HttpClient
    {
        if ($this->httpClient) {
            return $this->httpClient;
        }

        return $this->httpClient = new HttpClient([
            'verify' => false,
        ]);
    }

    /**
     * Sets the http client for the client.
     *
     * @param HttpClient $httpClient
     */
    public function setHttpClient(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Perform a POST request.
     *
     * @param string $resource
     * @param array  $data
     * @param array  $query
     *
     * @return array
     */
    public function post(string $resource, array $data, array $query = []): array
    {
        return $this->doRequest('POST', $resource, [
            'query' => $query,
            'json' => $data,
        ]);
    }

    /**
     * Perform a PUT request.
     *
     * @param string $resource
     * @param array  $data
     * @param array  $query
     *
     * @return array
     */
    public function put(string $resource, array $data, array $query = []): array
    {
        return $this->doRequest('PUT', $resource, [
            'query' => $query,
            'json' => $data,
        ]);
    }

    /**
     * Perform a DELETE request.
     *
     * @param string $resource
     * @param array  $query
     */
    public function delete(string $resource, array $query = [])
    {
        $this->doRequest('DELETE', $resource, [
            'query' => $query,
        ]);
    }

    /**
     * Gets the latest http response.
     *
     * @return ResponseInterface
     */
    public function getLastResponse(): ?ResponseInterface
    {
        return $this->lastResponse;
    }

    /**
     * Gets the hydrator instance.
     *
     * @return Hydrator
     */
    public function getHydrator(): Hydrator
    {
        if ($this->hydrator) {
            return $this->hydrator;
        }

        return $this->hydrator = new Hydrator();
    }

    /**
     * Add a custom service class.
     *
     * @param string $serviceClass
     *
     * @throws InvalidArgumentException
     */
    public function addServiceClass(string $serviceClass)
    {
        if (!is_subclass_of($serviceClass, Contracts\ManagerInterface::class)) {
            throw new InvalidArgumentException(sprintf('The service class "%s" should implement "ManagerInterface"', $serviceClass));
        }
        $this->serviceClass[] = $serviceClass;
        $this->container->register($serviceClass::getServiceName(), $serviceClass);
    }
}
