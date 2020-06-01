<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEndOpt
 *
 * @ORM\Table(name="List_END_Opt")
 * @ORM\Entity
 */
class ListEndOpt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyEND", type="integer", nullable=true)
     */
    private $nkeyend;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBall", type="integer", nullable=true)
     */
    private $nball;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMaxBall", type="integer", nullable=true)
     */
    private $nmaxball;

    /**
     * @var string
     *
     * @ORM\Column(name="ScaleName", type="string", length=100, nullable=true)
     */
    private $scalename;


}

