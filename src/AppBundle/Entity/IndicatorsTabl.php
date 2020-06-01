<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicatorsTabl
 *
 * @ORM\Table(name="INDICATORS_tabl")
 * @ORM\Entity
 */
class IndicatorsTabl
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
     * @var string
     *
     * @ORM\Column(name="cIndicatorName", type="string", length=100, nullable=true)
     */
    private $cindicatorname;

    /**
     * @var integer
     *
     * @ORM\Column(name="nCategory", type="integer", nullable=true)
     */
    private $ncategory;

    /**
     * @var float
     *
     * @ORM\Column(name="nWeight", type="float", precision=53, scale=0, nullable=true)
     */
    private $nweight;

    /**
     * @var integer
     *
     * @ORM\Column(name="nIndicatorKey", type="integer", nullable=true)
     */
    private $nindicatorkey;


}

