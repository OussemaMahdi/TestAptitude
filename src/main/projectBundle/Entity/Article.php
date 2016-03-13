<?php

namespace main\projectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    
    /**
     * @var string
     */
    private $artId;

    /**
     * @var string
     */
    private $artCle;

    /**
     * @var string
     */
    private $poids;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $prixPublic;

    /**
     * @var string
     */
    private $descrC;

    /**
     * @var string
     */
    private $category;


    /**
     * Set artId
     *
     * @param string $artId
     * @return Article
     */
    public function setArtId($artId)
    {
        $this->artId = $artId;

        return $this;
    }

    /**
     * Get artId
     *
     * @return string 
     */
    public function getArtId()
    {
        return $this->artId;
    }

    /**
     * Set artCle
     *
     * @param string $artCle
     * @return Article
     */
    public function setArtCle($artCle)
    {
        $this->artCle = $artCle;

        return $this;
    }

    /**
     * Get artCle
     *
     * @return string 
     */
    public function getArtCle()
    {
        return $this->artCle;
    }

    /**
     * Set poids
     *
     * @param string $poids
     * @return Article
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return string 
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set marque
     *
     * @param string $marque
     * @return Article
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string 
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set prixPublic
     *
     * @param string $prixPublic
     * @return Article
     */
    public function setPrixPublic($prixPublic)
    {
        $this->prixPublic = $prixPublic;

        return $this;
    }

    /**
     * Get prixPublic
     *
     * @return string 
     */
    public function getPrixPublic()
    {
        return $this->prixPublic;
    }

    /**
     * Set descrC
     *
     * @param string $descrC
     * @return Article
     */
    public function setDescrC($descrC)
    {
        $this->descrC = $descrC;

        return $this;
    }

    /**
     * Get descrC
     *
     * @return string 
     */
    public function getDescrC()
    {
        return $this->descrC;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Article
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
}
