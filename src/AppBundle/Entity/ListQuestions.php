<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListQuestions
 *
 * @ORM\Table(name="List_Questions")
 * @ORM\Entity
 */
class ListQuestions
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
     * @ORM\Column(name="nNumberID", type="integer", nullable=false)
     */
    private $nnumberid;

    /**
     * @var string
     *
     * @ORM\Column(name="cQuestion", type="string", length=500, nullable=true)
     */
    private $cquestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="nCount", type="integer", nullable=true)
     */
    private $ncount;

    /**
     * @var integer
     *
     * @ORM\Column(name="nAnswerNum", type="integer", nullable=true)
     */
    private $nanswernum;

    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyID", type="integer", nullable=false)
     */
    private $nkeyid;

    /**
     * @var integer
     *
     * @ORM\Column(name="nScaleKey", type="integer", nullable=true)
     */
    private $nscalekey;

    /**
     * @var string
     *
     * @ORM\Column(name="IMAGE", type="text", length=16, nullable=true)
     */
    private $image;


}

