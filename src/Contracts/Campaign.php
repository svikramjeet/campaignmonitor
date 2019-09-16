<?php

namespace Svikramjeet\CampaignMonitor\Contracts;

/**
 * This is the campaign monitor contract.
 *
 * @author sviikramjeet <vikkramjeet@gmail.com>
 */
interface Campaign
{
    public function campaigns(array $ignore);
    public function subscribers(bool $show);
    public function clients(bool $show);
    public function people(Inspector $inspector);
}
