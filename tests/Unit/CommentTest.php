<?php

namespace App\Tests\Unit;

use App\Entity\Comment;
use DateTime;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    /**
     * Test de l'entité Comment doit retourner qu'il fait partie de la classe Comment
     *
     * @return void
     */
    public function testIsInstanceOf(): void
    {
        $entity = new Comment();
        $date = new DateTime("now");
        $value = "name";

        $resContent = $entity->setContent($value);
        $restCreation = $entity->setCreatedAt($date);
        $restUpdate = $entity->setUpdatedAt($date);

        self::assertInstanceOf(Comment::class, $resContent);
        self::assertInstanceOf(Comment::class, $restCreation);
        self::assertInstanceOf(Comment::class, $restUpdate);
    }

    /**
     * Test de l'entité Category, doit retourner true
     *
     * @return void
     */
    public function testIsTrue(): void
    {
        $entity = new Comment();
        $now = new DateTime("now");

        $entity->setContent('content');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertTrue($entity->getContent() === 'content');
        $this->assertTrue($entity->getCreatedAt() === $now);
        $this->assertTrue($entity->getUpdatedAt() === $now);
    }

    /**
     * Test de l'entité Category, doit retourner false
     *
     * @return void
     */
    public function testIsFalse(): void
    {

        $entity = new Comment();
        $now = new DateTime("now");
        $tomorrow = new DateTime("tomorrow");

        $entity->setContent('content');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);


        $this->assertFalse($entity->getContent() === 'wrongContent');
        $this->assertFalse($entity->getCreatedAt() === $tomorrow);
        $this->assertFalse($entity->getUpdatedAt() === $tomorrow);
    }

    /**
     * Test de l'entité Category, doit retourner vide
     *
     * @return void
     */
    public function testIsEmpty(): void
    {
        $entity = new Comment();
        $now = new DateTime("now");

        $entity->setContent('content');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertEmpty($entity->getContent() === '');
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
        $entity = new Comment();
        $now = new DateTime("now");
        $entity->setContent('content');
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertContainsOnly('string', [$entity->getContent()]);
    }


    /**
     * Test de l'entité Category, doit retourner le type datetime
     *
     * @return void
     */
    public function testIsDateTime(): void
    {
        $now = new DateTime("now");
        $entity = new Comment();
        $entity->setCreatedAt($now);
        $entity->setUpdatedAt($now);

        $this->assertContainsOnly('DateTime', [$entity->getCreatedAt(), $entity->getUpdatedAt()]);
    }
}
