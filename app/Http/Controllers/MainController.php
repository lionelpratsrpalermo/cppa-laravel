<?php

namespace App\Http\Controllers;

use App\Legacy\Player;
use App\Legacy\SQL_Queries;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use stdClass;

use App\Models\Jugador;
use App\Models\Usuario_model;
use App\Models\Partido;
use App\Models\Proxima_fecha;
use App\Models\Resultado;

function object2array(&$object)
{
    $result =  json_decode(json_encode($object), true);
    return  $result;
}

class MainController extends Controller
{
    public function Login()
    {
        $session_data = session()->all();
        /* echo "<pre>";
        print_r($session_data);
        echo "</pre>"; */
        if (isset($session_data['data_del_usuario'])) {
            return redirect()->action([MainController::class, 'Dashboard_add_match']);
        } else {
            return view('pages/dashboard/login');
        }
    }
    public function DoLogin(Request $request)
    {
        $session_data = session()->all();
        /* echo "<pre>";
        print_r($session_data);
        echo "</pre>"; */
        if (isset($session_data['data_del_usuario'])) {
            return redirect()->action([MainController::class, 'Dashboard_add_match']);
        } else {
            $user =  $request->user;
            $password = $request->password;
            if ($user == '' or $password == '') {
                return redirect()->action([MainController::class, 'Login']);
            } else {
                $Unique_User = Usuario_model::where('email', $user)
                    ->where('password', $password)->get();
                $found_value = $Unique_User->count();
                if ($found_value == 1) {
                    $session_active = 1;
                    $request->session()->flush();
                    $user_session_data = array(
                        'data_del_usuario' =>
                        array(
                            'username' => $Unique_User[0]->email,
                            'login_status' => $session_active
                        )
                    );
                    $request->session()->put($user_session_data);
                    return redirect()->action([MainController::class, 'Dashboard_add_match']);
                } else {
                    return redirect()->action([MainController::class, 'Login']);
                }
            }
        }
    }
    public function Logout()
    {
        $session_data = session()->all();
        if (isset($session_data['data_del_usuario'])) {
            session()->flush();
            return redirect()->action([MainController::class, 'Login']);
        } else {
            return redirect()->action([MainController::class, 'Login']);
        }
    }
    public function Dashboard_add_match(Player $player)
    {
        session()->regenerate();
        $session_data = session()->all();

        if (isset($session_data['data_del_usuario'])) {
            $allPlayers = $player->allPlayers();
            $DataCollection = array(
                'allPlayers' => $allPlayers,
            );
            return view('pages/dashboard/add_match', $DataCollection);
        } else {
            return redirect()->action([MainController::class, 'Login']);
        }
    }

