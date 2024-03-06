<?php

namespace App\Http\Controllers;
use App\DAO\ServiceCard;
use App\DAO\ServiceEmploye;
use Exception;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Exceptions\MonException;
use Carbon\Carbon;
class CardController extends Controller
{
    public function postAjouterCard()
    {
        try {
            $name = Request::input('name');
            $theme = Request::input('theme');
            $type = Request::input('type');
            $url = Request::input('url');
            $date = Carbon::now()->format('Y-m-d'); // Format YYYY-MM-DD;
            $iteration = 0;

            $unCardService = new ServiceCard();
            $unCardService->ajoutCard($name, $theme, $type, $url, $date, $iteration);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function listerCards(){
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getListCard();
        }catch (MonException $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }catch (Exception $e){
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/formCardLister', compact('mesCards'));
    }

    public function modifierCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $unCard = $unCardService->getCard($id);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/formCardModifier', compact('unCard'));
    }

    public function postModifierCard($id = null)
    {
        $code = $id;
        $name = Request::input('name');
        $theme = Request::input('theme');
        $type = Request::input('type');
        $url = Request::input('url');
        $date = Carbon::now()->format('Y-m-d'); // Format YYYY-MM-DD;
        $iteration = 0;
        try {
            $unCardService = new ServiceCard();
            $unCardService->modifierCard($id, $name, $theme, $type, $url, $date, $iteration);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function supprimerCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $unCardService->supprimerCard($id);
            return view('home');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function getCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $unCard = $unCardService->getCard($id);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/formCardModifier', compact('unCard'));
    }

    public function getCardByTheme($theme)
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getCardByTheme($theme);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('mesCards'));
    }

    public function getCardByType($type)
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getCardByType($type);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('mesCards'));
    }

    public function getCardByDate($date)
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getCardByDate($date);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('mesCards'));
    }

    public function getCardByDateAndType($date, $type)
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getCardByDateAndType($date, $type);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('mesCards'));
    }

    public function getCardByDateAndTheme($date, $theme)
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getCardByDateAndTheme($date, $theme);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('mesCards'));
    }

    public function getCardWordToday()
    {
        try {
            $unCardService = new ServiceCard();
            $date = Carbon::now()->format('Y-m-d');
            $Cards = $unCardService->getCardByDateAndType($date, 'Word');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('Cards'));
    }

    public function getCardSentenceToday()
    {
        try {
            $unCardService = new ServiceCard();
            $date = Carbon::now()->format('Y-m-d');
            $Cards = $unCardService->getCardByDateAndType($date, 'Sentence');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('Cards'));
    }

    public function getCardLessonToday()
    {
        try {
            $unCardService = new ServiceCard();
            $date = Carbon::now()->format('Y-m-d');
            $Cards = $unCardService->getCardByDateAndType($date, 'Lesson');
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/CardWordToday', compact('Cards'));
    }

    public function finishCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $unCardService->FinishWork($id);
            $type = $unCardService->getType($id);
            if ($type == 'Word') {
                return url('/CardWordToday');
            } elseif ($type == 'Sentence') {
                return url('/CardSentenceToday');
            } elseif ($type == 'Lesson') {
                return url('/CardLessonToday');
            }else{
                return view('home');
            }
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }


}
