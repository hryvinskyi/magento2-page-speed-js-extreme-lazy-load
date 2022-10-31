<?php
/**
 * Copyright (c) 2022. All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedJsExtremeLazyLoad\Model;

use Hryvinskyi\PageSpeedJsExtremeLazyLoad\Api\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config implements ConfigInterface
{
    /**
     * Configuration paths
     */
    public const XML_CONF_ENABLED = 'hryvinskyi_pagespeed/js/extreme_lazy_load/enabled';
    public const XML_CONF_ENABLED_TIMEOUT = 'hryvinskyi_pagespeed/js/extreme_lazy_load/enabled_timeout';
    public const XML_CONF_TIMEOUT = 'hryvinskyi_pagespeed/js/extreme_lazy_load/timeout';
    public const XML_CONF_DELAY_EVENTS = 'hryvinskyi_pagespeed/js/extreme_lazy_load/delay_events';
    public const XML_CONF_EXCLUDE_BY_ATTRIBUTES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/exclude_by_attributes';
    public const XML_CONF_EXCLUDE_BY_CONTAIN_TEXT = 'hryvinskyi_pagespeed/js/extreme_lazy_load/exclude_by_contain_text';
    public const XML_CONF_ALLOWED_TYPES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/allowed_types';
    public const XML_CONF_IS_APPLY_FOR_PAGE_TYPES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/is_apply_for_page_types';
    public const XML_CONF_APPLY_FOR_PAGE_TYPES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/apply_for_page_types';
    public const XML_CONF_IS_DISABLE_FOR_PAGE_TYPES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/is_disable_for_page_types';
    public const XML_CONF_DISABLE_FOR_PAGE_TYPES = 'hryvinskyi_pagespeed/js/extreme_lazy_load/disable_for_page_types';
    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritdoc
     */
    public function isEnabled($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONF_ENABLED, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function isTimeOutEnabled($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONF_ENABLED_TIMEOUT, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getTimeOut($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): int
    {
        return (int)$this->scopeConfig->getValue(self::XML_CONF_TIMEOUT, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getDelayEvents($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        return explode(',', (string)$this->scopeConfig->getValue(self::XML_CONF_DELAY_EVENTS, $scopeType, $scopeCode));
    }

    /**
     * @inheritDoc
     */
    public function getExcludeByAttributes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        return explode(
            ',',
            (string)$this->scopeConfig->getValue(self::XML_CONF_EXCLUDE_BY_ATTRIBUTES, $scopeType, $scopeCode)
        );
    }

    /**
     * @inheritDoc
     */
    public function getExcludeByContainText($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        return explode(
            PHP_EOL,
            (string)$this->scopeConfig->getValue(self::XML_CONF_EXCLUDE_BY_CONTAIN_TEXT, $scopeType, $scopeCode)
        );
    }

    /**
     * @inheritDoc
     */
    public function getAllowedTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        return explode(
            PHP_EOL,
            (string)$this->scopeConfig->getValue(self::XML_CONF_ALLOWED_TYPES, $scopeType, $scopeCode)
        );
    }

    /**
     * @inheritDoc
     */
    public function isApplyForPageTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONF_IS_APPLY_FOR_PAGE_TYPES, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getApplyForPageTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        $types = $this->scopeConfig->getValue(self::XML_CONF_APPLY_FOR_PAGE_TYPES, $scopeType, $scopeCode);

        if (empty($types)) {
            return [];
        }

        $result = explode(PHP_EOL, $types);

        foreach ($result as $key => $value) {
            $result[$key] = trim($value);
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function isDisableForPageTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_CONF_IS_DISABLE_FOR_PAGE_TYPES, $scopeType, $scopeCode);
    }

    /**
     * @inheritDoc
     */
    public function getDisableForPageTypes($scopeCode = null, string $scopeType = ScopeInterface::SCOPE_STORE): array
    {
        $types = $this->scopeConfig->getValue(self::XML_CONF_DISABLE_FOR_PAGE_TYPES, $scopeType, $scopeCode);

        if (empty($types)) {
            return [];
        }

        $result = explode(PHP_EOL, $types);

        foreach ($result as $key => $value) {
            $result[$key] = trim($value);
        }

        return $result;
    }
}
