<?php
/**
 * Copyright (c) 2022. MageCloud.  All rights reserved.
 * @author: Volodymyr Hryvinskyi <mailto:volodymyr@hryvinskyi.com>
 */

declare(strict_types=1);

namespace Hryvinskyi\PageSpeedJsExtremeLazyLoad\Model;

use Hryvinskyi\PageSpeedApi\Api\Finder\Result\TagInterface;

interface CanScriptLazyLoadingInterface
{
    /**
     * @param TagInterface $tag
     * @return bool
     */
    public function execute(TagInterface $tag): bool;
}
