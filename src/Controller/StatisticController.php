<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\Statistic;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class StatisticController extends Controller
{
    /**
     * @var Statistic
     */
    protected $statistic;

    public function __construct(Statistic $statistic)
    {
        $this->statistic = $statistic;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $statistic = $this->statistic->getStatistic('ZiElonA Mila|age>30');

        return $this->render(
            'statistic/example1.html.twig',
            ['statistic' => $statistic]
        );
    }

    /**
     * @Route("/example2", name="stats")
     */
    public function example2(): Response
    {
        $statistic = $this->statistic->getStatistic('ZiElonA Droga|age<30');

        return $this->render(
            'statistic/example1.html.twig',
            ['statistic' => $statistic]
        );
    }
}