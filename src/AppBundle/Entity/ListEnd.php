<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEnd
 *
 * @ORM\Table(name="List_END")
 * @ORM\Entity
 */
class ListEnd
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKey", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUserKey", type="integer", nullable=true)
     */
    private $nuserkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestKey", type="integer", nullable=true)
     */
    private $ntestkey;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDate", type="datetime", nullable=true)
     */
    private $ddate;

    /**
     * @var string
     *
     * @ORM\Column(name="INFO", type="text", length=16, nullable=true)
     */
    private $info;


}

