<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Company;
use App\Entity\Type;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;

class TypeTest extends TestCase
{
    const COMPANY_VALUES = ["name"=>"Company 1","siret"=>"12345678900012","zipCode"=>94700,"city"=>"MAISONS ALFORT"];
    const TYPE_VALUES = ["label"=>"Type 1"];

    private function makeType(): Type
    {
        $type = new Type();
        $type->setLabel(self::TYPE_VALUES["label"]);
        return $type;
    }

    public function testGetLabel(): void
    {
        $t = $this->makeType();
        $this->assertEquals(self::TYPE_VALUES["label"],$t->getLabel());
    }


    public function testSetWrongTypeForLabelAndExpectTypeError(): void
    {
        $labelValues = [1234,[],new \stdClass()];
        $t = new Type();
        foreach($labelValues as $value){
            $this->expectException(\TypeError::class);
            $t->setLabel($value);
        }
    }

    public function testGetCompanies(){
        $t = $this->makeType();
        $this->assertInstanceOf(Collection::class,$t->getCompanies());
        $this->assertContainsOnlyInstancesOf(Company::class,$t->getCompanies());
    }

    public function testAddCompagny(){
        $t = $this->makeType();
        $compagny = new Company();
        $this->assertCount(0,$t->getCompanies());
        $t->addCompany($compagny);
        $this->assertContains($compagny,$t->getCompanies());
        $this->assertCount(1,$t->getCompanies());
    }

    public function testAddCompagnyWrongType(){
        $t = $this->makeType();
        $nameValue = ["",true,1234,new Type()];

        foreach ($nameValue as $value)
        {
            $this->expectException(\TypeError::class);
            $t->addCompany($value);
        }
    }

    public function testRemoveCompagny(){
        $t = $this->makeType();
        $compagny = new Company();
        $this->assertCount(0,$t->getCompanies());
        $t->addCompany($compagny);
        $this->assertCount(1,$t->getCompanies());

        $t->removeCompany($compagny);
        $this->assertCount(0,$t->getCompanies());
        $this->assertNotContains($compagny,$t->getCompanies());
    }


}
