<?php
/**
 * Created by PhpStorm.
 * User: aigie
 * Date: 11/03/2017
 * Time: 14:09
 */

namespace AG\SitemapGeneratorBundle\Util;


class SitemapGenerator
{
    private $router;
    private $em;
    private $request;

    public function __construct(array $controllers)
    {
        $hostname = $this->request->getHost();
    }
}