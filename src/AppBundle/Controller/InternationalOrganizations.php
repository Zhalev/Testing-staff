<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Courses;
use AppBundle\Entity\DictionaryStructure;
use AppBundle\Entity\Users;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class InternationalOrganizations extends Controller
{

    /**
     * @Route(path="/international_organizations", name = "international_organizations")
     */
    public function resultAction() {
        $records = [
            [
                'country' =>  ['name' => 'Турция'],
                'station' =>  ['name' => 'Аккую'],
                'startOfConstruction' => 2018,
                'yearOfStartOneBlock' => 2023,
                'yearOfStartTwoBlock' => 2024,
                'yearOfStartThreeBlock' => 2025,
                'yearOfStartFourBlock' => 2026,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
            [
                'country' =>  ['name' => 'Беларусь'],
                'station' =>  ['name' => 'Беларусская АЭС'],
                'startOfConstruction' => 2013,
                'yearOfStartOneBlock' => 2019,
                'yearOfStartTwoBlock' => 2020,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
            [
                'country' =>  ['name' => 'Иран'],
                'station' =>  ['name' => 'Бушер'],
                'startOfConstruction' => 2019,
                'yearOfStartOneBlock' => null,
                'yearOfStartTwoBlock' => null,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
                        [
                'country' =>  ['name' => 'Египет'],
                'station' =>  ['name' => 'Эль-Дабаа'],
                'startOfConstruction' => 2020,
                'yearOfStartOneBlock' => null,
                'yearOfStartTwoBlock' => 2026,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
                        [
                'country' =>  ['name' => 'Индия'],
                'station' =>  ['name' => 'Куданкулам'],
                'startOfConstruction' => 2017,
                'yearOfStartOneBlock' => null,
                'yearOfStartTwoBlock' => null,
                'yearOfStartThreeBlock' => 2020,
                'yearOfStartFourBlock' => 2021,
                'yearOfStartFiveBlock' => 2024,
                'yearOfStartSixBlock' => 2025,
            ],
                        [
                'country' =>  ['name' => 'Венгрия'],
                'station' =>  ['name' => 'Пакш-2'],
                'startOfConstruction' => 2019,
                'yearOfStartOneBlock' => null,
                'yearOfStartTwoBlock' => null,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
                        [
                'country' =>  ['name' => 'Бангладеш'],
                'station' =>  ['name' => 'Руппур'],
                'startOfConstruction' => 2017,
                'yearOfStartOneBlock' => 2023,
                'yearOfStartTwoBlock' => 2024,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
            [
                'country' =>  ['name' => 'Китай'],
                'station' =>  ['name' => 'Тяньвань-2'],
                'startOfConstruction' => 2012,
                'yearOfStartOneBlock' => null,
                'yearOfStartTwoBlock' => null,
                'yearOfStartThreeBlock' => 2018,
                'yearOfStartFourBlock' => 2019,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],
            [
                'country' =>  ['name' => 'Финляндия'],
                'station' =>  ['name' => 'Ханкикиви-1'],
                'startOfConstruction' => 2019,
                'yearOfStartOneBlock' => 2024,
                'yearOfStartTwoBlock' => null,
                'yearOfStartThreeBlock' => null,
                'yearOfStartFourBlock' => null,
                'yearOfStartFiveBlock' => null,
                'yearOfStartSixBlock' => null,
            ],                                    
        ];
        return $this->render(":international_organizations:index.html.twig", array('records' => $records));
    }

}