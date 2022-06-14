<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedJsExtremeLazyLoad\Api;

use Magento\Store\Model\ScopeInterface;

interface ConfigInterface
{
    /**
     * @param mixed $scopeCode
     * @param string $scopeType
     *
     * @return bool
     */
    public function isEnabled($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool;

    /**
     * @param mixed $scopeCode
     * @param string $scopeType
     *
     * @return bool
     */
    public function isTimeOutEnabled($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool;

    /**
     * @param $scopeCode
     * @param string $scopeType
     * @return int
     */
    public function getTimeOut($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): int;

    /**
     * @param $scopeCode
     * @param string $scopeType
     * @return array
     */
    public function getDelayEvents($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array;

    /**
     * @param $scopeCode
     * @param string $scopeType
     * @return array
     */
    public function getExcludeByAttributes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array;

    /**
     * @param $scopeCode
     * @param string $scopeType
     * @return array
     */
    public function getExcludeByContainText($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array;

    /**
     * @param $scopeCode
     * @param string $scopeType
     * @return array
     */
    public function getAllowedTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array;
}
