<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListItogResult
 *
 * @ORM\Table(name="List_Itog_Result")
 * @ORM\Entity
 */
class ListItogResult
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
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallOt", type="integer", nullable=true)
     */
    private $nballot;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBallDo", type="integer", nullable=true)
     */
    private $nballdo;

    /**
     * @var string
     *
     * @ORM\Column(name="cResault", type="string", length=200, nullable=true)
     */
    private $cresault;


}

