<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 *
 */
class SeriesController extends Controller
{

    function index(Request $request)
    {
        $series = [
            'Agents of SHIELD',
            'Castlevania',
            'Dark',
            'Once upon a time'
        ];

        $html = "<ul>";
        foreach ($series as $serie) {
            $html .= "<li>$serie</li>";
        }
        $html .= "</ul>";
        return $html;
    }
}

 ?>
