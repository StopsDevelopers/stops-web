<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\State;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Braintree;

class BusinessController extends Controller
{
    /**
     * @Route("/api/getCategories", name="get_categories")
     */
    public function getCategories(){
        $categories = $this->getDoctrine()
            ->getRepository(Category::class)
            ->getCategories();

        return $this->json($categories);
    }
    /**
     * @Route("/api/getCountries", name="get_countries")
     */
    public function getAllCountries(){
        $countries = $this->getDoctrine()
            ->getRepository(Country::class)
            ->getCountries();

        return $this->json($countries);
    }

    /**
     * @Route("/api/getStates", name="get_states")
     */
    public function getStates(Request $request){
        if ($request->isMethod("POST")){
            $id = $request->request->get('country');

            $states = $this->getDoctrine()
                ->getRepository(State::class)
                ->getStatesByCountry($id);

            return $this->json($states);
        }
    }

    /**
     * @Route("/api/getCities", name="get_cities")
     */
    public function getCities(Request $request){
        if ($request->isMethod("POST")){
            $id = $request->request->get('state');

            $cities = $this->getDoctrine()
                ->getRepository(City::class)
                ->getCitiesByState($id);

            return $this->json($cities);
        }
    }

    /**
     * @Route("/api/getPaypalAccessToken", name="get_paypal_at")
     */
    public function getPaypalAccessToken(){
        $gateway = new \Braintree_Gateway(array(
            'accessToken' => 'access_token$sandbox$pkzrhbm32q89hh2w$084c0e011e0bcbb061398be9ffdffaa3'
        ));

        return $this->json($gateway->clientToken()->generate());
    }
}
