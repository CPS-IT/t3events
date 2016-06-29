<?php
namespace Webfox\T3events\Controller;

use Webfox\T3events\Domain\Model\Dto\SearchFactory;

/**
 * Class SearchTrait

 *
*@package Webfox\T3events\Tests\Controller
 */
trait SearchTrait
{
    /**
     * @var \Webfox\T3events\Domain\Model\Dto\SearchFactory
     */
    protected $searchFactory;

    /**
     * @param \Webfox\T3events\Domain\Model\Dto\SearchFactory $searchFactory
     */
    public function injectSearchFactory(SearchFactory $searchFactory) {
        $this->searchFactory = $searchFactory;
    }

    /**
     * Creates a search object from given settings
     *
     * @param array $searchRequest An array with the search request
     * @param array $settings Settings for search
     * @return \Webfox\T3events\Domain\Model\Dto\Search $search
     */
    public function createSearchObject($searchRequest, $settings)
    {
        return $this->searchFactory->get($searchRequest, $settings);
    }
}
