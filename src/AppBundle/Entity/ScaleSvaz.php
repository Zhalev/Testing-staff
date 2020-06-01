<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScaleSvaz
 *
 * @ORM\Table(name="SCALE_SVAZ")
 * @ORM\Entity
 */
class ScaleSvaz
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
     * @ORM\Column(name="nKeyTest", type="integer", nullable=true)
     */
    private $nkeytest;

    /**
     * @var integer
     *
     * @ORM\Column(name="Vop1", type="integer", nullable=true)
     */
    private $vop1;

    /**
     * @var integer
     *
     * @ORM\Column(name="Vop2", type="integer", nullable=true)
     */
    private $vop2;


}

