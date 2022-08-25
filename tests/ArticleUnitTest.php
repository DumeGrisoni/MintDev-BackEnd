<?php

namespace App\Tests;

use App\Entity\Article;
use DateTime;
use Doctrine\DBAL\Types\StringType;
use PHPUnit\Framework\TestCase;

class ArticleUnitTest extends TestCase
{

    /**
     * Test de l'entité Article, doit retourner vrai
     *
     * @return void
     */
    public function testIsTrue(): void
    {
        $now = new DateTime("now");

        $article = new Article();
        $article->setTitle('title');
        $article->setContent('content');
        $article->setCreatedAt($now);
        $article->setUpdatedAt($now);
        $article->setExcerpt('excerpt');
        $article->setImage('image');
        $article->setSlug('slug');

        $this->assertTrue($article->getTitle() === 'title');
        $this->assertTrue($article->getContent() === 'content');
        $this->assertTrue($article->getCreatedAt() === $now);
        $this->assertTrue($article->getUpdatedAt() === $now);
        $this->assertTrue($article->getExcerpt() === 'excerpt');
        $this->assertTrue($article->getImage() === 'image');
        $this->assertTrue($article->getSlug() === 'slug');
    }

    /**
     * Test de l'entité Article, doit retourner faux
     * @return void
     */
    public function testIsFalse() : void
    {
        $now = new DateTime("now");
        $tomorrow = new DateTime("tomorrow");

        $article = new Article();
        $article->setTitle('title');
        $article->setContent('content');
        $article->setCreatedAt($now);
        $article->setUpdatedAt($now);
        $article->setExcerpt('excerpt');
        $article->setImage('image');
        $article->setSlug('slug');

        $this->assertFalse($article->getTitle() === 'wrongTitle');
        $this->assertFalse($article->getContent() === 'wrongContent');
        $this->assertFalse($article->getCreatedAt() === $tomorrow);
        $this->assertFalse($article->getUpdatedAt() === $tomorrow);
        $this->assertFalse($article->getExcerpt() === 'wrongExcerpt');
        $this->assertFalse($article->getImage() === 'wrongImage');
        $this->assertFalse($article->getSlug() === 'wrongSlug');

    }


    /**
     * Test de l'entité Article, doit retourner vide
     *
     * @return void
     */
    public function testIsEmpty() : void
    {
        $now = new DateTime("now");

        $article = new Article();
        $article->setTitle('title');
        $article->setContent('content');
        $article->setCreatedAt($now);
        $article->setUpdatedAt($now);
        $article->setExcerpt('excerpt');
        $article->setImage('image');
        $article->setSlug('slug');

        $this->assertEmpty( $article->getTitle() === '');
        $this->assertEmpty( $article->getContent() === '');
        $this->assertEmpty( $article->getCreatedAt() === '');
        $this->assertEmpty( $article->getUpdatedAt() === '');
        $this->assertEmpty( $article->getExcerpt() === '');
        $this->assertEmpty( $article->getImage() === '');
        $this->assertEmpty( $article->getSlug() === '');
    }

    /**
     * Test de l'entité Article, doit retourné une string
     *
     * @return void
     */
    public function testIsString(): void
    {
        $article = new Article();
        $article->setTitle('title');
        $article->setContent('content');
        $article->setExcerpt('excerpt');
        $article->setImage('image');
        $article->setSlug('slug');

        $this->assertContainsOnly('string', [$article->getTitle(), $article->getContent(), $article->getExcerpt(), $article->getImage(), $article->getSlug()]);

    }

    /**
     * Test de l'entité Article, doit retourné un datetime
     *
     * @return void
     */
    public function testIsDateTime(): void
    {
        $now = new DateTime("now");
        $article = new Article();
        $article->setCreatedAt($now);
        $article->setUpdatedAt($now);

        $this->assertContainsOnly('DateTime', [$article->getCreatedAt(), $article->getUpdatedAt()]);
    }
}
