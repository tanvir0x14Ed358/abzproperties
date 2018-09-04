<?php

// src/Controller/HomeController.php

namespace App\Controller;

use App\Entity\HomeImages;
use App\Entity\PropertyDetails;
use App\Entity\PropertyImages;
use App\Form\PropertyDetailsType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/project/edit/{id}", name="edit-project")
     */
    public function editProject(Request $request, $id) {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(PropertyDetails::class)->find($id);        
        $form = $this->createForm(PropertyDetailsType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded image file
            /** @var UploadedFile $file */
            $file = $form->get('thumb')->getData();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                    $this->getParameter('images_directory'), $fileName
            );

            $project->setThumb($fileName);

            $entityManager->flush();

            return $this->redirectToRoute('admin-home');
        }

        return $this->render('realestast/edit-project.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/project/delete/{id}", name="delete-project")
     */
    public function deleteProject($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $project = $entityManager->getRepository(PropertyDetails::class)->find($id);

        if (!$project) {
            throw $this->createNotFoundException(
                    'No project found for id ' . $id
            );
        }
        
        $entityManager->remove($project);
        $entityManager->flush();

        return $this->redirectToRoute('admin-home');
    }

    /**
     * @Route("/image/delete/{id}", name="delete-image")
     */
    public function deleteImage($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $image = $entityManager->getRepository(PropertyImages::class)->find($id);

        if (!$image) {
            throw $this->createNotFoundException(
                    'No image found for id ' . $id
            );
        }

        $entityManager->remove($image);
        $entityManager->flush();

        return $this->redirectToRoute('create-images');
    }

    /**
     * @Route("/slide/delete/{id}", name="delete-slide")
     */
    public function deleteSlide($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $image = $entityManager->getRepository(HomeImages::class)->find($id);

        if (!$image) {
            throw $this->createNotFoundException(
                    'No image found for id ' . $id
            );
        }
        
        $entityManager->remove($image);
        $entityManager->flush();

        return $this->redirectToRoute('create-slides');
    }

    /**
     * @Route("/create-slides", name="create-slides")
     */
    public function createSlides(Request $request) {
        // creates a task and gives it some dummy data for this example
        $slides = new HomeImages;

        $form = $this->createFormBuilder($slides)
                ->add('property', EntityType::class, array(
                    'class' => PropertyDetails::class,
                    'choice_label' => 'title',
                    'choice_value' => 'id',
                    'attr' => array('class' => 'form-control')
                ))
                ->add('image', FileType::class, array('label' => 'Home Page Slides', 'attr' => array('class' => 'form-control')))
                ->add('save', SubmitType::class, array('label' => 'Save Slide', 'attr' => array('style' => 'margin-top:10px;', 'class' => 'btn btn-primary min-wide')))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $slides = $form->getData();
            // $file stores the uploaded image file
            /** @var UploadedFile $file */
            $file = $form->get('image')->getData();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                    $this->getParameter('slides_directory'), $fileName
            );


            $slides->setImage($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($slides);
            $entityManager->flush();

            return $this->redirectToRoute('create-slides');
        }

        $repository = $this->getDoctrine()->getRepository(HomeImages::class);
        $projectSlides = $repository->findAll();

        return $this->render('realestast/create-slides.html.twig', array(
                    'form' => $form->createView(), 'projectSlides' => $projectSlides,
        ));
    }

    /**
     * @Route("/create-images", name="create-images")
     */
    public function createImages(Request $request) {
        // creates a task and gives it some dummy data for this example
        $images = new PropertyImages;

        $form = $this->createFormBuilder($images)
                ->add('property', EntityType::class, array(
                    'class' => PropertyDetails::class,
                    'choice_label' => 'title',
                    'choice_value' => 'id',
                    'attr' => array('class' => 'form-control')
                ))
                ->add('image', FileType::class, array('label' => 'Property Image', 'attr' => array('class' => 'form-control')))
                ->add('save', SubmitType::class, array('label' => 'Save Image', 'attr' => array('style' => 'margin-top:10px;', 'class' => 'btn btn-primary min-wide')))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->getData();
            // $file stores the uploaded image file
            /** @var UploadedFile $file */
            $file = $form->get('image')->getData();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                    $this->getParameter('images_directory'), $fileName
            );


            $images->setImage($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($images);
            $entityManager->flush();

            return $this->redirectToRoute('create-images');
        }

        $repository = $this->getDoctrine()->getRepository(PropertyImages::class);
        $projectImages = $repository->findAll();

        return $this->render('realestast/create-images.html.twig', array(
                    'form' => $form->createView(), 'projectImages' => $projectImages,
        ));
    }

    /**
     * @Route("/create-project", name="create-project")
     */
    public function createProject(Request $request) {
        // creates a task and gives it some dummy data for this example
        $property = new PropertyDetails;
        $form = $this->createForm(PropertyDetailsType::class, $property);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            // $file stores the uploaded image file
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */            
            $file = $form->get('thumb')->getData();

            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                    $this->getParameter('images_directory'), $fileName
            );

            $property->setThumb($fileName);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($property);
            $entityManager->flush();

            return $this->redirectToRoute('admin-home');
        }

        return $this->render('realestast/create-project.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName() {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

    /**
     * @Route("/home", name="home_page")
     */
    public function index() {
        
        $repository = $this->getDoctrine()->getRepository(HomeImages::class);
        $home_projects = $repository->findAll();
        
        $repository = $this->getDoctrine()->getRepository(PropertyDetails::class);
        $featured_projects = $repository->findBy(
            ['featured' => true]
        );
        

        return $this->render('realestast/index.html.twig', array(
                    'home_projects' => $home_projects,
                    'featured_projects' => $featured_projects,
        ));
    }

    /**
     * @Route("/projects/{type}", name="property_projects")
     */
    public function projects($type) {
        $repository = $this->getDoctrine()->getRepository(PropertyDetails::class);
        $properties = $repository->findBy(
            ['category' => strtolower($type)]
        );
        
        $category = $type;

        return $this->render('realestast/category.html.twig', array(
                    'properties' => $properties, 'category' => $type
        ));
    }

    /**
     * @Route("/admin-home", name="admin-home")
     */
    public function admin() {
        $repository = $this->getDoctrine()->getRepository(PropertyDetails::class);
        $properties = $repository->findAll();
        
        return $this->render('realestast/admin-home.html.twig', array(
                    'properties' => $properties
        ));
    }

    /**
     * @Route("/details/{id}", name="property_details")
     */
    public function details($id) {
        
        $repository = $this->getDoctrine()->getRepository(PropertyDetails::class);
        $property = $repository->find($id);
        
        //$property_images = $property->getPropertyImages();

        return $this->render('realestast/property-detail.html.twig', array('property' => $property));
    }

    /**
     * @Route("/landowners", name="landowners")
     */
    public function landowners() {
        $number = random_int(0, 100);


        return $this->render('realestast/landowners.html.twig', array(
                    'number' => $number,
        ));
    }

    /**
     * @Route("/contact-us", name="contact-us")
     */
    public function contact() {
        $number = random_int(0, 100);

        return $this->render('realestast/contact.html.twig', array(
                    'number' => $number,
        ));
    }

}
