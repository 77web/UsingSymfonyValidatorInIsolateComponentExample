<?php


namespace Quartetcom\DecBlogDemo\Entity;


use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

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
        $this->assertEquals(0, $this->getViolationCount($term));
    }

    private function assertInvalidTerm(Term $term)
    {
        $this->assertGreaterThan(0, $this->getViolationCount($term));
    }

    /**
     * @param Term $term
     * @return int length of errors
     */
    private function getViolationCount(Term $term): int
    {
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();

        return count($validator->validate($term));
    }
}
