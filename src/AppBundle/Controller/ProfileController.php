<?php

namespace AppBundle\Controller;

use AppBundle\Service\RatingPlayers;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    /**
     * @Route("/user/profile", name="profile")
     */
    public function profileAction(Request $request, RatingPlayers $rating_players)
    {
        $user = $this->getUser();

        $user_results = $rating_players->getListPlayerResults($user->getIdUser());
        return $this->render('security/profile.html.twig', array(
            'results' => $user_results
        ));
    }


}
