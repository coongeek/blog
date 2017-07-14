<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Post
{
    /**
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Profile")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    private $author;
    
    /**
     * @ORM\Column(type="datetime", name="date")
     */
    private $date;
    
    /**
     * @ORM\Column(type="string", name="title", length=255)
     */
    private $title;
    
    /**
     * @ORM\Column(type="text", name="text")
     */
    private $text;
}

