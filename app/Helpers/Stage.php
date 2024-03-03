<?php

namespace App\Helpers;

class Stage
{
    public static function all()
    {
        return [
            'Qualification',
            'Needs Analysis',
            'Value Proposition',
            'Identify Decision Makers',
            'Proposal/Price Quote',
            'Negotiation/Review',
            'Closed Won',
            'Closed Lost',
            'Closed Lost to Competition'
        ];
    }
}
