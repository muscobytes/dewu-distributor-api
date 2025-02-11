<?php

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Endpoints\Distribute\Product\QuerySpuList;

use Muscobytes\Poizon\DistributionApiClient\Enums\SeasonEnum;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Endpoints\Distribute\Product\QuerySpuList\QuerySpuListParameters;
use Muscobytes\Poizon\tests\BaseTest;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(QuerySpuListParameters::class)]
class QuerySpuListParametersTest extends BaseTest
{
    public function testCreateQuerySpuListParametersEmpty(): void
    {
        $querySpuListParameters = new QuerySpuListParameters();
        $this->assertInstanceOf(QuerySpuListParameters::class, $querySpuListParameters);
        $this->assertNull($querySpuListParameters->startId);
        $this->assertNull($querySpuListParameters->pageSize);
        $this->assertNull($querySpuListParameters->dwSpuId);
        $this->assertNull($querySpuListParameters->distSpuId);
        $this->assertNull($querySpuListParameters->dwSpuTitle);
        $this->assertNull($querySpuListParameters->distSpuTitle);
        $this->assertNull($querySpuListParameters->dwDesignerId);
        $this->assertNull($querySpuListParameters->distBrandName);
        $this->assertNull($querySpuListParameters->distCategory1Name);
        $this->assertNull($querySpuListParameters->distCategory2Name);
        $this->assertNull($querySpuListParameters->distCategory3Name);
        $this->assertNull($querySpuListParameters->distFitPeopleName);
        $this->assertNull($querySpuListParameters->season);
        $this->assertNull($querySpuListParameters->distStatus);
        $this->assertNull($querySpuListParameters->modifyStartTime);
        $this->assertNull($querySpuListParameters->modifyEndTime);
        $this->assertNull($querySpuListParameters->querySku);
    }


