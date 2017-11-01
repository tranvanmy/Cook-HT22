<?php

namespace App\Http\Controllers\Users;

use App\Models\ReceiptIngredient;
use App\Models\ReceiptStep;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Foody;
use App\Models\Receipt;
use App\Models\Ingredient;
use App\Models\ReceiptFoody;
use App\Models\Unit;
use App\Models\User;
use Auth;

class SubmitReceiptController extends Controller
{
    protected $foody;
    protected $receipt;
    protected $ingredient;
    protected $recIngre;
    protected $recStep;
    protected $recFoody;
    protected $unit;
    protected $user;

    public function __construct(
        Foody $foody,
        Receipt $receipt,
        Ingredient $ingredient,
        ReceiptIngredient $recIngre,
        ReceiptStep $recStep,
        ReceiptFoody $recFoody,
        Unit $unit,
        User $user
    )
    {
        $this->foody = $foody;
        $this->receipt = $receipt;
        $this->ingredient = $ingredient;
        $this->recIngre = $recIngre;
        $this->recStep = $recStep;
        $this->recFoody = $recFoody;
        $this->unit = $unit;
        $this->user = $user;
    }

    public function index()
    {
        $foodies = $this->foody->parentID(0)->get();
        $units = $this->unit->all();
        $receipt = $this->receipt->userId(Auth::user()->id)->status(2)->first();
        if (isset($receipt)) {
            $rec_ingre = $this->recIngre->receiptId($receipt->id)->get();
            $step = $this->recStep->receiptId($receipt->id)->get();
            $recFoody = $this->recFoody->receiptId($receipt->id)->get();

            return view("users/pages/createReceipt",
                compact("foodies", "receipt", "rec_ingre", "step", "recFoody", "units"));
        } else return view("users/pages/createReceipt", compact("foodies", "units"));
    }

