<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicatorsFio
 *
 * @ORM\Table(name="INDICATORS_FIO")
 * @ORM\Entity
 */
class IndicatorsFio
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
     * @ORM\Column(name="nIndicatorKey", type="integer", nullable=true)
     */
    private $nindicatorkey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nValue", type="integer", nullable=true)
     */
    private $nvalue;

    /**
     * @var string
     *
     * @ORM\Column(name="cPrim", type="string", length=100, nullable=true)
     */
    private $cprim;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dDate", type="datetime", nullable=true)
     */
    private $ddate;


}

