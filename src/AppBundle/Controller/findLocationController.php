<?php
/**
 * Created by PhpStorm.
 * User: karlprice
 * Date: 10/10/2017
 * Time: 15:31
 */

namespace AppBundle\Controller;


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

    public function indexAction(Request $request)
    {


        $result = $this->container
            ->get('bazinga_geocoder.provider.acme')
            ->geocodeQuery(GeocodeQuery::create($request->server->get('REMOTE_ADDR')));


        dump($result);
            exit;

        // return new Response($result);
      //  return new Response(json_encode($result));
       // return new Response("result");

   //     return new Response::json($result);

//        return  Response()->json($result);



    }

}