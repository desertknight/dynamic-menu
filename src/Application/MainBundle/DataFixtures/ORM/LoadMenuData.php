<?php

namespace Application\MainBundle\DataFixtures\ORM;

use Application\MainBundle\Entity\Menu;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class LoadMenuData implements FixtureInterface, ContainerAwareInterface
{

    /**
     *
     * @var ContainerInterface
     */
    private $container;

    public function load(ObjectManager $manager)
    {
        $parent = null;
        $objects = array();

        for ($i = 1; $i <= 50; $i++)
        {
            $objects[] = $menu = new Menu();

            $menu->setParent($parent);
            $menu->setTitle($this->getFaker()->word(5));
            $menu->setColor(array_rand(\Application\MainBundle\Form\Type\ColorType::$choices, 1));

            $parent = (rand(1, 2) === 2) ? null : $menu;
        }

        foreach ($objects AS $object)
        {
            $manager->persist($object);
            $manager->flush();
        }
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * 
     * @return \Faker\Factory
     */
    public function getFaker()
    {
        return $this->container->get('faker.generator');
    }

}
