<?php

namespace App\Model;

/**
 * @author feday2 <feday2@gmail.com>
 */
class Article
{
    private $id;
    private $title;
    private $body;
    private $image;
    private $publishedAt;

    /**
     * @param int       $id
     * @param string    $title
     * @param string    $body
     * @param string    $image
     * @param \DateTime $publishedAt
     */
    public function __construct(int $id = null, string $title = null, string $body = null, string $image = null, \DateTime $publishedAt = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->image = $image;
        $this->publishedAt = $publishedAt;
    }

    /**
     * Get the value of id.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of body.
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body.
     */
    public function setBody($body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of image.
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image.
     */
    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of publishedAt.
     */
    public function getPublishedAt()
    {
        return $this->publishedAt;
    }

    /**
     * Set the value of publishedAt.
     */
    public function setPublishedAt($publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
}
