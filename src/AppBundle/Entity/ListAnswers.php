<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListAnswers
 *
 * @ORM\Table(name="List_Answers")
 * @ORM\Entity
 */
class ListAnswers
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
     * @ORM\Column(name="nKeyID", type="integer", nullable=false)
     */
    private $nkeyid;

    /**
     * @var integer
     *
     * @ORM\Column(name="nAnswerNum", type="integer", nullable=true)
     */
    private $nanswernum;

    /**
     * @var string
     *
     * @ORM\Column(name="cVariant", type="string", length=500, nullable=true)
     */
    private $cvariant;

    /**
     * @var integer
     *
     * @ORM\Column(name="nBall", type="integer", nullable=true)
     */
    private $nball;

    /**
     * @var integer
     *
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;


}

