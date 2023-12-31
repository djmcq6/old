<?php
/**
 * InstitutionalProfileInfo
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
 * InstitutionalProfileInfo Class Doc Comment
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class InstitutionalProfileInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'InstitutionalProfileInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cik' => 'string',
        'firm_type' => 'string',
        'manager' => 'string',
        'philosophy' => 'string',
        'profile' => 'string',
        'profile_img' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cik' => null,
        'firm_type' => null,
        'manager' => null,
        'philosophy' => null,
        'profile' => null,
        'profile_img' => null
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
        'cik' => 'cik',
        'firm_type' => 'firmType',
        'manager' => 'manager',
        'philosophy' => 'philosophy',
        'profile' => 'profile',
        'profile_img' => 'profileImg'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cik' => 'setCik',
        'firm_type' => 'setFirmType',
        'manager' => 'setManager',
        'philosophy' => 'setPhilosophy',
        'profile' => 'setProfile',
        'profile_img' => 'setProfileImg'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cik' => 'getCik',
        'firm_type' => 'getFirmType',
        'manager' => 'getManager',
        'philosophy' => 'getPhilosophy',
        'profile' => 'getProfile',
        'profile_img' => 'getProfileImg'
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
        $this->container['cik'] = $data['cik'] ?? null;
        $this->container['firm_type'] = $data['firm_type'] ?? null;
        $this->container['manager'] = $data['manager'] ?? null;
        $this->container['philosophy'] = $data['philosophy'] ?? null;
        $this->container['profile'] = $data['profile'] ?? null;
        $this->container['profile_img'] = $data['profile_img'] ?? null;
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
     * Gets cik
     *
     * @return string|null
     */
    public function getCik()
    {
        return $this->container['cik'];
    }

    /**
     * Sets cik
     *
     * @param string|null $cik Investor's company CIK.
     *
     * @return self
     */
    public function setCik($cik)
    {
        $this->container['cik'] = $cik;

        return $this;
    }

    /**
     * Gets firm_type
     *
     * @return string|null
     */
    public function getFirmType()
    {
        return $this->container['firm_type'];
    }

    /**
     * Sets firm_type
     *
     * @param string|null $firm_type Firm type.
     *
     * @return self
     */
    public function setFirmType($firm_type)
    {
        $this->container['firm_type'] = $firm_type;

        return $this;
    }

    /**
     * Gets manager
     *
     * @return string|null
     */
    public function getManager()
    {
        return $this->container['manager'];
    }

    /**
     * Sets manager
     *
     * @param string|null $manager Manager.
     *
     * @return self
     */
    public function setManager($manager)
    {
        $this->container['manager'] = $manager;

        return $this;
    }

    /**
     * Gets philosophy
     *
     * @return string|null
     */
    public function getPhilosophy()
    {
        return $this->container['philosophy'];
    }

    /**
     * Sets philosophy
     *
     * @param string|null $philosophy Investing philosophy.
     *
     * @return self
     */
    public function setPhilosophy($philosophy)
    {
        $this->container['philosophy'] = $philosophy;

        return $this;
    }

    /**
     * Gets profile
     *
     * @return string|null
     */
    public function getProfile()
    {
        return $this->container['profile'];
    }

    /**
     * Sets profile
     *
     * @param string|null $profile Profile info.
     *
     * @return self
     */
    public function setProfile($profile)
    {
        $this->container['profile'] = $profile;

        return $this;
    }

    /**
     * Gets profile_img
     *
     * @return string|null
     */
    public function getProfileImg()
    {
        return $this->container['profile_img'];
    }

    /**
     * Sets profile_img
     *
     * @param string|null $profile_img Profile image.
     *
     * @return self
     */
    public function setProfileImg($profile_img)
    {
        $this->container['profile_img'] = $profile_img;

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


