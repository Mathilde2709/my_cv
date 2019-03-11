<?php 

use App\Entity\Contact;
use App\Entity\Experience;
use App\Entity\Formation;
use App\Entity\Loisirs;

class ExampleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $entity = new Contact();
        $this->assertEmpty($entity->getId());
        
        $entity->setName('Mathilde');
        $entity->setTelephone('0648254136');
        $entity->setEmail('mathildemeunier@gmail.com');
        $entity->setAdresse('27 rue Perceval');
        $entity->setPortfolio('mathildemeunier.com');
        
        $this->assertEquals('Mathilde', $entity->getName());
        $this->assertEquals('0648254136', $entity->getTelephone());
        $this->assertEquals('mathildemeunier@gmail.com', $entity->getEmail());
        $this->assertEquals('27 rue Perceval', $entity->getAdresse());
        $this->assertEquals('mathildemeunier.com', $entity->getPortfolio());
        
        
        $entity = new Experience();
        $this->assertEmpty($entity->getId());
        
        $entity->setName('Employée polyvalente');
        $entity->setEntreprise('KFC');
        $entity->setDateDebut(\DateTime::createFromFormat('d/m/y', '01/06/16'));
        $entity->setDateFin(\DateTime::createFromFormat('d/m/y', '31/08/17'));
        $entity->setLieu('Montélimar');
        
        $this->assertEquals('Employée polyvalente', $entity->getName());
        $this->assertEquals('KFC', $entity->getEntreprise());
        $this->assertEquals((\DateTime::createFromFormat('d/m/y', '01/06/16')), $entity->getDateDebut());
        $this->assertEquals((\DateTime::createFromFormat('d/m/y', '31/08/17')), $entity->getDateFin());
        $this->assertEquals('Montélimar', $entity->getLieu());
        
        
        $entity = new Formation();
        $this->assertEmpty($entity->getId());
        
        $entity->setName('Licence lettres modernes');
        $entity->setDateDebut(\DateTime::createFromFormat('d/m/y', '01/09/14'));
        $entity->setDateFin(\DateTime::createFromFormat('d/m/y', '31/05/17'));
        $entity->setLieu('Univeristé Stendhal');
        
        $this->assertEquals('Licence lettres modernes', $entity->getName());
        $this->assertEquals((\DateTime::createFromFormat('d/m/y', '01/09/14')), $entity->getDateDebut());
        $this->assertEquals((\DateTime::createFromFormat('d/m/y', '31/05/17')), $entity->getDateFin());
        $this->assertEquals('Univeristé Stendhal', $entity->getLieu());
        
        
        $entity = new Loisirs();
        $this->assertEmpty($entity->getId());
        
        $entity->setName('Photographie');
        $entity->setSubject('Audiovisuel');
        $entity->setCompetences('creativite');
        
        $this->assertEquals('Photographie', $entity->getName());
        $this->assertEquals('Audiovisuel', $entity->getSubject());
        $this->assertEquals('creativite', $entity->getCompetences());
    }
}