<?php
/**
 * InFilingResponse
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
 * InFilingResponse Class Doc Comment
 *
 * @category Class
 * @package  Finnhub
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class InFilingResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'InFilingResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'filing_id' => 'string',
        'title' => 'string',
        'filer_id' => 'string',
        'symbol' => 'object',
        'name' => 'string',
        'acceptance_date' => 'string',
        'filed_date' => 'string',
        'report_date' => 'string',
        'form' => 'string',
        'amend' => 'bool',
        'source' => 'string',
        'page_count' => 'int',
        'document_count' => 'int',
        'documents' => '\Finnhub\Model\DocumentResponse[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'filing_id' => null,
        'title' => null,
        'filer_id' => null,
        'symbol' => null,
        'name' => null,
        'acceptance_date' => null,
        'filed_date' => null,
        'report_date' => null,
        'form' => null,
        'amend' => null,
        'source' => null,
        'page_count' => null,
        'document_count' => null,
        'documents' => null
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
        'filing_id' => 'filingId',
        'title' => 'title',
        'filer_id' => 'filerId',
        'symbol' => 'symbol',
        'name' => 'name',
        'acceptance_date' => 'acceptanceDate',
        'filed_date' => 'filedDate',
        'report_date' => 'reportDate',
        'form' => 'form',
        'amend' => 'amend',
        'source' => 'source',
        'page_count' => 'pageCount',
        'document_count' => 'documentCount',
        'documents' => 'documents'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'filing_id' => 'setFilingId',
        'title' => 'setTitle',
        'filer_id' => 'setFilerId',
        'symbol' => 'setSymbol',
        'name' => 'setName',
        'acceptance_date' => 'setAcceptanceDate',
        'filed_date' => 'setFiledDate',
        'report_date' => 'setReportDate',
        'form' => 'setForm',
        'amend' => 'setAmend',
        'source' => 'setSource',
        'page_count' => 'setPageCount',
        'document_count' => 'setDocumentCount',
        'documents' => 'setDocuments'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'filing_id' => 'getFilingId',
        'title' => 'getTitle',
        'filer_id' => 'getFilerId',
        'symbol' => 'getSymbol',
        'name' => 'getName',
        'acceptance_date' => 'getAcceptanceDate',
        'filed_date' => 'getFiledDate',
        'report_date' => 'getReportDate',
        'form' => 'getForm',
        'amend' => 'getAmend',
        'source' => 'getSource',
        'page_count' => 'getPageCount',
        'document_count' => 'getDocumentCount',
        'documents' => 'getDocuments'
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
        $this->container['filing_id'] = $data['filing_id'] ?? null;
        $this->container['title'] = $data['title'] ?? null;
        $this->container['filer_id'] = $data['filer_id'] ?? null;
        $this->container['symbol'] = $data['symbol'] ?? null;
        $this->container['name'] = $data['name'] ?? null;
        $this->container['acceptance_date'] = $data['acceptance_date'] ?? null;
        $this->container['filed_date'] = $data['filed_date'] ?? null;
        $this->container['report_date'] = $data['report_date'] ?? null;
        $this->container['form'] = $data['form'] ?? null;
        $this->container['amend'] = $data['amend'] ?? null;
        $this->container['source'] = $data['source'] ?? null;
        $this->container['page_count'] = $data['page_count'] ?? null;
        $this->container['document_count'] = $data['document_count'] ?? null;
        $this->container['documents'] = $data['documents'] ?? null;
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
     * Gets filing_id
     *
     * @return string|null
     */
    public function getFilingId()
    {
        return $this->container['filing_id'];
    }

    /**
     * Sets filing_id
     *
     * @param string|null $filing_id Filing Id in Alpharesearch platform
     *
     * @return self
     */
    public function setFilingId($filing_id)
    {
        $this->container['filing_id'] = $filing_id;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title Filing title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets filer_id
     *
     * @return string|null
     */
    public function getFilerId()
    {
        return $this->container['filer_id'];
    }

    /**
     * Sets filer_id
     *
     * @param string|null $filer_id Id of the entity submitted the filing
     *
     * @return self
     */
    public function setFilerId($filer_id)
    {
        $this->container['filer_id'] = $filer_id;

        return $this;
    }

    /**
     * Gets symbol
     *
     * @return object|null
     */
    public function getSymbol()
    {
        return $this->container['symbol'];
    }

    /**
     * Sets symbol
     *
     * @param object|null $symbol List of symbol associate with this filing
     *
     * @return self
     */
    public function setSymbol($symbol)
    {
        $this->container['symbol'] = $symbol;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name Filer name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets acceptance_date
     *
     * @return string|null
     */
    public function getAcceptanceDate()
    {
        return $this->container['acceptance_date'];
    }

    /**
     * Sets acceptance_date
     *
     * @param string|null $acceptance_date Date the filing is submitted.
     *
     * @return self
     */
    public function setAcceptanceDate($acceptance_date)
    {
        $this->container['acceptance_date'] = $acceptance_date;

        return $this;
    }

    /**
     * Gets filed_date
     *
     * @return string|null
     */
    public function getFiledDate()
    {
        return $this->container['filed_date'];
    }

    /**
     * Sets filed_date
     *
     * @param string|null $filed_date Date the filing is make available to the public
     *
     * @return self
     */
    public function setFiledDate($filed_date)
    {
        $this->container['filed_date'] = $filed_date;

        return $this;
    }

    /**
     * Gets report_date
     *
     * @return string|null
     */
    public function getReportDate()
    {
        return $this->container['report_date'];
    }

    /**
     * Sets report_date
     *
     * @param string|null $report_date Date as which the filing is reported
     *
     * @return self
     */
    public function setReportDate($report_date)
    {
        $this->container['report_date'] = $report_date;

        return $this;
    }

    /**
     * Gets form
     *
     * @return string|null
     */
    public function getForm()
    {
        return $this->container['form'];
    }

    /**
     * Sets form
     *
     * @param string|null $form Filing Form
     *
     * @return self
     */
    public function setForm($form)
    {
        $this->container['form'] = $form;

        return $this;
    }

    /**
     * Gets amend
     *
     * @return bool|null
     */
    public function getAmend()
    {
        return $this->container['amend'];
    }

    /**
     * Sets amend
     *
     * @param bool|null $amend Amendment
     *
     * @return self
     */
    public function setAmend($amend)
    {
        $this->container['amend'] = $amend;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source Filing Source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets page_count
     *
     * @return int|null
     */
    public function getPageCount()
    {
        return $this->container['page_count'];
    }

    /**
     * Sets page_count
     *
     * @param int|null $page_count Estimate number of page when printing
     *
     * @return self
     */
    public function setPageCount($page_count)
    {
        $this->container['page_count'] = $page_count;

        return $this;
    }

    /**
     * Gets document_count
     *
     * @return int|null
     */
    public function getDocumentCount()
    {
        return $this->container['document_count'];
    }

    /**
     * Sets document_count
     *
     * @param int|null $document_count Number of document in this filing
     *
     * @return self
     */
    public function setDocumentCount($document_count)
    {
        $this->container['document_count'] = $document_count;

        return $this;
    }

    /**
     * Gets documents
     *
     * @return \Finnhub\Model\DocumentResponse[]|null
     */
    public function getDocuments()
    {
        return $this->container['documents'];
    }

    /**
     * Sets documents
     *
     * @param \Finnhub\Model\DocumentResponse[]|null $documents Document for this filing.
     *
     * @return self
     */
    public function setDocuments($documents)
    {
        $this->container['documents'] = $documents;

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


