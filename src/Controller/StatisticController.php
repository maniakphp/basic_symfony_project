<?php declare(strict_types=1);

namespace App\Controller;

use App\Entity\Review;
use App\Service\Statistics;
use App\Service\Stats;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatisticsController extends Controller
{
    /**
     * @var Statistics
     */
    protected $statistics;

    public function __construct(Statistics $statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @Route("/", name="stats")
     */
    public function index()
    {
        $this->statistics->getStatistics('ZiElonA Mila | age > 30');
    }
}