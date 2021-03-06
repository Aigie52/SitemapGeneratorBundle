<?php
/**
 * Created by PhpStorm.
 * User: aigie
 * Date: 11/03/2017
 * Time: 14:37
 */

namespace Aigie\SitemapGeneratorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitemapController extends Controller
{
    public function sitemapAction()
    {
        $controllers = $this->container->getParameter('sitemap.controllers');
        $data = $this->get('ag.sitemap_generator')->generate($controllers);

        return $this->render('sitemap.xml.twig', array(
            'urls' => $data['urls'],
            'hostname' => $data['hostname']
        ));
    }
}
