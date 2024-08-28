<?php


use PHPUnit\Framework\TestCase;
use App\Electronic;

class ElectronicTest extends TestCase
{

    public function testAddStock(): void
    {
        $electronic = new Electronic();
        $electronic->setQuantity(10);
        $electronic->addStock(5);
        $this->assertEquals(15, $electronic->getQuantity());
    }

    public function testRemoveStock(): void
    {
        $electronic = new Electronic();
        $electronic->setQuantity(10);
        $electronic->removeStock(5);
        $this->assertEquals(5, $electronic->getQuantity());
    }

    public function testFindAllElectronic(): void
    {
        $electronic = new Electronic();
        $all = $electronic->findAll();

        $this->assertNotEmpty($all);
        $this->assertInstanceOf(Electronic::class, $all[0]);
    }

    public function testCreateElectronic(): void
    {
        $electronic = new Electronic(1, 'ordinateur', ['ordinateur.jpg'], 1500, 'super ordinateur gaming ', 10, 3, new \DateTime(), new \DateTime(), 'Assus', 5);
        $electronic->create();
        $all = $electronic->findAll();
        $lastElectronic = end($all);
        $result = $electronic->findOneById($lastElectronic->getId());

        $this->assertEquals('ordinateur', $result->getName());
        $this->assertEquals(['ordinateur.jpg'], $result->getPhotos());
        $this->assertEquals(1500, $result->getPrice());
        $this->assertEquals('super ordinateur gaming ', $result->getDescription());
        $this->assertEquals(10, $result->getQuantity());
        $this->assertEquals(3, $result->getCategoryId());
        $this->assertEquals('Assus', $result->getBrand());
        
    }

    public function testUpdatesElectronic(): void
    {

        $electronic = new Electronic();
        $all = $electronic->findAll();
        $lastElectronic = end($all);
        $result = $electronic->findOneById($lastElectronic->getId());
        $retrievedElectronic = $result;
    

        $retrievedElectronic->setName('pc');
        $retrievedElectronic->setPhotos(['pc.jpg']);
        $retrievedElectronic->setPrice(2000);
        $retrievedElectronic->setDescription('super pc gaming');
        $retrievedElectronic->setQuantity(20);
        $retrievedElectronic->setBrand('Dell');
        $retrievedElectronic->setWarantyFee(10);

        $retrievedElectronic->update();
        $updatedElecrpnic = $electronic->findOneById($retrievedElectronic->getId());

        $this->assertEquals('pc', $updatedElecrpnic->getName());
        $this->assertEquals(['pc.jpg'], $updatedElecrpnic->getPhotos());
        $this->assertEquals(2000, $updatedElecrpnic->getPrice());
        $this->assertEquals('super pc gaming', $updatedElecrpnic->getDescription());
        $this->assertEquals(20, $updatedElecrpnic->getQuantity());
        $this->assertEquals(3, $updatedElecrpnic->getCategoryId());
        $this->assertEquals('Dell', $updatedElecrpnic->getBrand());

    }

    public function testFindOneByIdElectronic(): void
    {
        $electronic = new Electronic();
        $all = $electronic->findAll();
        $lastElectronic = end($all);
        $result = $electronic->findOneById($lastElectronic->getId());

        $this->assertEquals($lastElectronic->getId(), $result->getId());
        $this->assertEquals($lastElectronic->getName(), $result->getName());
        $this->assertEquals($lastElectronic->getPhotos(), $result->getPhotos());
        $this->assertEquals($lastElectronic->getPrice(), $result->getPrice());
        $this->assertEquals($lastElectronic->getDescription(), $result->getDescription());
        $this->assertEquals($lastElectronic->getQuantity(), $result->getQuantity());
        $this->assertEquals($lastElectronic->getCategoryId(), $result->getCategoryId());
        $this->assertEquals($lastElectronic->getBrand(), $result->getBrand());

    }


}