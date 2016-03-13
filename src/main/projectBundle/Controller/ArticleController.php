<?php

namespace main\projectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    
    public function transfertProduitToDataBase($prod)
    {
        $art_id=$prod->getElementsByTagName("art_id");
        $art_cle=$prod->getElementsByTagName("art_cle");
        $poids=$prod->getElementsByTagName("poids");
        $marque=$prod->getElementsByTagName("marque");
        $prx_public=$prod->getElementsByTagName("prx_public");
        $descr_c=$prod->getElementsByTagName("descr_c");
        $category=$prod->getElementsByTagName("category");
        
        
        
        $article=new \main\projectBundle\Entity\Article();
        $article->setArtId($art_id[0]->nodeValue);
        $article->setArtCle($art_cle[0]->nodeValue);
        $article->setPoids($poids[0]->nodeValue);
        $article->setMarque($marque[0]->nodeValue);
        $article->setPrixPublic($prx_public[0]->nodeValue);
        $article->setDescrC($descr_c[0]->nodeValue);
        $article->setCategory($category[0]->nodeValue);
        
        $em=$this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();
    }

    
    public function ArticleUpdateAction($name)
    {
        $url="E:\catalog_francereduc_sms.xml";
        $reader = new \XMLReader();
        
        if (!$reader->open($url)) {
            die("Failed to open 'data.xml'");
            }
        
        while($reader->read())
        { 
            
            if ($reader->nodeType==\XMLReader::ELEMENT )
                {
                switch ($reader->name)
                {
                    case "prod":
                        $prod=$reader->expand();
                        self::transfertProduitToDataBase($prod);
			}
			
		}
	}
        
        return $this->render('mainprojectBundle:Article:ArticleUpdate.html.twig');
    }

    public function ViewArticleAction()
    {
        
        $manageur = $this->getDoctrine()->getManager();
        $listearticle = $manageur->getRepository("mainprojectBundle:Article")->findAll();

        // je recupère une entité maintenant qui existe
        $compteur = 0;
        foreach($listearticle as $article){
            $compteur += 1;
            }
        return $this->render("mainprojectBundle:Article:ViewArticle.html.twig",array("compteur"=>$compteur,"liste"=>$listearticle,"article"=>$article));
        }
    }
