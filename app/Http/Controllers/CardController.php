<?php

namespace App\Http\Controllers;
use App\DAO\ServiceCard;
use App\DAO\ServiceEmploye;
use App\Models\Counter;
use Exception;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Exceptions\MonException;
use Carbon\Carbon;
class CardController extends Controller
{
private $k_values = [
0 => 0.356675,
1 => 0.178337,
2 => 0.089169,
3 => 0.050954,
4 => 0.025477,
5 => 0.011889,
6 => 0.005945,
7 => 0.003963,
8 => 0.001982,
9 => 0.000977
];
    function calculateRetention($startDate, $currentDate, $k) {
        $daysElapsed = $startDate->diffInDays($currentDate);
        return 100 * exp(-$k * $daysElapsed);
    }

    function graph($id){
        $unServiceCard = new ServiceCard();
        $startDate = $unServiceCard->oldDate($id);
        $today = Carbon::now();
        $k = $this->k_values[$unServiceCard->getIteration($id)];
// Initialisation des itérations



// Initialisation des données pour le graphe
        $data = [];

// Calculer la rétention pour chaque jour depuis la date de début jusqu'à aujourd'hui
        $currentDate = $startDate->copy();
        while ($currentDate->lte($today)) {
            $retention = $this->calculateRetention($startDate, $currentDate, $k);
            $data[$currentDate->toDateString()] = $retention;
            $currentDate->addDay();
        }
        return view('vues/graphCard', compact('data'));
    }
    public function index()
    {
        $counter = new ServiceCard();
        $counterValue = $counter->getCounter();
        $counts = $this->getCardCount();

        return view('home', ['counterValue' => $counterValue, 'counts' => $counts]);
    }
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
            return $this->index();
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
    }

    public function listerCards()
    {
        try {
            $unCardService = new ServiceCard();
            $mesCards = $unCardService->getListCard();
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/formCardLister', compact('mesCards'));
    }

    public function getModifierCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $Card = $unCardService->getCard($id);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/modificationCard', compact('Card'));
    }

    public function updateCard($id = null)
    {
        $name = Request::input('name');
        $theme = Request::input('theme');
        $type = Request::input('type');
        $url = Request::input('url');
        $date = Request::input('date'); // Format YYYY-MM-DD;
        $iteration = Request::input('iteration');
        try {
            $unCardService = new ServiceCard();
            $unCardService->modifierCard($id, $name, $theme, $type, $url, $date, $iteration);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return $this->index();
    }

    public function deletedCard($id)
    {
        try {
            $unCardService = new ServiceCard();
            $unCardService->supprimerCard($id);
            return $this->index();
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
        return view('vues/getModifierCard', compact('unCard'));
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
            $type = $unCardService->getTypeCard($id);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
         if ($type == 'Word') {
            return redirect('/CardWordToday');
        } elseif ($type == 'Sentence') {
            return redirect('/CardSentenceToday');
        } elseif ($type == 'Lesson') {
             return redirect('/CardLessonToday');
         }else{
             return $this->index();
         }
    }
    public function search()
    {
        try {
            $key = Request::input('search');
            $unCardService = new ServiceCard();
            $posts =  $unCardService->rechercheCard($key);
        } catch (MonException $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('vues/error', compact('erreur'));
        }
        return view('vues/RechercheCard', compact('posts'));
    }
    public function getCardCount()
    {
        $unCardService = new ServiceCard();
        $counts = $unCardService->getNotice('Word','Sentence','Lesson');
        return $counts;

    }
    public function incrementCounter()
    {
        $counter = new ServiceCard();
        $counter->incrementCounter();
        return redirect('/');
    }
}
