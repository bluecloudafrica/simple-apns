<?php


namespace BlueCloud\SimpleAPNS;


class APNSMessage
{
    /**
     * @var bool
     */
    private $content = false;
    /**
     * @var string
     */
    private $token;
    /**
     * @var string
     */
    private $title = "Title";
    /**
     * @var string
     */
    private $message = "Message";

    /**
     * APNSMessage constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token =  $token;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return bool
     */
    public function isContent(): bool
    {
        return $this->content;
    }


    /**
     * @param bool $value
     */
    public function setContent(bool $value)
    {
        $this->content = $value;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }


}
