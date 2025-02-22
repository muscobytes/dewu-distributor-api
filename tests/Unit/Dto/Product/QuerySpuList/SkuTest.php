<?php

declare(strict_types=1);

namespace Muscobytes\Poizon\DistributionApiClient\Tests\Unit\Dto\Product\QuerySpuList;

use DateTimeImmutable;
use DateTimeInterface;
use Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList\Sku;
use Muscobytes\Poizon\DistributionApiClient\Enums\StatusEnum;
use Muscobytes\Poizon\DistributionApiClient\Tests\BaseTest;
use Muscobytes\Poizon\DistributionApiClient\Dto\Product\QuerySpuList\SaleAttr;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(Sku::class)]
class SkuTest extends BaseTest
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

        $createTime = new DateTimeImmutable('2016-04-12 01:32:17');
        $modifyTime = new DateTimeImmutable('2019-03-08 09:41:35');

        $sku = new Sku(
            id: 1001,
            createTime: $createTime,
            modifyTime: $modifyTime,
            distStatus: StatusEnum::PUBLISHED,
            dwSkuId: 50001,
            distSkuId: 'DIST-SKU-12345',
            image: 'https://example.com/image.jpg',
            barcode: '1234567890',
            minBidPrice: 1000,
            skuLink: 'https://example.com/sku/1001',
            saleAttr: [ $saleAttr ]
        );

        $this->assertSame(1001, $sku->id);
        $this->assertSame($createTime, $sku->createTime);
        $this->assertSame($modifyTime, $sku->modifyTime);
        $this->assertSame(StatusEnum::PUBLISHED, $sku->distStatus);
        $this->assertSame(50001, $sku->dwSkuId);
        $this->assertSame('DIST-SKU-12345', $sku->distSkuId);
        $this->assertSame('https://example.com/image.jpg', $sku->image);
        $this->assertSame('1234567890', $sku->barcode);
        $this->assertSame(1000, $sku->minBidPrice);
        $this->assertSame('https://example.com/sku/1001', $sku->skuLink);
        $this->assertCount(1, $sku->saleAttr);
        $this->assertInstanceOf(SaleAttr::class, $sku->saleAttr[0]);
    }

    public function test_to_array(): void
    {
        $saleAttr = new SaleAttr(
            level: '2',
            cnName: '尺寸',
            enName: 'Size',
            cnValue: '42',
            enValue: '42'
        );

        $createTime = new DateTimeImmutable('2015-10-29 23:41:02Z');
        $modifyTime = new DateTimeImmutable('2017-03-11 07:14:28Z');

        $sku = new Sku(
            id: 2002,
            createTime: $createTime,
            modifyTime: $modifyTime,
            distStatus: StatusEnum::REMOVED,
            dwSkuId: 60002,
            distSkuId: 'a1850c1d-c01a-4892-a39a-5a5f3b684bca',
            image: 'https://cdn.poizon.com/pro-img/origin-img/20220212/54e28b5c29b04d1f9ae9e2260a21eb19.jpg',
            barcode: '9876543210',
            minBidPrice: 2000,
            skuLink: 'https://qiwuprocurementservice.myshoplaza.com/products/81971?variant=948aab3d-5a93-4fc2-9dd9-1724ce1d5fcd',
            saleAttr: [ $saleAttr ]
        );

        $expectedArray = [
            'id' => 2002,
            'createTime' => $createTime->format(DateTimeInterface::RFC3339),
            'modifyTime' => $modifyTime->format(DateTimeInterface::RFC3339),
            'distStatus' => StatusEnum::REMOVED->value,
            'dwSkuId' => 60002,
            'distSkuId' => 'a1850c1d-c01a-4892-a39a-5a5f3b684bca',
            'image' => 'https://cdn.poizon.com/pro-img/origin-img/20220212/54e28b5c29b04d1f9ae9e2260a21eb19.jpg',
            'barcode' => '9876543210',
            'minBidPrice' => 2000,
            'skuLink' => 'https://qiwuprocurementservice.myshoplaza.com/products/81971?variant=948aab3d-5a93-4fc2-9dd9-1724ce1d5fcd',
            'saleAttr' => [ $saleAttr->toArray() ],
        ];

        $this->assertSame($expectedArray, $sku->toArray());
    }

    public function testFromArray(): void
    {
        $data = [
            'id' => 3003,
            'createTime' => 1700000002,
            'modifyTime' => 1700003000,
            'distStatus' => 'PRODUCT_ON',
            'dwSkuId' => 70003,
            'distSkuId' => 'DSKU-54321',
            'image' => 'https://example.com/image3.jpg',
            'barcode' => '5432109876',
            'minBidPrice' => 3000,
            'skuLink' => 'https://example.com/sku/3003',
            'saleAttr' => [
                [
                    'level' => '3',
                    'cnName' => '类别',
                    'enName' => 'Category',
                    'cnValue' => '运动鞋',
                    'enValue' => 'Sneakers',
                ]
            ],
        ];

        $sku = Sku::fromArray($data);

        $this->assertInstanceOf(Sku::class, $sku);
        $this->assertSame(3003, $sku->id);
        $this->assertSame('1700000002', $sku->createTime->format('Uv'));
        $this->assertSame('1700003000', $sku->modifyTime->format('Uv'));
        $this->assertSame(StatusEnum::PUBLISHED, $sku->distStatus);
        $this->assertSame(70003, $sku->dwSkuId);
        $this->assertSame('DSKU-54321', $sku->distSkuId);
        $this->assertSame('https://example.com/image3.jpg', $sku->image);
        $this->assertSame('5432109876', $sku->barcode);
        $this->assertSame(3000, $sku->minBidPrice);
        $this->assertSame('https://example.com/sku/3003', $sku->skuLink);
        $this->assertCount(1, $sku->saleAttr);
        $this->assertInstanceOf(SaleAttr::class, $sku->saleAttr[0]);
        $this->assertSame('3', $sku->saleAttr[0]->level);
        $this->assertSame('类别', $sku->saleAttr[0]->cnName);
        $this->assertSame('Category', $sku->saleAttr[0]->enName);
        $this->assertSame('运动鞋', $sku->saleAttr[0]->cnValue);
        $this->assertSame('Sneakers', $sku->saleAttr[0]->enValue);
    }
}
