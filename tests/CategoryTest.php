<?php

namespace App\Tests;

use App\Entity\Category;
use DateTime;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{

    /**
     * Test de l'entité Category, doit retourner true
     *
     * @return void
     */
    public function testIsTrue(): void
    {
        $entity = new Category();
        $now = new DateTime("now");

        $entity->setName('name');
        $entity->setSlug('slug');
        $entity->setColor('color');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertTrue($entity->getName() === 'name');
        $this->assertTrue($entity->getColor() === 'color');
        $this->assertTrue($entity->getSlug() === 'slug');
        $this->assertTrue($entity->getCreatedAt() === $now);
        $this->assertTrue($entity->getUpdatedAt() === $now);

    }

    /**
     * Test de l'entité Category, doit retourner false
     *
     * @return void
     */
    public function testIsFalse() : void
    {

        $entity = new Category();
        $now = new DateTime("now");
        $tomorrow = new DateTime("tomorrow");

        $entity->setName('name');
        $entity->setSlug('slug');
        $entity->setColor('color');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);     
        
        
        $this->assertFalse($entity->getName() === 'wrongName');
        $this->assertFalse($entity->getSlug() === 'wrongSlug');
        $this->assertFalse($entity->getColor() === 'wrongcolor');
        $this->assertFalse($entity->getCreatedAt() === $tomorrow);
        $this->assertFalse($entity->getUpdatedAt() === $tomorrow);
    }

    /**
     * Test de l'entité Category, doit retourner vide
     *
     * @return void
     */
    public function testIsEmpty() : void
    {
        $entity = new Category();
        $now = new DateTime("now");

        $entity->setName('name');
        $entity->setSlug('slug');
        $entity->setColor('color');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);   

        $this->assertEmpty($entity->getName() === '');
        $this->assertEmpty($entity->getSlug() === '');
        $this->assertEmpty($entity->getColor() === '');
        $this->assertEmpty($entity->getCreatedAt() === '');
        $this->assertEmpty($entity->getUpdatedAt() === '');
    }


    /**
     * Test de l'entité Category, doit retourner le type string
     *
     * @return void
     */
    public function testIsString(): void
    {
        $entity = new Category();
        $entity->setName('name');
        $entity->setSlug('slug');
        $entity->setColor('color');

        $this->assertContainsOnly('string', [$entity->getName(), $entity->getColor(),$entity->getSlug()]);
    }


    /**
     * Test de l'entité Category, doit retourner le type datetime
     *
     * @return void
     */
    public function testIsDateTime(): void
    {
        $now = new DateTime("now");
        $entity = new Category();
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertContainsOnly('DateTime', [$entity->getCreatedAt(), $entity->getUpdatedAt()]);
    }
}
