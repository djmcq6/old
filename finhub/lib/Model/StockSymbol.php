<?php
/**
 * StockSymbol
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Finnhub API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 1.0.0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Finnhub\Model;

use \ArrayAccess;
use \Finnhub\ObjectSerializer;

/**
 * StockSymbol Class Doc Comment
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class StockSymbol implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StockSymbol';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'description' => 'string',
        'display_symbol' => 'string',
        'symbol' => 'string',
        'type' => 'string',
        'mic' => 'string',
        'figi' => 'string',
        'share_class_figi' => 'string',
        'currency' => 'string',
        'symbol2' => 'string',
        'isin' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'description' => null,
        'display_symbol' => null,
        'symbol' => null,
        'type' => null,
        'mic' => null,
        'figi' => null,
        'share_class_figi' => null,
        'currency' => null,
        'symbol2' => null,
        'isin' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'description' => 'description',
        'display_symbol' => 'displaySymbol',
        'symbol' => 'symbol',
        'type' => 'type',
        'mic' => 'mic',
        'figi' => 'figi',
        'share_class_figi' => 'shareClassFIGI',
        'currency' => 'currency',
        'symbol2' => 'symbol2',
        'isin' => 'isin'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'description' => 'setDescription',
        'display_symbol' => 'setDisplaySymbol',
        'symbol' => 'setSymbol',
        'type' => 'setType',
        'mic' => 'setMic',
        'figi' => 'setFigi',
        'share_class_figi' => 'setShareClassFigi',
        'currency' => 'setCurrency',
        'symbol2' => 'setSymbol2',
        'isin' => 'setIsin'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'description' => 'getDescription',
        'display_symbol' => 'getDisplaySymbol',
        'symbol' => 'getSymbol',
        'type' => 'getType',
        'mic' => 'getMic',
        'figi' => 'getFigi',
        'share_class_figi' => 'getShareClassFigi',
        'currency' => 'getCurrency',
        'symbol2' => 'getSymbol2',
        'isin' => 'getIsin'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['description'] = $data['description'] ?? null;
        $this->container['display_symbol'] = $data['display_symbol'] ?? null;
        $this->container['symbol'] = $data['symbol'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['mic'] = $data['mic'] ?? null;
        $this->container['figi'] = $data['figi'] ?? null;
        $this->container['share_class_figi'] = $data['share_class_figi'] ?? null;
        $this->container['currency'] = $data['currency'] ?? null;
        $this->container['symbol2'] = $data['symbol2'] ?? null;
        $this->container['isin'] = $data['isin'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description Symbol description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets display_symbol
     *
     * @return string|null
     */
    public function getDisplaySymbol()
    {
        return $this->container['display_symbol'];
    }

    /**
     * Sets display_symbol
     *
     * @param string|null $display_symbol Display symbol name.
     *
     * @return self
     */
    public function setDisplaySymbol($display_symbol)
    {
        $this->container['display_symbol'] = $display_symbol;

        return $this;
    }

    /**
     * Gets symbol
     *
     * @return string|null
     */
    public function getSymbol()
    {
        return $this->container['symbol'];
    }

    /**
     * Sets symbol
     *
     * @param string|null $symbol Unique symbol used to identify this symbol used in <code>/stock/candle</code> endpoint.
     *
     * @return self
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type Security type.
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets mic
     *
     * @return string|null
     */
    public function getMic()
    {
        return $this->container['mic'];
    }

    /**
     * Sets mic
     *
     * @param string|null $mic Primary exchange's MIC.
     *
     * @return self
     */
    public function setMic($mic)
    {
        $this->container['mic'] = $mic;

        return $this;
    }

    /**
     * Gets figi
     *
     * @return string|null
     */
    public function getFigi()
    {
        return $this->container['figi'];
    }

    /**
     * Sets figi
     *
     * @param string|null $figi FIGI identifier.
     *
     * @return self
     */
    public function setFigi($figi)
    {
        $this->container['figi'] = $figi;

        return $this;
    }

    /**
     * Gets share_class_figi
     *
     * @return string|null
     */
    public function getShareClassFigi()
    {
        return $this->container['share_class_figi'];
    }

    /**
     * Sets share_class_figi
     *
     * @param string|null $share_class_figi Global Share Class FIGI.
     *
     * @return self
     */
    public function setShareClassFigi($share_class_figi)
    {
        $this->container['share_class_figi'] = $share_class_figi;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency Price's currency. This might be different from the reporting currency of fundamental data.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets symbol2
     *
     * @return string|null
     */
    public function getSymbol2()
    {
        return $this->container['symbol2'];
    }

    /**
     * Sets symbol2
     *
     * @param string|null $symbol2 Alternative ticker for exchanges with multiple tickers for 1 stock such as BSE.
     *
     * @return self
     */
    public function setSymbol2($symbol2)
    {
        $this->container['symbol2'] = $symbol2;

        return $this;
    }

    /**
     * Gets isin
     *
     * @return string|null
     */
    public function getIsin()
    {
        return $this->container['isin'];
    }

    /**
     * Sets isin
     *
     * @param string|null $isin ISIN. This field is only available for EU stocks and selected Asian markets. Entitlement from Finnhub is required to access this field.
     *
     * @return self
     */
    public function setIsin($isin)
    {
        $this->container['isin'] = $isin;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


