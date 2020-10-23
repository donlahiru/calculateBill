<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\BillService;

class BillTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Bill');
    }
    
    public function testTotalBillAmountWhenUnitsLessThan80()
    {
        $billService = new BillService();
        $this->assertEquals(175, $billService->calculateFinalAmount(70));
    }

    public function testTotalBillAmountWhenUnitsLessThan280()
    {
        $billService = new BillService();
        $this->assertEquals(1340, $billService->calculateFinalAmount(270));
    }

    public function testTotalBillAmountWhenUnitsLessThan480()
    {
        $billService = new BillService();
        $this->assertEquals(2768, $billService->calculateFinalAmount(470));
    }

    public function testTotalBillAmountWhenUnitsAbove480()
    {
        $billService = new BillService();
        $this->assertEquals(3010, $billService->calculateFinalAmount(500));
    }

    public function testNoOfUnitsRequired()
    {
        $billService = new BillService();
        $validator  = $billService->validator(['numberOfUnits' => '']);
        $this->assertTrue($validator->fails());
    }

    public function testNoOfUnitsNumeric()
    {
        $billService = new BillService();
        $validator  = $billService->validator(['numberOfUnits' => 'test']);
        $this->assertTrue($validator->fails());
    }

    public function testNoOfUnitsGreaterThanZero()
    {
        $billService = new BillService();
        $validator  = $billService->validator(['numberOfUnits' => 0]);
        $this->assertTrue($validator->fails());
    }

}
