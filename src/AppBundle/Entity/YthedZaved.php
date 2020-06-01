<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * YthedZaved
 *
 * @ORM\Table(name="Ythed_Zaved")
 * @ORM\Entity
 */
class YthedZaved
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
     * @ORM\Column(name="n_Organiz_Key", type="integer", nullable=true)
     */
    private $nOrganizKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="n_Napravlen_Key", type="integer", nullable=true)
     */
    private $nNapravlenKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="n_PodNapravlen_Key", type="integer", nullable=true)
     */
    private $nPodnapravlenKey;


}

