<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity;
 * @ORM\Table(name="blog")
 */
class Blog
{
    /**
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", targetEntityName="id")
     */
    private $user;
    
    /**
     * @ORM\Column(type="string", length=255, name="name")
     */
    private $name;
    
    /**
     * @ORM\Column(type="integer", name="post_count")
     */
    private $post_count;
}

