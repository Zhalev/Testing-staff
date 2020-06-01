<?php

namespace AppBundle\Command;

use AppBundle\Entity\Tests;
use AppBundle\Entity\TestsQuestions;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CsvImportCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('csv:import')
            ->setDescription('Import Data from CSV file');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $io = new SymfonyStyle($input,$output);
        $io->title('Attempting to import to feed...');
        $reader = Reader::createFromPath('%kernel.root_dir%/../src/AppBundle/Data/test_id_5.csv');
        $tests_import = $reader->fetchOne(1);
        $tests_questions = $reader->setOffset(3)->fetchAll();

//print_r($tests_questions);
        $new_test = new Tests();

        $new_test->setNnumb($tests_import[0]);
        $new_test->setCtestname($tests_import[1]);
        $new_test->setNtesttype($tests_import[2]);
        $new_test->setNstaffkey($tests_import[3]);
        $new_test->setNdolzhnoctbkey($tests_import[4]);
        $new_test->setNmax1($tests_import[5]);
        $new_test->setNmin1($tests_import[6]);
        $new_test->setNmax2($tests_import[7]);
        $new_test->setNmin2($tests_import[8]);
        $new_test->setNmax3($tests_import[9]);
        $new_test->setNmin3($tests_import[10]);
        $new_test->setNmax4($tests_import[11]);
        $new_test->setNmin4($tests_import[12]);
        $new_test->setNmax5($tests_import[13]);
        $new_test->setNmin5($tests_import[14]);
        $new_test->setCvalue1($tests_import[15]);
        $new_test->setCvalue2($tests_import[16]);
        $new_test->setCvalue3($tests_import[17]);
        $new_test->setCvalue4($tests_import[18]);
        $new_test->setCvalue5($tests_import[19]);
        $new_test->setNrandom($tests_import[20]);
        $new_test->setCmessage($tests_import[21]);
        $new_test->setNcountion($tests_import[22]);
        $new_test->setBporadok($tests_import[23]);
        $new_test->setNporadokvoprosov($tests_import[24]);
        $new_test->setNshowtime($tests_import[25]);
        $new_test->setNlimittime($tests_import[26]);

        $this->em->persist($new_test);

        foreach ($tests_questions as $row){
            print_r($row);
            //print_r($row['ntestnumber']);
            $question= new TestsQuestions();

            $question->setNtestnumber($row[0]); //'ntestnumber'  надо вычислить его для нового
            $question->setCquestion($row[1]);//'cquestion'
            $question->setNanswernum($row[2]);//'nanswernum'
            $question->setNuse($row[3]);//'nuse'
            $question->setNrandom($row[4]);//'nrandom'
            $question->setNscale($row[5]);//'nscale'
            $question->setCpathpicture($row[6]);//'cpathpicture'
            $question->setCmessage($row[7]);//'cmessage'
            $question->setNperec($row[8]);//'nperec'
            $question->setBdostup($row[9]);//'ntestnumber'
            $question->setCperecnumber($row[10]);//'cperecnumber'
            $question->setCanswer1($row[11]);//'canswer1'
            $question->setCanswer2($row[12]);//'canswer2'
            $question->setCanswer3($row[13]);//
            $question->setCanswer4($row[14]);//'canswer4'
            $question->setCanswer5($row[15]);//'canswer5'
            $question->setCanswer6($row[16]);//'canswer6'
            $question->setCanswer7($row[17]);//'canswer7'
            $question->setCanswer8($row[18]);//'canswer8'
            $question->setCanswer9($row[19]);//'canswer9'
            $question->setCanswer10($row[20]);//'canswer10'
            $question->setNw1($row[21]);//'nw1'
            $question->setNw2($row[22]);//'nw2'
            $question->setNw3($row[23]);//'nw3'
            $question->setNw4($row[24]);//'nw4'
            $question->setNw5($row[25]);//'nw5'
            $question->setNw6($row[26]);//'nw6'
            $question->setNw7($row[27]);//'nw7'
            $question->setNw8($row[28]);//'nw8'
            $question->setNw9($row[29]);//'nw9'
            $question->setNw10($row[30]);//'nw10'

            $this->em->persist($question);
        }


//        $this->em->flush();
        $io->success('Everything went well!');
    }
}