    public function Dashboard_add_match_process_data(Request $request, SQL_Queries $SQL_Queries)
    {
        session()->regenerate();
        $session_data = session()->all();

        if (isset($session_data['data_del_usuario'])) {
            // return $request->all(); // metodo del Rquest para visualizar todo lo que nos llega de un formulario
            $age = $request->age;
            $date_match = $request->date_match;
            $stadium_match = $request->stadium_match;
            $grand_slam = $request->grand_slam;
            $meet = $request->meet;
            $instance = $request->instance;
            $winner1 = $request->winner1;
            $winner2 = $request->winner2;
            $looser1 = $request->looser1;
            $looser2 = $request->looser2;

            $set1winner = $request->set1winner;
            $set1looser = $request->set1looser;
            $set1TB = $request->set1TB;
            $set2winner = $request->set2winner;
            $set2looser = $request->set2looser;
            $set2TB = $request->set2TB;
            $set3winner = $request->set3winner;
            $set3looser = $request->set3looser;
            $set3TB = $request->set3TB;
            $set4winner = $request->set4winner;
            $set4looser = $request->set4looser;
            $set4TB = $request->set4TB;
            $set5winner = $request->set5winner;
            $set5looser = $request->set5looser;
            $set5TB = $request->set5TB;

            $auxiliarArray = [
                array($set1TB, $set1winner, $set1looser),
                array($set2TB, $set2winner, $set2looser),
                array($set3TB, $set3winner, $set3looser),
                array($set4TB, $set4winner, $set4looser),
                array($set5TB, $set5winner, $set5looser),
            ];

            $arrayPointsMatch = [];

            for ($i = 0; $i < count($auxiliarArray); $i++) {
                if ($auxiliarArray[$i][0] == '') {
                    $pointsWinnerInSet = $auxiliarArray[$i][1];
                    $pointsLooserInSet = $auxiliarArray[$i][2];
                    array_push($arrayPointsMatch, $pointsWinnerInSet, $pointsLooserInSet);
                } else {
                    $tb = $auxiliarArray[$i][0];
                    $tb = explode('-', $tb);
                    $pointsWinnerInSet = $auxiliarArray[$i][1] . ' (' . $tb[0] . '-' . $tb[1] . ')';
                    $pointsLooserInSet = $auxiliarArray[$i][2] . ' (' . $tb[1] . '-' . $tb[0] . ')';
                    array_push($arrayPointsMatch, $pointsWinnerInSet, $pointsLooserInSet);
                }
            }
            $partido = new Partido();
            $partido->era = $age;
            $partido->fecha = $date_match;
            $partido->estadio = $stadium_match;
            $partido->grand_slam = $grand_slam;
            $partido->fecha_nro = $meet;
            $partido->instancia = $instance;
            $partido->ganador1 = $winner1;
            $partido->ganador2 = $winner2;
            $partido->perdedor1 = $looser1;
            $partido->perdedor2 = $looser2;
            $partido->set1ganador = $arrayPointsMatch[0];
            $partido->set1perdedor = $arrayPointsMatch[1];
            $partido->set2ganador = $arrayPointsMatch[2];
            $partido->set2perdedor = $arrayPointsMatch[3];
            $partido->set3ganador = $arrayPointsMatch[4];
            $partido->set3perdedor = $arrayPointsMatch[5];
            $partido->set4ganador = $arrayPointsMatch[6];
            $partido->set4perdedor = $arrayPointsMatch[7];
            $partido->set5ganador = $arrayPointsMatch[8];
            $partido->set5perdedor = $arrayPointsMatch[9];
            $partido->save();

            $idLastUploadedMatch = $SQL_Queries->findLastMatch('id');
            $idMatch = '';
            $idMatch = $idLastUploadedMatch[0]->id;
            $winners = [$winner1, $winner2];
            $loosers = [$looser1, $looser2];
            $totalGamesWinner = 0;
            $totalGamesLooser = 0;
            $sets = [];
            for ($i = 0; $i <= 3; $i++) {
                if ($i % 2 == 0) {
                    $totalGamesWinner = $totalGamesWinner + substr($arrayPointsMatch[$i], 0, 1);
                } else {
                    $totalGamesLooser =  $totalGamesLooser + substr($arrayPointsMatch[$i], 0, 1);
                }
            }
            if (substr($arrayPointsMatch[4], 0, 2) == "tb") {
                $totalGamesWinner = $totalGamesWinner + 1;
                $sets = [1, 1];
            } else
                $sets = [2, 0];
            $outStandingPerformance = $request->outstandingPerformance;
            for ($i = 0; $i < count($winners); $i++) {
                $resultado = new Resultado();
                $resultado->id_partido = $idMatch;
                $resultado->id_jugador = $winners[$i];
                $resultado->games_ganados = $totalGamesWinner;
                $resultado->games_perdidos = $totalGamesLooser;
                $resultado->sets_ganados = $sets[0];
                $resultado->sets_perdidos = $sets[1];
                $resultado->partidos_ganados = 1;
                $resultado->partidos_perdidos = 0;
                $resultado->actuacion_destacada = $outStandingPerformance;
                $resultado->save();
            }

            for ($i = 0; $i < count($loosers); $i++) {
                $resultado = new Resultado();
                $resultado->id_partido = $idMatch;
                $resultado->id_jugador = $loosers[$i];
                $resultado->games_ganados = $totalGamesLooser;
                $resultado->games_perdidos = $totalGamesWinner;
                $resultado->sets_ganados = $sets[1];
                $resultado->sets_perdidos = $sets[0];
                $resultado->partidos_ganados = 0;
                $resultado->partidos_perdidos = 1;
                $resultado->actuacion_destacada = 0;
                $resultado->save();
            }
            return redirect()->action([MainController::class, 'Home']);
        } else {
            return redirect()->action([MainController::class, 'Login']);
        }
    }
    public function Dashboard_next_meet(Player $player)
    {
        session()->regenerate();
        $session_data = session()->all();

        if (isset($session_data['data_del_usuario'])) {
            $allPlayers = $player->allPlayers();
            $players = [];
            foreach ($allPlayers as $player) {
                array_push($players, $player);
            }
            $apellido = [];
            $nombre = [];
            foreach ($players as $clave => $valor) {
                $apellido[$clave] = $valor->apellido;
                $nombre[$clave] = $valor->nombre;
            }
            array_multisort($apellido, SORT_ASC, $nombre, SORT_ASC, $players);
            $allPlayers = $players;
            $DataCollection = array(
                'allPlayers' => $allPlayers,
            );
            return view('pages/dashboard/next_meet_form', $DataCollection);
        } else {
            return redirect()->action([MainController::class, 'Login']);
        }
    }

