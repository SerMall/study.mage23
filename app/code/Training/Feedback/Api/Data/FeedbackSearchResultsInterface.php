<?php

namespace Training\Feedback\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface FeedbackSearchResultsInterface extends SearchResultsInterface
{
    public function getItems();

    public function setItems(array $items);
}