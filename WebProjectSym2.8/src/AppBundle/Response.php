<?php
namespace AppBundle;

use JMS\Serializer\Annotation as Serializer;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Response
{
    /**
     * @var Collection
     * @Serializer\XmlList()
     */
    protected $data;


    public function __construct($data)
    {
        if (is_array($data)) {
            $data = new ArrayCollection($data);
        } elseif (!$data instanceof Collection) {
            throw new \RuntimeException('Response requires a Collection or an array');
        }
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}