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
}