    public function postReceipt(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->id)) {
                $receipt = $this->receipt->find($request->id);
                if ($request->file("image") == null) {
                    $receipt->name = $request->name;
                    $receipt->time = $request->time;
                    $receipt->ration = $request->ration;
                    $receipt->complex = $request->complex;
                    $receipt->description = $request->description;
                    $receipt->save();
                    return $receipt;
                } else {
                    $file_name = $request->file('image')->getClientOriginalName();
                    $request->file('image')->move('upload/images/', $file_name);
                    $receipt->name = $request->name;
                    $receipt->time = $request->time;
                    $receipt->ration = $request->ration;
                    $receipt->complex = $request->complex;
                    $receipt->image = $file_name;
                    $receipt->description = $request->description;
                    $receipt->save();
                    return $receipt;
                }
            } else {
                $file_name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move('upload/images/', $file_name);
                $response = $this->receipt->create([
                    'name' => $request->name,
                    'time' => $request->time,
                    'ration' => $request->ration,
                    'complex' => $request->complex,
                    'description' => $request->description,
                    'image' => $file_name,
                    'status' => 2,
                    'user_id' => Auth::user()->id
                ]);
            }
        }
        return response($response);
    }

    public function postAddIngredient(Request $request)
    {
        if ($request->ajax()) {
            $this->ingredient->name = $request->name;
            $this->ingredient->unit_id = $request->unit;
            $this->ingredient->status = 0;
            $this->ingredient->save();

            $this->recIngre->receipt_id = $request->idReceipt;
            $this->recIngre->ingredient_id = $this->ingredient->id;
            $this->recIngre->quantity = $request->qty;
            $this->recIngre->note = $request->note;
            $this->recIngre->save();

            $data["name"] = $request->name;
            $data["unit"] = $request->unit;
            $data["qty"] = $request->qty;
            $data["note"] = $request->note;
            $data["idIngre"] = $this->recIngre->ingredient_id;
            $data["idRecIngre"] = $this->recIngre->id;
            $data["idReceipt"] = $this->recIngre->receipt_id;
            // $response = $this->recIngre->ingredient;
            return response($data);
        }
    }

    public function postEditIngredient(Request $request)
    {
        if ($request->ajax()) {
            $ingredient = $this->ingredient->find($request->idIngre);
            $ingredient->name = $request->name;
            $ingredient->unit_id = $request->unit;
            $ingredient->status = 0;
            $ingredient->save();

            $recIngre = $this->recIngre->find($request->idRecIngre);
            $recIngre->quantity = $request->qty;
            $recIngre->note = $request->note;
            $recIngre->save();

            return response($request->all());
        }
    }

    public function postDelIngredient(Request $request)
    {
        if ($request->ajax()) {
            $ingredient = $this->ingredient->find($request->idIngre);
            $ingredient->delete();
            return response($request->all());
        }
    }

    public function postAddStep(Request $request)
    {
        if ($request->ajax()) {
            $file_name = $request->file('image')->getClientOriginalName();
            $this->recStep->content = $request->content;
            $this->recStep->image = $file_name;
            $this->recStep->receipt_id = $request->idReceipt;
            $this->recStep->step = $request->step;
            $request->file('image')->move('upload/images/', $file_name);
            $this->recStep->save();
            return response($this->recStep);
        }
    }

    public function postEditStep(Request $request)
    {
        if ($request->ajax()) {
            $recStep = $this->recStep->find($request->idRecStep);
            if ($request->file('image') == null) {
                $recStep->content = $request->content;
                $recStep->save();
                return $recStep;
            } else {
                $file_name = $request->file('image')->getClientOriginalName();
                $recStep->content = $request->content;
                $recStep->image = $file_name;
                $recStep->step = $request->step;
                $request->file('image')->move('upload/images/', $file_name);
                $recStep->save();
                return response($recStep);
            }
        }
    }

    public function postDelStep(Request $request)
    {
        if ($request->ajax()) {
            $recStep = $this->recStep->find($request->idRecStep);
            $recStep->delete();
            return response($request->all());
        }
    }

    public function postReceiptCate(Request $request)
    {
        if ($request->ajax()) {
            parse_str($request->data, $body);

            $getID = $this->recFoody->find($request->idReceipt);
            if($getID)
                $getID->delete();

            foreach ($body as $key => $value) {
                for ($i = 0; $i <= count($value); $i++) {
                    $this->recFoody->create([
                        'receipt_id' => $request->idReceipt,
                        'foody_id' => $value[$i]
                    ]);

                }
            }
        }
        // foreach ($body as $key => $value) {
        //         # code...
        //         $newKey = explode(",",$key);
        //         for($i=0;$i<=count($newKey);$i++)
        //         {

        //             $this->recFoody->create([
        //                 'receipt_id' => $request->idReceipt,
        //                 'foody_id' => $newKey[$i]
        //             ]);
        //         }
        //     }
    }

    public function createReceipt(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            if (!$id) {
                $message = trans("sites.createFail");
            } else {
                $recEdit = $this->receipt->find($id);
                $recEdit->status = 2;
                $recEdit->save();
                $receipt = $this->receipt->userId(Auth::user()->id)->status(2)->first();
                $rec_ingre = $this->recIngre->receiptId($receipt->id)->first();
                $step = $this->recStep->receiptId($receipt->id)->first();
                $recFoody = $this->recFoody->receiptId($receipt->id)->first();
                if (isset($rec_ingre) && isset($step) && isset($recFoody) && ($receipt->id == $rec_ingre->receipt_id) && ($rec_ingre->receipt_id == $step->receipt_id) && ($step->receipt_id == $recFoody->receipt_id) && ($recFoody->receipt_id == $receipt->id)) {
                    $rec = $this->receipt->find($id);
                    $rec->status = 0;
                    $rec->save();
                    $message = trans("sites.createSuccess");
                } else $message = trans("sites.createFail");
                
                $currentUser = $this->user->find(Auth::user()->id);
                $countUserReceipts = count($currentUser->receipts);
                if($countUserReceipts > 10)
                {
                    $currentUser->rank = 3;
                    $currentUser->save();
                }
                else if($countUserReceipts >= 5 && $countUserReceipts <= 10) {
                    $currentUser->rank = 2;
                    $currentUser->save();
                }
            }
            return $message;
        }
    }

    public function cancelReceipt(Request $request)
    {
        $message = trans("sites.deleteFail");

        if (!$request->ajax() || !$request->id) {
            return $message;
        }

        $rec = $this->receipt->find($request->id);
        $rec->delete();
        $message = trans("sites.deleteSuccess");

        return $message;

    }

    public function getEdit($id)
    {
        $foodies = $this->foody->parentID(0)->get();
        $units = $this->unit->all();
        $receipt = $this->receipt->find($id);
        $rec_ingre = $this->recIngre->receiptId($receipt->id)->get();
        $step = $this->recStep->receiptId($receipt->id)->get();
        $recFoody = $this->recFoody->receiptId($receipt->id)->get();
        return view("users/pages/createReceipt", compact(
            "receipt", 
            'rec_ingre', 
            'step', 
            'recFoody', 
            'foodies', 
            'units'
        ));
    }
}
