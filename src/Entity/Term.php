<?php

namespace Quartetcom\DecBlogDemo\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Term
{
    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;

    public function __construct(\DateTime $from, \DateTime $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @Assert\Callback
     * @param ExecutionContextInterface $context
     */
    public function validateLessThan90Days(ExecutionContextInterface $context)
    {
        if ($this->to->diff($this->from)->days > 90) {
            $context->buildViolation('term.too_long')
                ->atPath('to')
                ->addViolation()
            ;
        }
    }

    // ...
}
