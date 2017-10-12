<?php
/**
 * Created by PhpStorm.
 * User: karlprice
 * Date: 10/10/2017
 * Time: 15:31
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Geocoder\Query\GeocodeQuery;


class findLocationController extends Controller
{
    /**
     * @Route("/findlocation/{country}/notes")
     */

    public function indexAction($country, Request $request)
    {
        $result = $this->container
            ->get('bazinga_geocoder.provider.acme')
            ->geocodeQuery(GeocodeQuery::create($request->server->get('REMOTE_ADDR')));


//        dump($result);
//            exit;

        return $this->render('country/show.html.twig', [
            'name' => $country
        ]);

//         return new Response('Your country is: ' .$country);


        // return new Response($result);
      //  return new Response(json_encode($result));
       // return new Response("result");

   //     return new Response::json($result);

//        return  Response()->json($result);



    }

    /**
     * @Route("/country/{country}/notes", name="country_show_notes")
     * @Method("GET")
     */

    public function getNotesAction()
    {
        $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
        ];

        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);

    }




}