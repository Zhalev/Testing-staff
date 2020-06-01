<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListScale
 *
 * @ORM\Table(name="List_Scale")
 * @ORM\Entity
 */
class ListScale
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
     * @ORM\Column(name="nKeyID", type="integer", nullable=true)
     */
    private $nkeyid;

    /**
     * @var string
     *
     * @ORM\Column(name="cNameScale", type="string", length=80, nullable=true)
     */
    private $cnamescale;


}