    public function Dashboard_next_meet_update(Request $request, Proxima_fecha $id_proxima_fecha)
    {
        session()->regenerate();
        $session_data = session()->all();

        if (isset($session_data['data_del_usuario'])) {
            $id_proxima_fecha->a1 = $request->team_A_player1;
            $id_proxima_fecha->a2 = $request->team_A_player2;
            $id_proxima_fecha->b1 = $request->team_B_player1;
            $id_proxima_fecha->b2 = $request->team_B_player2;
            $id_proxima_fecha->c1 = $request->team_C_player1;
            $id_proxima_fecha->c2 = $request->team_C_player2;
            $id_proxima_fecha->d1 = $request->team_D_player1;
            $id_proxima_fecha->d2 = $request->team_D_player2;
            $id_proxima_fecha->save();
            return redirect()->action([MainController::class, 'Proxima_fecha']);
        } else {
            return redirect()->action([MainController::class, 'Login']);
        }
    }





























    public function Home(Request $request)
    {
        $punctuationSystem = DB::table('sistema_puntuacion')
            ->select('item', 'puntos')
            ->get();
        $punctuationSystemArray = object2array($punctuationSystem);
        $processedPunctuationSystemArray = array();

        for ($i = 0; $i < count($punctuationSystemArray); $i++) {
            $processedPunctuationSystemArray[$punctuationSystemArray[$i]['item']] = $punctuationSystemArray[$i]['puntos'];
        }
        $detailMatchs = DB::table('resultado')
            ->where('partido.grand_slam', '>', 0)
            ->where('partido.fecha_nro', '>', 0)
            ->join('partido', 'partido.id', '=', 'resultado.id_partido')
            ->join('jugador', 'jugador.id', '=', 'resultado.id_jugador')
            ->select(
                'jugador.id',
                'jugador.apellido',
                'jugador.nombre',
                'partido.instancia',
                'resultado.games_ganados',
                'resultado.games_perdidos',
                'resultado.sets_ganados',
                'resultado.sets_perdidos',
                'resultado.partidos_ganados',
                'resultado.partidos_perdidos',
                'resultado.actuacion_destacada'
            )->get();
        $detailMatchsArray = object2array($detailMatchs);

        $dataPositionsTable = array();

        for ($i = 0; $i < count($detailMatchsArray); $i++) {

            $name = $detailMatchsArray[$i]['apellido'] . ' ' . substr($detailMatchsArray[$i]['nombre'], 0, 1) . '.';
            $pointsEarned =
                $detailMatchsArray[$i]['partidos_ganados'] *
                $processedPunctuationSystemArray['partido']
                +
                $detailMatchsArray[$i]['sets_ganados'] *
                $processedPunctuationSystemArray['set']
                +
                $detailMatchsArray[$i]['actuacion_destacada'] *
                $processedPunctuationSystemArray['actuacion_destacada']; // sumo los puntos que obtuvo el jugador en un partido

            if ($detailMatchsArray[$i]['instancia'] == 'final' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 1 si gano final
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['final'];
            } elseif ($detailMatchsArray[$i]['instancia'] == 'semifinal' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 2 si gano semi
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['semifinal'];
            }

            $matchsPlayed = $detailMatchsArray[$i]['partidos_ganados'] + $detailMatchsArray[$i]['partidos_perdidos'];

            $gamesPlayed = $detailMatchsArray[$i]['games_ganados'] + $detailMatchsArray[$i]['games_perdidos'];

            $difGames = $detailMatchsArray[$i]['games_ganados'] - $detailMatchsArray[$i]['games_perdidos'];

            $array = array(
                'jugador' => $name,
                'ptos.' => $pointsEarned,
                'p.j.' => $matchsPlayed,
                'p.g.' => $detailMatchsArray[$i]['partidos_ganados'],
                'p.p.' => $detailMatchsArray[$i]['partidos_perdidos'],
                'g.j.' => $gamesPlayed,
                'g.g.' => $detailMatchsArray[$i]['games_ganados'],
                'g.p.' => $detailMatchsArray[$i]['games_perdidos'],
                'dif.' => $difGames,
            );
            if (!isset($dataPositionsTable[$detailMatchsArray[$i]['id']])) {
                $dataPositionsTable[$detailMatchsArray[$i]['id']] = $array;
            } else {
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] + $array['ptos.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] + $array['p.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] + $array['p.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] + $array['p.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] + $array['g.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] + $array['g.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] + $array['g.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] + $array['dif.'];
            }
        }

        for ($i = 0; $i < count($dataPositionsTable); $i++) { // add effectiveness('eficacia') and effectiveness in games ('eficacia_games') to each player statics
            $dataPositionsTable[key($dataPositionsTable)]['eficacia'] = number_format($dataPositionsTable[key($dataPositionsTable)]['ptos.'] / $dataPositionsTable[key($dataPositionsTable)]['p.j.'], 3, '.', '.');
            $dataPositionsTable[key($dataPositionsTable)]['eficacia_games'] = number_format($dataPositionsTable[key($dataPositionsTable)]['g.g.'] / $dataPositionsTable[key($dataPositionsTable)]['g.j.'], 3, '.', '.');
            next($dataPositionsTable);
        }

        // https: //www.php.net/manual/es/function.array-multisort.php
        foreach ($dataPositionsTable as $clave => $valor) { // order array by effectiveness first, then by effectivenessGames
            $effectiveness[$clave] = $valor['eficacia'];
            $effectivenessGames[$clave] = $valor['eficacia_games'];
        }
        array_multisort($effectiveness, SORT_DESC, $effectivenessGames, SORT_DESC, $dataPositionsTable);

        $DataCollection = array(
            'dataPositionsTable' => $dataPositionsTable
        );

        // return view('pages/home', $DataCollection);
        return view('pages/historic_table_positions', $DataCollection);
    }
    public function Historic_table_positions(Request $request)
    {
        $punctuationSystem = DB::table('sistema_puntuacion')
            ->select('item', 'puntos')
            ->get();
        $punctuationSystemArray = object2array($punctuationSystem);
        $processedPunctuationSystemArray = array();

        for ($i = 0; $i < count($punctuationSystemArray); $i++) {
            $processedPunctuationSystemArray[$punctuationSystemArray[$i]['item']] = $punctuationSystemArray[$i]['puntos'];
        }
        $detailMatchs = DB::table('resultado')
            ->where('partido.grand_slam', '>', 0)
            ->where('partido.fecha_nro', '>', 0)
            ->join('partido', 'partido.id', '=', 'resultado.id_partido')
            ->join('jugador', 'jugador.id', '=', 'resultado.id_jugador')
            ->select(
                'jugador.id',
                'jugador.apellido',
                'jugador.nombre',
                'partido.instancia',
                'resultado.games_ganados',
                'resultado.games_perdidos',
                'resultado.sets_ganados',
                'resultado.sets_perdidos',
                'resultado.partidos_ganados',
                'resultado.partidos_perdidos',
                'resultado.actuacion_destacada'
            )->get();
        $detailMatchsArray = object2array($detailMatchs);

        $dataPositionsTable = array();

        for ($i = 0; $i < count($detailMatchsArray); $i++) {

            $name = $detailMatchsArray[$i]['apellido'] . ' ' . substr($detailMatchsArray[$i]['nombre'], 0, 1) . '.';
            $pointsEarned =
                $detailMatchsArray[$i]['partidos_ganados'] *
                $processedPunctuationSystemArray['partido']
                +
                $detailMatchsArray[$i]['sets_ganados'] *
                $processedPunctuationSystemArray['set']
                +
                $detailMatchsArray[$i]['actuacion_destacada'] *
                $processedPunctuationSystemArray['actuacion_destacada']; // sumo los puntos que obtuvo el jugador en un partido

            if ($detailMatchsArray[$i]['instancia'] == 'final' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 1 si gano final
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['final'];
            } elseif ($detailMatchsArray[$i]['instancia'] == 'semifinal' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 2 si gano semi
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['semifinal'];
            }

            $matchsPlayed = $detailMatchsArray[$i]['partidos_ganados'] + $detailMatchsArray[$i]['partidos_perdidos'];

            $gamesPlayed = $detailMatchsArray[$i]['games_ganados'] + $detailMatchsArray[$i]['games_perdidos'];

            $difGames = $detailMatchsArray[$i]['games_ganados'] - $detailMatchsArray[$i]['games_perdidos'];

            $array = array(
                'jugador' => $name,
                'ptos.' => $pointsEarned,
                'p.j.' => $matchsPlayed,
                'p.g.' => $detailMatchsArray[$i]['partidos_ganados'],
                'p.p.' => $detailMatchsArray[$i]['partidos_perdidos'],
                'g.j.' => $gamesPlayed,
                'g.g.' => $detailMatchsArray[$i]['games_ganados'],
                'g.p.' => $detailMatchsArray[$i]['games_perdidos'],
                'dif.' => $difGames,
            );
            if (!isset($dataPositionsTable[$detailMatchsArray[$i]['id']])) {
                $dataPositionsTable[$detailMatchsArray[$i]['id']] = $array;
            } else {
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] + $array['ptos.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] + $array['p.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] + $array['p.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] + $array['p.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] + $array['g.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] + $array['g.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] + $array['g.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] + $array['dif.'];
            }
        }

        for ($i = 0; $i < count($dataPositionsTable); $i++) { // add effectiveness('eficacia') and effectiveness in games ('eficacia_games') to each player statics
            $dataPositionsTable[key($dataPositionsTable)]['eficacia'] = number_format($dataPositionsTable[key($dataPositionsTable)]['ptos.'] / $dataPositionsTable[key($dataPositionsTable)]['p.j.'], 3, '.', '.');
            $dataPositionsTable[key($dataPositionsTable)]['eficacia_games'] = number_format($dataPositionsTable[key($dataPositionsTable)]['g.g.'] / $dataPositionsTable[key($dataPositionsTable)]['g.j.'], 3, '.', '.');
            next($dataPositionsTable);
        }

        // https: //www.php.net/manual/es/function.array-multisort.php
        foreach ($dataPositionsTable as $clave => $valor) { // order array by effectiveness first, then by effectivenessGames
            $effectiveness[$clave] = $valor['eficacia'];
            $effectivenessGames[$clave] = $valor['eficacia_games'];
        }
        array_multisort($effectiveness, SORT_DESC, $effectivenessGames, SORT_DESC, $dataPositionsTable);

        $DataCollection = array(
            'dataPositionsTable' => $dataPositionsTable
        );

        return view('pages/historic_table_positions', $DataCollection);
    }
    public function Grand_slam_index(Request $request, $gs_number)
    {
        $gs_number = $gs_number;

        $datesTournament = DB::table('partido')
            ->where('partido.grand_slam', $gs_number)
            ->select('partido.fecha_nro')->distinct()->get();

        $DataCollection = array(
            'gs_number' => $gs_number,
            'datesTournament' => $datesTournament
        );
        return view('pages/tournament_index', $DataCollection);
    }
    public function Grand_slam_date(Request $request, $gs_number, $date_number)
    {
        $punctuationSystem = DB::table('sistema_puntuacion')
            ->select('item', 'puntos')
            ->get();


        $detailMatchs = DB::table('resultado')
            ->where('partido.grand_slam', $gs_number)
            ->where('partido.fecha_nro', '>', 0)
            ->where('partido.fecha_nro', '<=', $date_number)
            ->join('partido', 'partido.id', '=', 'resultado.id_partido')
            ->join('jugador', 'jugador.id', '=', 'resultado.id_jugador')
            ->select(
                'jugador.id',
                'jugador.apellido',
                'jugador.nombre',
                'partido.instancia',
                'resultado.games_ganados',
                'resultado.games_perdidos',
                'resultado.sets_ganados',
                'resultado.sets_perdidos',
                'resultado.partidos_ganados',
                'resultado.partidos_perdidos',
                'resultado.actuacion_destacada'
            )->get();

        $resultsDate = DB::table('partido')
            ->select(
                'fecha',
                'instancia',
                'ganador1',
                'ganador2',
                'perdedor1',
                'perdedor2',
                'set1ganador',
                'set1perdedor',
                'set2ganador',
                'set2perdedor',
                'set3ganador',
                'set3perdedor'
            )
            ->where('grand_slam', $gs_number)
            ->where('fecha_nro', $date_number)
            ->get();

        $players = DB::table('jugador')
            ->select(
                'id',
                'apellido',
                'nombre'
            )->get();
        // $playersArray = object2array($players);
        foreach ($resultsDate as $match) {
            $match->fecha = substr($match->fecha, 0, 10);
            $match->fecha = date('d/m/Y', strtotime($match->fecha));
            foreach ($players as $key => $value) {
                if ($match->ganador1 == $players[$key]->id)
                    $match->ganador1 = $players[$key]->apellido . ' ' .  substr($players[$key]->nombre, 0, 1) . '.';
                if ($match->ganador2 == $players[$key]->id)
                    $match->ganador2 = $players[$key]->apellido . ' ' .  substr($players[$key]->nombre, 0, 1) . '.';
                if ($match->perdedor1 == $players[$key]->id)
                    $match->perdedor1 = $players[$key]->apellido . ' ' .  substr($players[$key]->nombre, 0, 1) . '.';
                if ($match->perdedor2 == $players[$key]->id)
                    $match->perdedor2 = $players[$key]->apellido . ' ' .  substr($players[$key]->nombre, 0, 1) . '.';
            }
            if ($match->set2ganador == '') {
                $match->set2ganador = '-';
                $match->set2perdedor = '-';
                $match->set3ganador = '-';
                $match->set3perdedor = '-';
            } elseif ($match->set3ganador == '') {
                $match->set3ganador = '-';
                $match->set3perdedor = '-';
            }
        }

        $arrayPlayers = new stdClass();
        $arrayPlayers->player1 = $resultsDate[0]->ganador1;
        $arrayPlayers->player2 = $resultsDate[0]->ganador2;
        $arrayPlayers->player3 = $resultsDate[0]->perdedor1;
        $arrayPlayers->player4 = $resultsDate[0]->perdedor2;
        $arrayPlayers->player5 = $resultsDate[1]->ganador1;
        $arrayPlayers->player6 = $resultsDate[1]->ganador2;
        $arrayPlayers->player7 = $resultsDate[1]->perdedor1;
        $arrayPlayers->player8 = $resultsDate[1]->perdedor2;

        $arrayPlayers = object2array($arrayPlayers);
        sort($arrayPlayers);

        $punctuationSystemArray = object2array($punctuationSystem);
        $processedPunctuationSystemArray = array();
        for ($i = 0; $i < count($punctuationSystemArray); $i++) {
            $processedPunctuationSystemArray[$punctuationSystemArray[$i]['item']] = $punctuationSystemArray[$i]['puntos'];
        }

        $detailMatchsArray = object2array($detailMatchs);
        $dataPositionsTable = array();

        for ($i = 0; $i < count($detailMatchsArray); $i++) {

            $name = $detailMatchsArray[$i]['apellido'] . ' ' . substr($detailMatchsArray[$i]['nombre'], 0, 1) . '.';
            $pointsEarned =
                $detailMatchsArray[$i]['partidos_ganados'] *
                $processedPunctuationSystemArray['partido']
                +
                $detailMatchsArray[$i]['sets_ganados'] *
                $processedPunctuationSystemArray['set']
                +
                $detailMatchsArray[$i]['actuacion_destacada'] *
                $processedPunctuationSystemArray['actuacion_destacada']; // sumo los puntos que obtuvo el jugador en un partido

            if ($detailMatchsArray[$i]['instancia'] == 'final' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 1 si gano final
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['final'];
            } elseif ($detailMatchsArray[$i]['instancia'] == 'semifinal' and $detailMatchsArray[$i]['partidos_ganados'] == 1) { // le sumo 2 si gano semi
                $pointsEarned = $pointsEarned + $processedPunctuationSystemArray['semifinal'];
            }

            $matchsPlayed = $detailMatchsArray[$i]['partidos_ganados'] + $detailMatchsArray[$i]['partidos_perdidos'];

            $gamesPlayed = $detailMatchsArray[$i]['games_ganados'] + $detailMatchsArray[$i]['games_perdidos'];

            $difGames = $detailMatchsArray[$i]['games_ganados'] - $detailMatchsArray[$i]['games_perdidos'];

            $array = array(
                'jugador' => $name,
                'ptos.' => $pointsEarned,
                'p.j.' => $matchsPlayed,
                'p.g.' => $detailMatchsArray[$i]['partidos_ganados'],
                'p.p.' => $detailMatchsArray[$i]['partidos_perdidos'],
                'g.j.' => $gamesPlayed,
                'g.g.' => $detailMatchsArray[$i]['games_ganados'],
                'g.p.' => $detailMatchsArray[$i]['games_perdidos'],
                'dif.' => $difGames,
            );
            if (!isset($dataPositionsTable[$detailMatchsArray[$i]['id']])) {
                $dataPositionsTable[$detailMatchsArray[$i]['id']] = $array;
            } else {
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['ptos.'] + $array['ptos.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.j.'] + $array['p.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.g.'] + $array['p.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['p.p.'] + $array['p.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.j.'] + $array['g.j.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.g.'] + $array['g.g.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['g.p.'] + $array['g.p.'];
                $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] = $dataPositionsTable[$detailMatchsArray[$i]['id']]['dif.'] + $array['dif.'];
            }
        }

        for ($i = 0; $i < count($dataPositionsTable); $i++) { // add effectiveness('eficacia') and effectiveness in games ('eficacia_games') to each player statics
            $dataPositionsTable[key($dataPositionsTable)]['eficacia'] = number_format($dataPositionsTable[key($dataPositionsTable)]['ptos.'] / $dataPositionsTable[key($dataPositionsTable)]['p.j.'], 3, '.', '.');
            $dataPositionsTable[key($dataPositionsTable)]['eficacia_games'] = number_format($dataPositionsTable[key($dataPositionsTable)]['g.g.'] / $dataPositionsTable[key($dataPositionsTable)]['g.j.'], 3, '.', '.');
            next($dataPositionsTable);
        }

        // https: //www.php.net/manual/es/function.array-multisort.php
        foreach ($dataPositionsTable as $clave => $valor) { // order array by effectiveness first, then by effectivenessGames
            $effectiveness[$clave] = $valor['eficacia'];
            $effectivenessGames[$clave] = $valor['eficacia_games'];
        }
        array_multisort($effectiveness, SORT_DESC, $effectivenessGames, SORT_DESC, $dataPositionsTable);

        $DataCollection = array(
            'gs_number' => $gs_number,
            'date_number' => $date_number,
            'dataPositionsTable' => $dataPositionsTable,
            'resultsDate' => $resultsDate,
            'arrayPlayers' => $arrayPlayers
        );

        /* echo "<pre>";
        print_r($resultsDate);
        echo "<pre>"; */

        return view('pages/tournament_date', $DataCollection);
    }

