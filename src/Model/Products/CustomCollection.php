<?php

/*
 * This file is part of the slince/shopify-api-php
 *
 * (c) Slince <taosikai@yeah.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Slince\Shopify\Resource\Products;

use DateTimeInterface;

class CustomCollection
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $handle;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var DateTimeInterface
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected $bodyHtml;

    /**
     * @var DateTimeInterface
     */
    protected $publishedAt;

    /**
     * @var string
     */
    protected $sortOrder;

    /**
     * @var string
     */
    protected $templateSuffix;

    /**
     * @var string
     */
    protected $publishedScope;

    /**
     * @var CollectionImage
     */
    protected $image;

    /**
     * @var string
     */
    protected $adminGraphqlApiId;

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
    public function getAdminGraphqlApiId(): string
    {
        return $this->adminGraphqlApiId;
    }

    /**
     * @param string $adminGraphqlApiId
     */
    public function setAdminGraphqlApiId(string $adminGraphqlApiId): void
    {
        $this->adminGraphqlApiId = $adminGraphqlApiId;
    }

    /**
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     *

     */
    public function setHandle($handle)
    {
        $this->handle = $handle;


    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *

     */
    public function setTitle($title)
    {
        $this->title = $title;


    }

    /**
     * @return DateTimeInterface
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTimeInterface $updatedAt
     *

     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;


    }

    /**
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->bodyHtml;
    }

    /**
     * @param string $bodyHtml
     *

     */
    public function setBodyHtml($bodyHtml)
    {
        $this->bodyHtml = $bodyHtml;


    }

    /**
     * @return DateTimeInterface
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTimeInterface $publishedAt
     *

     */
    public function setPublishedAt($publishedAt)
    {
        $this->publishedAt = $publishedAt;


    }

    /**
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param string $sortOrder
     *

     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;


    }

    /**
     * @return string
     */
    public function getTemplateSuffix()
    {
        return $this->templateSuffix;
    }

    /**
     * @param string $templateSuffix
     *

     */
    public function setTemplateSuffix($templateSuffix)
    {
        $this->templateSuffix = $templateSuffix;


    }

    /**
     * @return string
     */
    public function getPublishedScope()
    {
        return $this->publishedScope;
    }

    /**
     * @param string $publishedScope
     *

     */
    public function setPublishedScope($publishedScope)
    {
        $this->publishedScope = $publishedScope;


    }

    /**
     * Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param CollectionImage $image
     *
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}