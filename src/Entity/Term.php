<?php

namespace Quartetcom\DecBlogDemo\Entity;

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

    public function validateLessThan90Days()
    {
        if ($this->to->diff($this->from)->days > 90) {
            throw new \LogicException('Term is too long.');
        }
    }

    // ...
}
