<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController {
    public function index() {
        return new Response(
            '<html lang="en"><body>Hello World!</body></html>'
        );
    }
}
