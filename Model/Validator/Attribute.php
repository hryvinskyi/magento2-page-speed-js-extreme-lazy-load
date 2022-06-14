<?php
/**
 * Copyright (c) 2022. MageCloud.  All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedJsExtremeLazyLoad\Model\Validator;

use Hryvinskyi\PageSpeedApi\Api\Finder\Result\TagInterface;
use Hryvinskyi\PageSpeedJsExtremeLazyLoad\Api\ConfigInterface;
use Hryvinskyi\PageSpeedJsExtremeLazyLoad\Model\ValidatorInterface;

class Attribute implements ValidatorInterface
{
    public const IGNORE_ATTRIBUTE = 'data-ignore-extreme-lazy-load';
    private ConfigInterface $config;

    /**
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function validate(TagInterface $script): bool
    {
        $ignoredAttributes = array_merge($this->config->getExcludeByAttributes(), [self::IGNORE_ATTRIBUTE]);

        return count(array_intersect($ignoredAttributes, array_keys($script->getAttributes()))) === 0;
    }
}
