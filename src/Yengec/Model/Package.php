<?php


namespace Yengec\Model;


use Yengec\YengecResource;

class Package extends YengecResource
{
    private int $id;
    private string $name;
    private string $code;
    private int $sort;
    private array $marketplaces;
    private array $prices;
    private bool $unlimited;
    private bool $sellableByPartner;
    private string|null $paymentPartner;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getSort(): int
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     */
    public function setSort(int $sort): void
    {
        $this->sort = $sort;
    }

    /**
     * @return array
     */
    public function getMarketplaces(): array
    {
        return $this->marketplaces;
    }

    /**
     * @param array $marketplaces
     */
    public function setMarketplaces(array $marketplaces): void
    {
        $this->marketplaces = $marketplaces;
    }

    /**
     * @return array
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     */
    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }

    /**
     * @return bool
     */
    public function isUnlimited(): bool
    {
        return $this->unlimited;
    }

    /**
     * @param bool $unlimited
     */
    public function setUnlimited(bool $unlimited): void
    {
        $this->unlimited = $unlimited;
    }

    /**
     * @return bool
     */
    public function isSellableByPartner(): bool
    {
        return $this->sellableByPartner;
    }

    /**
     * @param bool $sellableByPartner
     */
    public function setSellableByPartner(bool $sellableByPartner): void
    {
        $this->sellableByPartner = $sellableByPartner;
    }

    /**
     * @return string|null
     */
    public function getPaymentPartner(): string|null
    {
        return $this->paymentPartner;
    }

    /**
     * @param string|null $paymentPartner
     */
    public function setPaymentPartner(string|null $paymentPartner): void
    {
        $this->paymentPartner = $paymentPartner;
    }



}