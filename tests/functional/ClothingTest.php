<?php


use PHPUnit\Framework\TestCase;
use App\Clothing;

class ClothingTest extends TestCase
{

    public function testAddStock(): void
    {
        $clothing = new Clothing();
        $clothing->setQuantity(10);
        $clothing->addStock(5);
        $this->assertEquals(15, $clothing->getQuantity());
    }

    public function testRemoveStock(): void
    {
        $clothing = new Clothing();
        $clothing->setQuantity(10);
        $clothing->removeStock(5);
        $this->assertEquals(5, $clothing->getQuantity());
    }

    public function testCreateClothing(): void
    {
        $clothing = new Clothing(1, 'T-shirt test create', ['tshirt.jpg'], 100, 'A nice t-shirt test create', 10, 1, new \DateTime(), new \DateTime(), 'M', 'Red', 'Cotton', 5);
        $clothing->create();
        $all = $clothing->findAll();
        $lastClothing = end($all);
        $result = $clothing->findOneById($lastClothing->getId());


        $this->assertEquals('T-shirt test create', $result->getName());
        $this->assertEquals(['tshirt.jpg'], $result->getPhotos());
        $this->assertEquals(100, $result->getPrice());
        $this->assertEquals('A nice t-shirt test create', $result->getDescription());
        $this->assertEquals(10, $result->getQuantity());
        $this->assertEquals(1, $result->getCategoryId());
        $this->assertEquals('M', $result->getSize());
        $this->assertEquals('Red', $result->getColor());
        $this->assertEquals('Cotton', $result->getType());



    }

    public function testUpdatesClothing(): void
    {

        $clothing = new Clothing();
        $all = $clothing->findAll();
        $lastClothing = end($all);
        $result = $clothing->findOneById($lastClothing->getId());
        $retrievedClothing = $result;
    

        $retrievedClothing->setName('short');
        $retrievedClothing->setPhotos(['short.jpg']);
        $retrievedClothing->setPrice(50);
        $retrievedClothing->setDescription('A nice short');
        $retrievedClothing->setQuantity(20);
        $retrievedClothing->setCategoryId(1);
        $retrievedClothing->setSize('L');
        $retrievedClothing->setColor('Blue');
        $retrievedClothing->setType('Polyester');
        $retrievedClothing->setMaterialFee(5);
    

        $retrievedClothing->update();
    

        $updatedClothing = $retrievedClothing->findOneById($retrievedClothing->getId());
    

        $this->assertEquals('short', $updatedClothing->getName());
        $this->assertEquals(['short.jpg'], $updatedClothing->getPhotos());
        $this->assertEquals(50, $updatedClothing->getPrice());
        $this->assertEquals('A nice short', $updatedClothing->getDescription());
        $this->assertEquals(20, $updatedClothing->getQuantity());
        $this->assertEquals(1, $updatedClothing->getCategoryId());
        $this->assertEquals('L', $updatedClothing->getSize());
        $this->assertEquals('Blue', $updatedClothing->getColor());
        $this->assertEquals('Polyester', $updatedClothing->getType());
    }
    
    
    public function testFindOneById(): void
    {
        $clothing = new Clothing();
        $all = $clothing->findAll();
        $lastClothing = end($all);
        $result = $clothing->findOneById($lastClothing->getId());
    
        $this->assertEquals($lastClothing->getId(), $result->getId());
        $this->assertEquals($lastClothing->getName(), $result->getName());
        $this->assertEquals($lastClothing->getPhotos(), $result->getPhotos());
        $this->assertEquals($lastClothing->getPrice(), $result->getPrice());
        $this->assertEquals($lastClothing->getDescription(), $result->getDescription());
        $this->assertEquals($lastClothing->getQuantity(), $result->getQuantity());
        $this->assertEquals($lastClothing->getCategoryId(), $result->getCategoryId());
        $this->assertEquals($lastClothing->getSize(), $result->getSize());
        $this->assertEquals($lastClothing->getColor(), $result->getColor());
        $this->assertEquals($lastClothing->getType(), $result->getType());
        $this->assertEquals($lastClothing->getMaterialFee(), $result->getMaterialFee());
    }
    
    

}
