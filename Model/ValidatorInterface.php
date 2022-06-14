<?php
/**
 * Copyright (c) 2022. MageCloud.  All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedJsExtremeLazyLoad\Model;

use Hryvinskyi\PageSpeedApi\Api\Finder\Result\TagInterface;

interface ValidatorInterface
{
    /**
     * Validator function, handle javascript or not
     *
     * @param \Hryvinskyi\PageSpeedApi\Api\Finder\Result\TagInterface $script
     *
     * @return bool
     */
    public function validate(TagInterface $script): bool;
}
