<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\ReceiptFoody;
use App\Models\ReceiptIngredient;
use App\Models\ReceiptStep;
use App\Models\Foody;
use App\Models\Ingredient;
use App\Models\Unit;

class DetailReceiptController extends Controller
{
    protected $receipt;
    protected $recIngre;
    protected $recFoody;
    protected $recStep;
    protected $ingredient;
    protected $foody;
    protected $unit;

    public function __construct(
        Foody $foody,
        ReceiptIngredient $recIngre,
        Receipt $receipt,
        ReceiptStep $recStep,
        Ingredient $ingredient,
        ReceiptFoody $recFoody,
        Unit $unit

    )
    {
        $this->foody = $foody;
        $this->recIngre = $recIngre;
        $this->receipt = $receipt;
        $this->recStep = $recStep;
        $this->ingrediet = $ingredient;
        $this->recFoody = $recFoody;
        $this->unit = $unit;
    }

    public function show($id)
    {
        $receipt = $this->receipt->getId($id)->first();
        $recIngre = $this->recIngre->receiptId($id)->get();
        $recStep = $this->recStep->receiptId($id)->get();
        $recFoody = $this->recFoody->receiptId($id)->first();
        $units = $this->unit->all();
        return view("users.pages.detail", compact("receipt", "recIngre", "recStep", "recFoody", "units"));
    }

    public function calRation(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->arrData;
            $number = $request->number;
            $newData = array();
            for ($i = 0; $i < count($data); $i++) {
                array_push($newData, $number * $data[$i]);
            }
            return $newData;
        }
    }
}
