<?php declare(strict_types=1);

namespace App\Service;

use App\DTO\ParamDTO;
use App\DTO\StatisticDTO;
use App\Repository\ReviewRepository;
use App\Utils\FloatUtils;
use App\Utils\ParamParser;

/**
 * Class Statistics
 *
 * @package App\Service
 */
class Statistics
{
    /**
     * @var ReviewRepository
     */
    protected $reviewRepository;

    /**
     * @var ParamParser
     */
    protected $paramParser;

    /**
     * @var FloatUtils
     */
    protected $floatUtils;

    /**
     * Statistics constructor.
     *
     * @param ReviewRepository $repository
     * @param ParamParser      $paramParser
     * @param FloatUtils       $floatUtils
     */
    public function __construct(
        ReviewRepository $repository,
        ParamParser $paramParser,
        FloatUtils $floatUtils
    ) {
        $this->reviewRepository = $repository;
        $this->paramParser      = $paramParser;
        $this->floatUtils       = $floatUtils;
    }

    /**
     * @param string $criteria
     *
     * @return array
     */
    public function getStatistics(string $criteria)
    {
        $params = $this->paramParser->prepareParams($criteria);

        $statistics = $this->reviewRepository->findByNameAndAge($params);

        if (0 === count($statistics)) {
            $statistics = $this->reviewRepository->findByAge($params);
        }

        return $this->getStatisticsDTO($statistics, $params);
    }

    /**
     * @param array    $statistics
     * @param ParamDTO $params
     *
     * @return array
     */
    public function getStatisticsDTO(array $statistics, ParamDTO $params)
    {
        $searchedName = $params->getName();

        $collection = [];
        foreach ($statistics as $statistic) {
            $name = $statistic['name'];
            similar_text($searchedName, $name, $percentage);

            $statisticDTO = new StatisticDTO();
            $statisticDTO
                ->setName($name)
                ->setCompatibility($this->floatUtils->roundUp($percentage))
                ->setBookDate($statistic['bookDate'])
                ->setAvgFemale(
                    $this->floatUtils->roundUp((float)$statistic['avg_female'])
                )
                ->setAvgMale(
                    $this->floatUtils->roundUp((float)$statistic['avg_male'])
                );
            $collection[] = $statisticDTO;
        }


        usort($collection, function (StatisticDTO $a, StatisticDTO $b) {
            return $a->getCompatibility() < $b->getCompatibility();
        });

        return $collection;
    }
}