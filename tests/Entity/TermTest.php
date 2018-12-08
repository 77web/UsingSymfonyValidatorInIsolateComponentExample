<?php


namespace Quartetcom\DecBlogDemo\Entity;


use PHPUnit\Framework\TestCase;

class TermTest extends TestCase
{
    public function test_validate_90days()
    {
        $term = new Term(new \DateTime('2018-11-01'), new \DateTime('2019-01-30'));
        $this->assertValidTerm($term);
    }

    public function test_validate_91days()
    {
        $term = new Term(new \DateTime('2018-11-01'), new \DateTime('2019-01-31'));
        $this->assertInvalidTerm($term);
    }

    private function assertValidTerm(Term $term)
    {
        $this->doValidate($term);

        $this->assertTrue(true);
    }

    private function assertInvalidTerm(Term $term)
    {
        $this->expectException(\LogicException::class);

        $this->doValidate($term);
    }

    private function doValidate(Term $term)
    {
        $term->validateLessThan90Days();
    }
}
