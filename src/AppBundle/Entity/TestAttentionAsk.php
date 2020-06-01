<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestAttentionAsk
 *
 * @ORM\Table(name="Test_Attention_ask")
 * @ORM\Entity
 */
class TestAttentionAsk
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
     * @ORM\Column(name="nKeyAttention", type="integer", nullable=true)
     */
    private $nkeyattention;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dTime", type="datetime", nullable=true)
     */
    private $dtime;

    /**
     * @var integer
     *
     * @ORM\Column(name="nError", type="integer", nullable=true)
     */
    private $nerror;

    /**
     * @var integer
     *
     * @ORM\Column(name="nUser", type="integer", nullable=true)
     */
    private $nuser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dRunDate", type="datetime", nullable=true)
     */
    private $drundate;


}

