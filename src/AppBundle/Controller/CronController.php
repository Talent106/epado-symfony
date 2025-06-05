<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CronController extends BaseController
{
     /**
     * @Route("/cron", name="cron")
     * @Template()
     */
    public function cronAction()
    {
        die('cron');
    }

}
