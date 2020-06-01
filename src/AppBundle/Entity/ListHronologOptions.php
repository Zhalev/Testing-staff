<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListHronologOptions
 *
 * @ORM\Table(name="List_Hronolog_Options")
 * @ORM\Entity
 */
class ListHronologOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nNumberID", type="integer", nullable=true)
     */
    private $nnumberid;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallYes", type="integer", nullable=true)
     */
    private $nballyes;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallNo", type="integer", nullable=true)
     */
    private $nballno;

    /**
     * @var integer
     *
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nkeyid;

    /**
     * @var string
     *
     * @ORM\Column(name="cTestQuestion", type="string", length=200, nullable=true)
     */
    private $ctestquestion;


}

