<?php

namespace App\DAO;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
class ServiceCard
{
    public function ajoutCard($name, $theme, $type, $url, $date, $iteration)
    {
        try {
            DB::table('card')->insert(
                ['name' => $name, 'theme' => $theme, 'type' => $type, 'url' => $url, 'date' => $date, 'iteration' => $iteration]
            );
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }
    public function getListCard()
    {
        try {
            $mesCards = DB::table('card')
                ->select()
                ->get();
            return $mesCards;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getCard($id)
    {
        try {
            $unCard = DB::table('card')
                ->select()
                ->where('id', '=', $id)
                ->first();
            return $unCard;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function modifierCard($id, $name, $theme, $type, $url, $date, $iteration)
    {
        try {
            DB::table('card')
                ->where('id', $id)
                ->update(
                    ['name' => $name, 'theme' => $theme, 'type' => $type, 'url' => $url, 'date' => $date, 'iteration' => $iteration]
                );
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function supprimerCard($id)
    {
        try {
            DB::table('card')
                ->where('id', '=', $id)
                ->delete();
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getCardByTheme($theme)
    {
        try {
            $mesCards = DB::table('card')
                ->select()
                ->where('theme', '=', $theme)
                ->get();
            return $mesCards;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getCardByType($type)
    {
        try {
            $mesCards = DB::table('card')
                ->select()
                ->where('type', '=', $type)
                ->get();
            return $mesCards;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getCardByDate($date)
    {
        try {
            $mesCards = DB::table('card')
                ->select()
                ->where('date', '<=', $date)
                ->get();
            return $mesCards;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getCardByDateAndType($date,$type)
    {
        try {
            $mesCards = DB::table('card')
                ->select()
                ->where('date', '<=', $date)
                ->where('type', '=', $type)
                ->get();
            return $mesCards;
        } catch (\Illmuninate\Database\QueryException $e) {
            throw new MonException($e->getMessage(),5);
        }
    }

public function NextCard($id, $date)
{
    try {
        // Retrieve the current iteration value
        $currentIteration = DB::table('card')
            ->where('id', $id)
            ->value('iteration');

        // Increment the iteration value
        $newIteration = $currentIteration + 1;

        // Update the card record
        DB::table('card')
            ->where('id', $id)
            ->update(
                ['date' => $date, 'iteration' => $newIteration]
            );
    } catch (\Illuminate\Database\QueryException $e) {
        throw new MonException($e->getMessage(), 5);
    }
}

public function getType($id)
{
    try {
        $type = DB::table('card')
            ->where('id', $id)
            ->value('type');
        return $type;
    } catch (\Illuminate\Database\QueryException $e) {
        throw new MonException($e->getMessage(), 5);
    }
}

public function FinishWork($id)
{
    try {
        $currentIteration = DB::table('card')
            ->where('id', $id)
            ->value('iteration');
        $date = $this->NewDate($currentIteration);
        $this->NextCard($id, $date);
    } catch (\Illuminate\Database\QueryException $e) {
        throw new MonException($e->getMessage(), 5);
    } catch (MonException $e) {
        throw new MonException($e->getMessage(), 5);
    }

}


public function NewDate($currentIteration)
{
    $date = Carbon::now();
    if ($currentIteration == 0) {
        $date = $date->addDay(1);
    } elseif ($currentIteration == 1) {
        $date = $date->addDay(2);
    } elseif ($currentIteration == 2) {
        $date = $date->addDay(4);
    } elseif ($currentIteration == 3) {
        $date = $date->addDay(7);
    } elseif ($currentIteration == 4) {
        $date = $date->addDay(14);
    } elseif ($currentIteration == 5) {
        $date = $date->addDay(30);
    } elseif ($currentIteration == 6) {
        $date = $date->addDay(60);
    } elseif ($currentIteration == 7) {
        $date = $date->addDay(90);
    } elseif ($currentIteration == 8) {
        $date = $date->addDay(180);
    } else {
        $date = $date->addDay(365);
    }
    return $date;
}
}
