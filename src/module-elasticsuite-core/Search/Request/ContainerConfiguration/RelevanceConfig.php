<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Smile ElasticSuite to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\ElasticsuiteCore
 * @author    Romain Ruaud <romain.ruaud@smile.fr>
 * @copyright 2020 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Smile\ElasticsuiteCore\Search\Request\ContainerConfiguration;

use Smile\ElasticsuiteCore\Api\Search\Request\Container\RelevanceConfiguration\FuzzinessConfigurationInterface;
use Smile\ElasticsuiteCore\Api\Search\Request\Container\RelevanceConfigurationInterface;

/**
 * Relevance Configuration object
 *
 * @category Smile
 * @package  Smile\ElasticsuiteCore
 * @author   Romain Ruaud <romain.ruaud@smile.fr>
 */
class RelevanceConfig implements RelevanceConfigurationInterface
{
    /**
     * @var string
     */
    private $minimumShouldMatch;

    /**
     * @var float
     */
    private $tieBreaker;

    /**
     * @var integer|null
     */
    private $phraseMatchBoost;

    /**
     * @var float
     */
    private $cutOffFrequency;

    /**
     * @var FuzzinessConfigurationInterface
     */
    private $fuzzinessConfiguration;

    /**
     * @var boolean
     */
    private $enablePhoneticSearch;

    /**
     * @var integer|null
     */
    private $spanMatchBoost;

    /**
     * @var integer|null
     */
    private $spanSize;

    /**
     * RelevanceConfiguration constructor.
     *
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @param string                               $minimumShouldMatch   Minimum should match clause of the text query.
     * @param float                                $tieBreaker           Tie breaker for multimatch queries.
     * @param int|null                             $phraseMatchBoost     The Phrase match boost value, or null if not
     *                                                                   enabled
     * @param float                                $cutOffFrequency      The cutoff Frequency value
     * @param FuzzinessConfigurationInterface|null $fuzziness            The fuzziness Configuration, or null
     * @param boolean                              $enablePhoneticSearch The phonetic Configuration, or null
     * @param int|null                             $spanMatchBoost       The Span match boost value, or null if not
     *                                                                   enabled
     * @param int|null                             $spanSize             The number of terms to match in span queries
     */
    public function __construct(
        $minimumShouldMatch,
        $tieBreaker,
        $phraseMatchBoost,
        $cutOffFrequency,
        FuzzinessConfigurationInterface $fuzziness = null,
        $enablePhoneticSearch = false,
        $spanMatchBoost = null,
        $spanSize = null
    ) {
        $this->minimumShouldMatch     = $minimumShouldMatch;
        $this->tieBreaker             = $tieBreaker;
        $this->phraseMatchBoost       = $phraseMatchBoost;
        $this->cutOffFrequency        = $cutOffFrequency;
        $this->fuzzinessConfiguration = $fuzziness;
        $this->enablePhoneticSearch   = $enablePhoneticSearch;
        $this->spanMatchBoost         = $spanMatchBoost;
        $this->spanSize               = $spanSize;
    }

    /**
     * {@inheritDoc}
     */
    public function getMinimumShouldMatch()
    {
        return $this->minimumShouldMatch;
    }

    /**
     * {@inheritDoc}
     */
    public function getTieBreaker()
    {
        return $this->tieBreaker;
    }

    /**
     * @return int|null
     */
    public function getPhraseMatchBoost()
    {
        return (int) $this->phraseMatchBoost;
    }

    /**
     * @return float
     */
    public function getCutOffFrequency()
    {
        return (float) $this->cutOffFrequency;
    }

    /**
     * Retrieve FuzzinessConfiguration
     *
     * @return FuzzinessConfigurationInterface|null
     */
    public function getFuzzinessConfiguration()
    {
        return $this->fuzzinessConfiguration;
    }

    /**
     * Check if fuzziness is enabled
     *
     * @return boolean
     */
    public function isFuzzinessEnabled()
    {
        return (bool) $this->fuzzinessConfiguration;
    }

    /**
     * Check if phonetic search is enabled
     *
     * @return boolean
     */
    public function isPhoneticSearchEnabled()
    {
        return (bool) $this->enablePhoneticSearch;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpanMatchBoost()
    {
        return (int) $this->spanMatchBoost;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpanSize()
    {
        return (int) $this->spanSize;
    }
}
