<?php

namespace main\projectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function transfertCategorieToDataBase($cat,$idMere,$niv)
    {

        if(!empty($cat))
        {       
            $id=$cat->getAttribute("id");
            $name=$cat->getAttribute("name");
            $ref=$idMere;

            $catalogue=new \main\projectBundle\Entity\Catalogue();
            $catalogue->setName($name);
            $catalogue->setId($id);
            $catalogue->setRef($ref);
        
            $em=$this->getDoctrine()->getManager();
            $em->persist($catalogue);
            $em->flush();
            
            $niv+=1;
            $sousCats=$cat->getElementsByTagName("cat".$niv);
            foreach ($sousCats as $sousCat){
                self::transfertCategorieToDataBase($sousCat,$id,$niv);
            }
        }
    }
    
    public function CategorieUpdateAction($name)
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
                    case "cat1":
                        $cat=$reader->expand();              
                        self::transfertCategorieToDataBase($cat,$idmere=0,$niv=1);
                    //case "prod":
                        //$prod=$reader->expand();
                        //self::transfertProduitToDataBase($prod);
			}
			
		}
	}
        
        return $this->render('mainprojectBundle:Categorie:CategorieUpdate.html.twig');
    }

    
    public function ViewCategorieAction()
    {
        
        $manageur = $this->getDoctrine()->getManager();
        $listeCategorie = $manageur->getRepository("mainprojectBundle:Catalogue")->findAll();

        // je recupère une entité maintenant qui existe
        $compteur = 0;
        foreach($listeCategorie as $Categorie){
            $compteur += 1;
            }
        return $this->render("mainprojectBundle:Categorie:ViewCategorie.html.twig",array("compteur"=>$compteur,"liste"=>$listeCategorie,"categorie"=>$Categorie));
        }
        
        }
