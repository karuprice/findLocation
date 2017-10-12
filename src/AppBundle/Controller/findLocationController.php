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
     * @Route("/findlocation")
     */

    public function homeAction()
    {
        return new Response("Let's find out where you are!");
    }



    /**
     * @Route("/geocoder/{country}")
     */

    public function indexAction($country, Request $request)
    {
        $result = $this->container
            ->get('bazinga_geocoder.provider.acme')
            ->geocodeQuery(GeocodeQuery::create($request->server->get('REMOTE_ADDR')));


        dump($result);
            exit;

//        return $this->render('country/show.html.twig', [
//            'name' => $country
//        ]);

         return new Response('Your country is the UK');






        // return new Response($result);
      //  return new Response(json_encode($result));
       // return new Response("result");

   //     return new Response::json($result);

//        return  Response()->json($result);



    }

    /**
     * @Route("/api")
     * @Method("GET")
     */

    public function getNotesAction()
    {
        $notes = [
            ['id' => 1, 'name' => 'Afghanistan', 'flag' => 'https://restcountries.eu/data/afg.svg'],
            ['id' => 2, 'name' => 'United Kingdom of Great Britain and Northern Ireland', 'flag' => 'https://restcountries.eu/data/gbr.svg'],
            ['id' => 3, 'name' => 'Japan', 'flag' => 'https://restcountries.eu/data/jpn.svg'],
            ['id' => 4, 'name' => 'Italy', 'flag' => 'https://restcountries.eu/data/ita.svg'],
        ];




        $data = [
            'notes' => $notes
        ];

        return new JsonResponse($data);

    }




}