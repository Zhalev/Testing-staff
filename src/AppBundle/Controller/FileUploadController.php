<?php

namespace AppBundle\Controller;

use AppBundle\Form\FileUploadFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FileUploadController extends Controller
{
    /**
     * @Route("/file/upload", name="file_upload")
     */
    public function indexAction(Request $Request)
    {
//        $sClass = get_class( new \AppBundle\Form\FileUploadFormType() );
//        $this->_oForm = $oForm = $this->createForm($sClass, null);

        $form = $this->createForm(FileUploadFormType::class);
        $form->handleRequest($Request);

        if ($Request->getMethod() == 'POST') {
            $form->handleRequest($Request);
            if ($form->isValid()) {
                $oFile = $form->getData();
                //Транслитируем имя сохраняемого файла
                $originalFilename = pathinfo($oFile->getClientOriginalName(),
                    PATHINFO_FILENAME);
                $transliterator = \Transliterator::create('Any-Latin');
                $transliteratorToASCII = \Transliterator::create('Latin-ASCII');
                $safeFilename = $transliteratorToASCII->transliterate(
                    $transliterator->transliterate($originalFilename));

                //Сделаем его уникальным
                $fileName = $safeFilename.'-'.uniqid().'.'.$oFile->guessExtension();
print_r($fileName);
                //и попытаемся переместить в нужный нам каталог
                try {
                    $sFolder = $this->getParameter('csv_directory');
                    $oFile->move($sFolder, $fileName);
                    $this->addFlash('Success', 'File was upload');
                } catch (FileException $e) {
                    //если что-то пошло не так, сообщим об этом
                    $this->addFlash('notice', 'Unable upload file, additional info: ' . $e->getMessage());
                }
            }
        }

        return $this->render('file_upload/index.html.twig', [
            'controller_name' => 'FileUploadController',
            'form' => $form->createView()
        ]);
    }

}

