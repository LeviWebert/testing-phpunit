<?php

namespace App\Tests\Unit\Services;

use App\Services\TextService;
use PHPUnit\Framework\TestCase;
use stdClass;

class TextServiceTest extends TestCase
{

    public function testToUpperCase(): void
    {
        $str = "test";
        $service = new TextService();
        $this->assertEquals("TEST",$service->toUpperCase($str));
    }

    public function testToUpperCaseWithWrongType(): void
    {
        $strValues = [1234,[],new stdClass(),null];
        $service = new TextService();
        foreach($strValues as $value){
            $this->expectException(\TypeError::class);
            $result = $service->toUpperCase($value);
        }
    }

    public function testToCapitalizeFirst(): void
    {
        $str = "test";
        $service = new TextService();
        $this->assertEquals("Test",$service->capitalizeFirst($str));
    }

    public function testCapitalizeFirstWithWrongType(): void
    {
        $strValues = [1234,[],new stdClass(),null];
        $service = new TextService();
        foreach($strValues as $value){
            $this->expectException(\TypeError::class);
            $result = $service->capitalizeFirst($value);
        }
    }

    public function testMinimizeFirst(): void
    {
        $str = "TEST";
        $service = new TextService();
        $this->assertEquals("tEST",$service->minimizeFirst($str));
    }

    public function testMinimizeFirstWithWrongType(): void
    {
        $strValues = [1234,[],new stdClass(),null];
        $service = new TextService();
        foreach($strValues as $value){
            $this->expectException(\TypeError::class);
            $result = $service->minimizeFirst($value);
        }
    }


}
