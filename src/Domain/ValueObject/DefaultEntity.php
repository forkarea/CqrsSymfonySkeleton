<?php

namespace App\Domain\ValueObject;

use JMS\Serializer\Annotation as Serializer;


class DefaultEntity
{
    /**
     * @Serializer\Type("int")
     * @var int
     */
    private $id;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $title;

    /**
     * DefaultEntity constructor.
     * @param int $id
     * @param string $title
     */
    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }


}