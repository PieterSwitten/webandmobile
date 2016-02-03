<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 03.02.16
 * Time: 01:39
 */

namespace AppBundle;

use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FosRestView {
    /**
     * @param ViewHandler $viewHandler
     * @param View $view
     * @param Request $request
     * @param string $format
     */
    public function createResponse(ViewHandler $handler, View $view, Request $request, $format)
    {
        $fosrestview =  '<?xml version="1.0" encoding="ISO-8859-1"?>';
        $fosrestview .= '<rss version="2.0">';
        $fosrestview .= '<channel>';
        $fosrestview .= '<title>Get Afspraken</title>';
        $fosrestview .= '<language>en-us</language>';
        return new Response($fosrestview, 200, $view->getHeaders());
    }
}