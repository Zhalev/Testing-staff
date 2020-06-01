<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestsScales
 *
 * @ORM\Table(name="Tests_Scales")
 * @ORM\Entity
 */
class TestsScales
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
     * @ORM\Column(name="cScaleName", type="string", length=300, nullable=true)
     */
    private $cscalename;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin1", type="integer", nullable=true)
     */
    private $nmin1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax1", type="integer", nullable=true)
     */
    private $nmax1;

    /**
     * @var string
     *
     * @ORM\Column(name="nResult1", type="string", length=1000, nullable=true)
     */
    private $nresult1;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin2", type="integer", nullable=true)
     */
    private $nmin2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax2", type="integer", nullable=true)
     */
    private $nmax2;

    /**
     * @var string
     *
     * @ORM\Column(name="nResult2", type="string", length=1000, nullable=true)
     */
    private $nresult2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin3", type="integer", nullable=true)
     */
    private $nmin3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax3", type="integer", nullable=true)
     */
    private $nmax3;

    /**
     * @var string
     *
     * @ORM\Column(name="nResult3", type="string", length=1000, nullable=true)
     */
    private $nresult3;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin4", type="integer", nullable=true)
     */
    private $nmin4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax4", type="integer", nullable=true)
     */
    private $nmax4;

    /**
     * @var string
     *
     * @ORM\Column(name="nResult4", type="string", length=1000, nullable=true)
     */
    private $nresult4;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMin5", type="integer", nullable=true)
     */
    private $nmin5;

    /**
     * @var integer
     *
     * @ORM\Column(name="nMax5", type="integer", nullable=true)
     */
    private $nmax5;

    /**
     * @var string
     *
     * @ORM\Column(name="nResult5", type="string", length=1000, nullable=true)
     */
    private $nresult5;


}

