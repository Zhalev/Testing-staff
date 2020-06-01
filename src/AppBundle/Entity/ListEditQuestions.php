<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListEditQuestions
 *
 * @ORM\Table(name="List_Edit_Questions")
 * @ORM\Entity
 */
class ListEditQuestions
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
     * @ORM\Column(name="nNumberID", type="integer", nullable=true)
     */
    private $nnumberid;

    /**
     * @var string
     *
     * @ORM\Column(name="cVopros", type="string", length=250, nullable=true)
     */
    private $cvopros;

    /**
     * @var string
     *
     * @ORM\Column(name="cOtvet", type="string", length=50, nullable=true)
     */
    private $cotvet;

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


}

