<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestsAttention
 *
 * @ORM\Table(name="Tests_Attention")
 * @ORM\Entity
 */
class TestsAttention
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
     * @ORM\Column(name="cTestTypes", type="string", length=50, nullable=true)
     */
    private $ctesttypes;

    /**
     * @var string
     *
     * @ORM\Column(name="cNameTest", type="string", length=200, nullable=true)
     */
    private $cnametest;

    /**
     * @var integer
     *
     * @ORM\Column(name="cColor", type="integer", nullable=true)
     */
    private $ccolor;

    /**
     * @var integer
     *
     * @ORM\Column(name="cColorText", type="integer", nullable=true)
     */
    private $ccolortext;

    /**
     * @var integer
     *
     * @ORM\Column(name="cColorSelect", type="integer", nullable=true)
     */
    private $ccolorselect;

    /**
     * @var integer
     *
     * @ORM\Column(name="cColorText2", type="integer", nullable=true)
     */
    private $ccolortext2;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTestNumber", type="integer", nullable=true)
     */
    private $ntestnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime1", type="integer", nullable=true)
     */
    private $dtime1;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime2", type="integer", nullable=true)
     */
    private $dtime2;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime3", type="integer", nullable=true)
     */
    private $dtime3;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime4", type="integer", nullable=true)
     */
    private $dtime4;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime5", type="integer", nullable=true)
     */
    private $dtime5;

    /**
     * @var integer
     *
     * @ORM\Column(name="dTime6", type="integer", nullable=true)
     */
    private $dtime6;

    /**
     * @var string
     *
     * @ORM\Column(name="cResult1", type="string", length=255, nullable=true)
     */
    private $cresult1;

    /**
     * @var string
     *
     * @ORM\Column(name="cResult2", type="string", length=255, nullable=true)
     */
    private $cresult2;

    /**
     * @var string
     *
     * @ORM\Column(name="cResult3", type="string", length=255, nullable=true)
     */
    private $cresult3;


}

