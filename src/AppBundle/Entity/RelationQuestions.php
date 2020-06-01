<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelationQuestions
 *
 * @ORM\Table(name="Relation_Questions")
 * @ORM\Entity
 */
class RelationQuestions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nKeyTests", type="integer", nullable=true)
     */
    private $nkeytests;

    /**
     * @var integer
     *
     * @ORM\Column(name="nNumberAsc", type="integer", nullable=true)
     */
    private $nnumberasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nTypeTest", type="integer", nullable=true)
     */
    private $ntypetest;

    /**
     * @var integer
     *
     * @ORM\Column(name="nNumberID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nnumberid;


}

