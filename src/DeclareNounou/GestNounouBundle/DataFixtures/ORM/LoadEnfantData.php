<?php
namespace DeclareNounou\GestNounouBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DeclareNounou\GestNounouBundle\Entity\Enfant;

class LoadEnfantData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        //create test enfants
        $enfant1 = new Enfant();
        $enfant1->setNom('Daudet');
        $enfant1->setPrenom('Alphonse');
        $enfant1->setDateNaissance(new \DateTime('2012-01-01'));
        $enfant1->setUser($this->getReference('user1'));
        
        $enfant2 = new Enfant();
        $enfant2->setNom('Mickey');
        $enfant2->setPrenom('Mouse');
        $enfant2->setDateNaissance(new \DateTime('2011-02-02'));
        $enfant2->setUser($this->getReference('user2'));
        
        $enfant3 = new Enfant();
        $enfant3->setNom('Donald');
        $enfant3->setPrenom('Duck');
        $enfant3->setDateNaissance(new \DateTime('2013-03-03'));
        $enfant3->setUser($this->getReference('user2'));
        
        $manager->persist($enfant1);
        $manager->persist($enfant2);
        $manager->persist($enfant3);
        $manager->flush();
        
        $this->addReference('enfant1', $enfant1);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}
?>