    public function testCreateQuerySpuListParametersStartId(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            startId: 42
        );
        $this->assertIsInt($querySpuListParameters->startId);
        $this->assertEquals(42, $querySpuListParameters->startId);
    }


    public function testCreateQuerySpuListParametersPageSize(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            pageSize: 23
        );
        $this->assertIsInt($querySpuListParameters->pageSize);
        $this->assertEquals(23, $querySpuListParameters->pageSize);
    }


    public function testCreateQuerySpuListParametersPwSpuId(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            dwSpuId: [ 73, 3, 14, 1, 618 ]
        );
        $this->assertIsArray($querySpuListParameters->dwSpuId);
        $this->assertEquals([ 73, 3, 14, 1, 618 ], $querySpuListParameters->dwSpuId);
    }


    public function testCreateQuerySpuListParametersDistSpuId(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distSpuId: [ 2, 71, 10, 120 ]
        );
        $this->assertIsArray($querySpuListParameters->distSpuId);
        $this->assertEquals([ 2, 71, 10, 120 ], $querySpuListParameters->distSpuId);
    }


    public function testCreateQuerySpuListParametersDwSpuTitle(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            dwSpuTitle: 'Only a Sith deals in absolutes'
        );
        $this->assertIsString($querySpuListParameters->dwSpuTitle);
        $this->assertEquals('Only a Sith deals in absolutes', $querySpuListParameters->dwSpuTitle);
    }


    public function testCreateQuerySpuListParametersDistSpuTitle(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distSpuTitle: 'So Uncivilized.'
        );
        $this->assertIsString($querySpuListParameters->distSpuTitle);
        $this->assertEquals('So Uncivilized.', $querySpuListParameters->distSpuTitle);
    }


    public function testCreateQuerySpuListParametersDwDesignerId(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            dwDesignerId: [
                'Have You Ever Been Afraid of the Dark?',
                'Hello There!',
                'I Have the High Ground!'
            ]
        );
        $this->assertIsArray($querySpuListParameters->dwDesignerId);
        $this->assertEquals([
            'Have You Ever Been Afraid of the Dark?',
            'Hello There!',
            'I Have the High Ground!'
        ], $querySpuListParameters->dwDesignerId);
    }


    public function testCreateQuerySpuListParametersDistBrandName(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distBrandName: [
                'Great Scott!',
                'Jesus, George, it was a wonder I was even born.',
                '1.21 gigawatts! 1.21 gigawatts. Great Scott!'
            ]
        );
        $this->assertIsArray($querySpuListParameters->distBrandName);
        $this->assertEquals([
            'Great Scott!',
            'Jesus, George, it was a wonder I was even born.',
            '1.21 gigawatts! 1.21 gigawatts. Great Scott!'
        ], $querySpuListParameters->distBrandName);
    }


    public function testCreateQuerySpuListParametersDistCategory1Name(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distCategory1Name: [
                'May the Force be with you.',
                'Do. Or do not. There is no try.',
                'It’s a trap!'
            ]
        );
        $this->assertIsArray($querySpuListParameters->distCategory1Name);
        $this->assertEquals([
            'May the Force be with you.',
            'Do. Or do not. There is no try.',
            'It’s a trap!'
        ], $querySpuListParameters->distCategory1Name);
    }


    public function testCreateQuerySpuListParametersDistCategory2Name(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distCategory2Name: [
                'I’m one with the Force. The Force is with me.',
                'Rebellions are built on hope.',
                'I find your lack of faith disturbing.'
            ]
        );
        $this->assertIsArray($querySpuListParameters->distCategory2Name);
        $this->assertEquals([
            'I’m one with the Force. The Force is with me.',
            'Rebellions are built on hope.',
            'I find your lack of faith disturbing.'
        ], $querySpuListParameters->distCategory2Name);
    }


    public function testCreateQuerySpuListParametersDistCategory3Name(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distCategory3Name: [
                'These aren’t the droids you’re looking for.',
                'Help me, Obi-Wan Kenobi. You’re my only hope.'
            ]
        );
        $this->assertIsArray($querySpuListParameters->distCategory3Name);
        $this->assertEquals([
            'These aren’t the droids you’re looking for.',
            'Help me, Obi-Wan Kenobi. You’re my only hope.'
        ], $querySpuListParameters->distCategory3Name);
    }


    public function testCreateQuerySpuListParametersDistFitPeopleName(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distFitPeopleName: [
                'Wars not make one great.',
                'Never tell me the odds!',
                'That’s no moon.',
                'Chewie, we’re home.'
            ]
        );
        $this->assertIsArray($querySpuListParameters->distFitPeopleName);
        $this->assertEquals([
            'Wars not make one great.',
            'Never tell me the odds!',
            'That’s no moon.',
            'Chewie, we’re home.'
        ], $querySpuListParameters->distFitPeopleName);
    }


    public function testCreateQuerySpuListParametersSeason(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            season: SeasonEnum::WINTER
        );
        $this->assertInstanceOf(SeasonEnum::class, $querySpuListParameters->season);
        $this->assertEquals(SeasonEnum::WINTER, $querySpuListParameters->season);
    }


    public function testCreateQuerySpuListParametersDistStatus(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            distStatus: StatusEnum::PUBLISHED
        );
        $this->assertInstanceOf(StatusEnum::class, $querySpuListParameters->distStatus);
        $this->assertEquals(StatusEnum::PUBLISHED, $querySpuListParameters->distStatus);
    }


    public function testCreateQuerySpuListParametersModifyStartTime(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            modifyStartTime: 1732232183000
        );
        $this->assertIsInt(1732232183000, $querySpuListParameters->modifyStartTime);
        $this->assertEquals(1732232183000, $querySpuListParameters->modifyStartTime);
    }


    public function testCreateQuerySpuListParametersModifyEndTime(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            modifyEndTime: 1737588782000
        );
        $this->assertIsInt(1737588782000, $querySpuListParameters->modifyEndTime);
        $this->assertEquals(1737588782000, $querySpuListParameters->modifyEndTime);
    }


    public function testCreateQuerySpuListParametersQuerySku(): void
    {
        $querySpuListParameters = new QuerySpuListParameters(
            querySku: false
        );
        $this->assertIsBool($querySpuListParameters->querySku);
        $this->assertFalse($querySpuListParameters->querySku);
    }
}
