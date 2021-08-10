<?php


namespace Yengec\Request;


use Yengec\RequestStringBuilder;

class ListCompanyIntegrationsRequest extends \Yengec\Request
{
    private string $include;
    private bool $configCompleted;
    private bool $isCompleted;

    /**
     * @return string
     */
    public function getInclude(): string
    {
        return $this->include;
    }

    /**
     * @param string $include
     */
    public function setInclude(string $include): void
    {
        $this->include = $include;
    }

    /**
     * @return bool
     */
    public function getConfigCompleted(): bool
    {
        return $this->configCompleted;
    }

    /**
     * @param bool $configCompleted
     */
    public function setConfigCompleted(bool $configCompleted): void
    {
        $this->configCompleted = $configCompleted;
    }

    /**
     * @return bool
     */
    public function getIsCompleted(): bool
    {
        return $this->isCompleted;
    }

    /**
     * @param bool $isCompleted
     */
    public function setIsCompleted(bool $isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }

    public function getRequestString(): string
    {
        $requestString = RequestStringBuilder::make();

        # Check for uninitialized typed property before call getter (=> php 7.4)
        if(isset($this->include))
            $requestString->append("include", $this->getInclude());
        if(isset($this->configCompleted))
            $requestString->append("config_completed", $this->getConfigCompleted());
        if(isset($this->isCompleted))
            $requestString->append("is_complete", $this->getIsCompleted());

        return $requestString->getRequestQueryString();
    }

}