<?php

namespace DesignPattern\Tests;

use DesignPattern\Other\Repository\MemoryStorage;
use DesignPattern\Other\Repository\Post;
use DesignPattern\Other\Repository\PostRepository;
use PHPUnit\Framework\TestCase;

/**
 * 测试资源库模式
 * Class DataMapperTest
 * @package Creational\Singleton\Tests
 */
class RepositoryTest extends TestCase
{
    /** @var PostRepository */
    protected $postRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepository = new PostRepository(new MemoryStorage());
    }

    public function getPost($i)
    {
        $post = new Post();
        $post->setTitle("博文" . $i);
        $post->setText("博文内容博文内容" . $i);
        $post->setAuthor("Sylvia");
        $post->setCreated(date('Y-m-d H:i:s'));
        return $post;
    }


    public function getNewPost()
    {
        return array(array(self::getPost(1), self::getPost(2)));
    }


    /**
     * @param Post $post
     *
     * @dataProvider getNewPost
     *
     */
    public function testSave(Post $post)
    {
        $result1 = $this->postRepository->save($post);
        $this->assertIsObject($result1);
        $result2 = $this->postRepository->getById($result1->getId());

        $this->assertEquals($result1,$result2);
    }


}