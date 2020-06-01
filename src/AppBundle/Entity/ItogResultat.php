<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ItogResultat
 *
 * @ORM\Table(name="Itog_Resultat")
 * @ORM\Entity
 */
class ItogResultat
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
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin", type="integer", nullable=true)
     */
    private $nmin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax", type="integer", nullable=true)
     */
    private $nmax;

    /**
     * @var string
     *
     * @ORM\Column(name="cMessage", type="string", length=500, nullable=true)
     */
    private $cmessage;


}

