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

class AttributeType implements ValidatorInterface
{
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
        $allowedTypes = $this->config->getAllowedTypes();
        $attrs = $script->getAttributes();

        return (isset($attrs['type']) === true && in_array($attrs['type'], $allowedTypes, true) === false) === false;
    }
}
