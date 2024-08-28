<?php

use PHPUnit\Framework\TestCase;
use App\Category;

class CategoryTest extends TestCase
{
    public function testCreateCategory(): void
    {
        $category = new Category(4, 'test category', 'test description', new \DateTime(), new \DateTime());
        $category->create();
        $all = $category->findAll();
        $lastCategory = end($all);
        $result = $category->findOneById($lastCategory->getId());

        $this->assertEquals('test category', $result->getName());
        $this->assertEquals('test description', $result->getDescription());
    }

    public function testUpdateCategory(): void
    {
        $category = new Category();
        $all = $category->findAll();
        $lastCategory = end($all);
        $result = $category->findOneById($lastCategory->getId());
        $retrievedCategory = $result;

        $retrievedCategory->setName('test category update');
        $retrievedCategory->setDescription('test description update');
        $retrievedCategory->update();

        $result = $category->findOneById($lastCategory->getId());

        $this->assertEquals('test category update', $result->getName());
        $this->assertEquals('test description update', $result->getDescription());
    }

    public function TestGetProducts(): void
    {
        
    }
}