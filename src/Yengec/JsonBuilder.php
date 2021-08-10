<?php


namespace Yengec;


use Yengec\Interface\JsonInterface;

class JsonBuilder
{
    private mixed $json;

    public function __construct(mixed $json)
    {
        $this->json = $json;
    }

    /**
     * @return JsonBuilder
     */
    public static function make(): JsonBuilder
    {
        return new JsonBuilder(array());
    }

    /**
     * @param $json
     * @return JsonBuilder
     */
    public static function fromJsonObject($json): JsonBuilder
    {
        return new JsonBuilder($json);
    }

    /**
     * @param string $key
     * @param mixed|null $value
     * @return $this
     */
    public function add(string $key, mixed $value = null) : JsonBuilder
    {
        if (isset($value)) {
            if ($value instanceof JsonInterface) {
                $this->json[$key] = $value->getJsonObject();
            } else {
                $this->json[$key] = $value;
            }
        }
        return $this;
    }

    /**
     * @param string $key
     * @param array|null $array $array
     * @return JsonBuilder
     */
    public function addArray(string $key, array $array = null): JsonBuilder
    {
        if (isset($array)) {
            foreach ($array as $index => $value) {
                if ($value instanceof JsonInterface) {
                    $this->json[$key][$index] = $value->getJsonObject();
                } else {
                    $this->json[$key][$index] = $value;
                }
            }
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getObject() : mixed
    {
        return $this->json;
    }

    /**
     * @param $jsonObject
     * @return bool|string
     */
    public static function jsonEncode($jsonObject): bool|string
    {
        return json_encode($jsonObject);
    }

    /**
     * @param $rawResult
     * @return mixed
     */
    public static function jsonDecode($rawResult): mixed
    {
        return json_decode($rawResult);
    }
}