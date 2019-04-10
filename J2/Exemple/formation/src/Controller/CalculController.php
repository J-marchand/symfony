<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CalculController extends AbstractController{

    public function Formulaire(){

        return new Response('<form style="width: 50%; margin:15% Auto;" action="/resultCalcul" method="POST">
                                        <input style="width: 100%; margin: 10px; padding: 5px;" type="number" name="firstNumber" placeholder="Premier nombre">
                                        
                                        <select style="width: 100%; margin: 10px; padding: 5px; text-align: center;" name="symbole">                                        
                                            <option value="+">+</option>
                                            <option value="-">-</option>
                                            <option value="*">*</option>
                                            <option value="/">/</option>
                                        </select>
                                        <input style="width: 100%; margin: 10px; padding: 5px;" type="number" name="secondNumber" placeholder="Deuxieme nombre">
                                        
                                        <input style="width: 50%; margin: 10px; padding: 5px;" type="submit">
                                    </form>');


    }

    public function resultCalcul(){

        $firstNmb   = $_POST['firstNumber'];
        $secondNmb  = $_POST['secondNumber'];
        $operateur  = $_POST['symbole'];

        if($operateur == "+"){

            $result = ($firstNmb + $secondNmb);
            return new Response('<p style="width: 60%; margin: 0 auto; font-size: 4rem; text-transform: uppercase; text-align: center;">Votre resultat est</p><p style="width: 100%; text-align: center; font-size: 15rem;"> ' .$result. '</p><p style="width: 50%; margin: 0 auto; text-align: center; font-size: 3rem;"><a href="/calculForm">Revenir a la calculatrice</a></p>');

        } elseif($operateur == "-"){

            $result = ($firstNmb - $secondNmb);
            return new Response('<p style="width: 60%; margin: 0 auto; font-size: 4rem; text-transform: uppercase; text-align: center;">Votre resultat est</p><p style="width: 100%; text-align: center; font-size: 15rem;"> ' .$result. '</p><p style="width: 50%; margin: 0 auto; text-align: center; font-size: 3rem;"><a href="/calculForm">Revenir a la calculatrice</a></p>');


        } elseif($operateur == "*"){

            $result = ($firstNmb * $secondNmb);
            return new Response('<p style="width: 60%; margin: 0 auto; font-size: 4rem; text-transform: uppercase; text-align: center;">Votre resultat est</p><p style="width: 100%; text-align: center; font-size: 15rem;"> ' .$result. '</p><p style="width: 50%; margin: 0 auto; text-align: center; font-size: 3rem;"><a href="/calculForm">Revenir a la calculatrice</a></p>');


        } elseif ($operateur == "/"){

            $result = ($firstNmb / $secondNmb);
            return new Response('<p style="width: 60%; margin: 0 auto; font-size: 4rem; text-transform: uppercase; text-align: center;">Votre resultat est</p><p style="width: 100%; text-align: center; font-size: 15rem;"> ' .$result. '</p><p style="width: 50%; margin: 0 auto; text-align: center; font-size: 3rem;"><a href="/calculForm">Revenir a la calculatrice</a></p>');

        }
    }
}