    public function Proxima_fecha()
    {
        $DataCollection = array();
        $proxima_fecha = Proxima_fecha::paginate();
        foreach ($proxima_fecha as $unique_register) {
            $playerA1 = Jugador::find($unique_register->a1);
            $playerA1 = $playerA1->apellido . ' ' . substr($playerA1->nombre, 0, 1) . '.';
            $playerA2 = Jugador::find($unique_register->a2);
            $playerA2 = $playerA2->apellido . ' ' . substr($playerA2->nombre, 0, 1) . '.';

            $playerB1 = Jugador::find($unique_register->b1);
            $playerB1 = $playerB1->apellido . ' ' . substr($playerB1->nombre, 0, 1) . '.';
            $playerB2 = Jugador::find($unique_register->b2);
            $playerB2 = $playerB2->apellido . ' ' . substr($playerB2->nombre, 0, 1) . '.';

            $playerC1 = Jugador::find($unique_register->c1);
            $playerC1 = $playerC1->apellido . ' ' . substr($playerC1->nombre, 0, 1) . '.';
            $playerC2 = Jugador::find($unique_register->c2);
            $playerC2 = $playerC2->apellido . ' ' . substr($playerC2->nombre, 0, 1) . '.';

            $playerD1 = Jugador::find($unique_register->d1);
            $playerD1 = $playerD1->apellido . ' ' . substr($playerD1->nombre, 0, 1) . '.';
            $playerD2 = Jugador::find($unique_register->d2);
            $playerD2 = $playerD2->apellido . ' ' . substr($playerD2->nombre, 0, 1) . '.';
        }
        $next_meet_array_players = [$playerA1, $playerA2, $playerB1, $playerB2, $playerC1, $playerC2, $playerD1, $playerD2];
        $DataCollection = array('next_meet_array_players' => $next_meet_array_players);
        return view('pages/next_meet', $DataCollection);
    }
}
