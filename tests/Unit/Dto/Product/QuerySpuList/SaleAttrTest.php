<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Dto\Product\QuerySpuList;

use Muscobytes\Poizon\tests\BaseTest;
use Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList\SaleAttr;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(SaleAttr::class)]
class SaleAttrTest extends BaseTest
{
    public function testConstructorAssignsValues(): void
    {
        $saleAttr = new SaleAttr(
            level: '1',
            cnName: '颜色',
            enName: 'Color',
            cnValue: '红色',
            enValue: 'Red'
        );

        $this->assertSame('1', $saleAttr->level);
        $this->assertSame('颜色', $saleAttr->cnName);
        $this->assertSame('Color', $saleAttr->enName);
        $this->assertSame('红色', $saleAttr->cnValue);
        $this->assertSame('Red', $saleAttr->enValue);
    }

    public function testToArray(): void
    {
        $saleAttr = new SaleAttr(
            level: '2',
            cnName: '尺寸',
            enName: 'Size',
            cnValue: '42',
            enValue: '42'
        );

        $expectedArray = [
            'level'   => '2',
            'cnName'  => '尺寸',
            'enName'  => 'Size',
            'cnValue' => '42',
            'enValue' => '42',
        ];

        $this->assertSame($expectedArray, $saleAttr->toArray());
    }

    public function testFromArray(): void
    {
        $data = [
            'level'   => '3',
            'cnName'  => '类别',
            'enName'  => 'Category',
            'cnValue' => '运动鞋',
            'enValue' => 'Sneakers',
        ];

        $saleAttr = SaleAttr::fromArray($data);

        $this->assertInstanceOf(SaleAttr::class, $saleAttr);
        $this->assertSame('3', $saleAttr->level);
        $this->assertSame('类别', $saleAttr->cnName);
        $this->assertSame('Category', $saleAttr->enName);
        $this->assertSame('运动鞋', $saleAttr->cnValue);
        $this->assertSame('Sneakers', $saleAttr->enValue);
    }
}
