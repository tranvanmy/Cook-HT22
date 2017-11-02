<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Repositories\Contracts\ReceiptIngredientRepositoryInterface;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;
use App\Repositories\Contracts\FoodyRepositoryInterface;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use App\Repositories\Contracts\IngredientRepositoryInterface;
use App\Repositories\Contracts\ReceiptFoodyRepositoryInterface;
use App\Repositories\Contracts\UnitRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;


class SubmitReceiptController extends Controller
{
    private $foodyRepository;
    private $receiptRepository;
    private $ingredientRepository;
    private $receiptIngredientRepository;
    private $receiptStepRepository;
    private $receiptFoodyRepository;
    private $unitRepository;
    private $userRepository;

    public function __construct(
        FoodyRepositoryInterface $foodyRepository,
        ReceiptRepositoryInterface $receiptRepository,
        IngredientRepositoryInterface $ingredientRepository,
        ReceiptIngredientRepositoryInterface $receiptIngredientRepository,
        ReceiptStepRepositoryInterface $receiptStepRepository,
        ReceiptFoodyRepositoryInterface $receiptFoodyRepository,
        UnitRepositoryInterface $unitRepository,
        UserRepositoryInterface $userRepository
    )
    {
        $this->foodyRepository = $foodyRepository;
        $this->receiptRepository = $receiptRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->receiptIngredientRepository = $receiptIngredientRepository;
        $this->receiptStepRepository = $receiptStepRepository;
        $this->receiptFoodyRepository = $receiptFoodyRepository;
        $this->unitRepository = $unitRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $foodies = $this->foodyRepository->findAllBy('id', 0);
        $units = $this->unitRepository->all();
        $receipt = $this->receiptRepository->getUserId(Auth::user()->id)->getStatus(2)->first();
        if (isset($receipt)) {
            $step = $this->receiptStepRepository->getReceiptId($receipt->id)->get();

            return view('users.pages.createReceipt', compact(
                'foodies',
                'receipt',
                'step',
                'units'
            ));
        } 
        return view('users.pages.createReceipt', compact('foodies', 'units'));
        
    }

    public function postReceipt(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        if (isset($request->id)) {
            $receipt = $this->receiptRepository->editReceipt($request);

            return $receipt;
        } 
        $response = $this->receiptRepository->createReceipt($request);
        return response($response);
    }

    public function postAddIngredient(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $ingredient = $this->ingredientRepository->createIngredient($request);

        $receiptIngredient = $this->receiptIngredientRepository->createReceiptIngredient($request, $ingredient->id);

        $data["name"] = $ingredient->name;
        $data["unit"] = $ingredient->unit['name'];
        $data["qty"] = $receiptIngredient->quantity;
        $data["note"] = $receiptIngredient->note;
        $data["idIngre"] = $receiptIngredient->ingredient_id;
        $data["idRecIngre"] = $receiptIngredient->id;
        $data["idReceipt"] = $receiptIngredient->receipt_id;

        return response($data);
    }

    public function postEditIngredient(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $this->ingredientRepository->updateIngreUser($request);

        $this->receiptIngredientRepository->updateReceiptIngredient($request);

        return response($request->all());
    }

    public function postDelIngredient(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $this->ingredientRepository->delete($request->idIngre);
        return response($request->all());
    }

    public function postAddStep(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        $response = $this->receiptStepRepository->createReceiptStep($request);

        return response($response);
    }

    public function postEditStep(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        $recStep = $this->receiptStepRepository->updateReceiptStep($request);

        return response($recStep);

    }

    public function postDelStep(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $recStep = $this->receiptStepRepository->delete($request->idRecStep);

        return response($request->all());
    }

    public function postReceiptCate(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        parse_str($request->data, $body);
        $getID = $this->receiptFoodyRepository->find($request->idReceipt);
        if ($getID) {
            $getID->delete();
        }
        foreach ($body as $key => $value) {
            for ($i = 0; $i <= count($value); $i++) {
                $this->receiptFoodyRepository->create([
                    'receipt_id' => $request->idReceipt,
                    'foody_id' => $value[$i]
                ]);

            }
        }
    }

    public function createReceipt(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        $id = $request->id;
        if (!$id) {
            $message = trans('sites.createFail');
        }
        $recEdit = $this->receiptRepository->find($id);
        $recEdit->status = 2;
        $recEdit->save();
        $receipt = $this->receiptRepository->getUserId(Auth::user()->id)->getStatus(2)->first();
        $rec_ingre = $this->receiptIngredientRepository->getReceiptId($receipt->id)->first();
        $step = $this->receiptStepRepository->getReceiptId($receipt->id)->first();
        $recFoody = $this->receiptFoodyRepository->getReceiptId($receipt->id)->first();
        if (isset($rec_ingre) && isset($step) && isset($recFoody) && ($receipt->id == $rec_ingre->receipt_id) && ($rec_ingre->receipt_id == $step->receipt_id) && ($step->receipt_id == $recFoody->receipt_id) && ($recFoody->receipt_id == $receipt->id)) {
            $rec = $this->receiptRepository->find($id);
            $rec->status = 0;
            $rec->save();
            $message = trans('sites.createSuccess');
        } else $message = trans('sites.createFail');

        $currentUser = $this->userRepository->find(Auth::user()->id);
        $countUserReceipts = count($currentUser->receipts);
        if ($countUserReceipts > 10) {
            $currentUser->rank = 3;
            $currentUser->save();
        } else if ($countUserReceipts >= 5 && $countUserReceipts <= 10) {
            $currentUser->rank = 2;
            $currentUser->save();
        }
        return $message;
    }

    public function cancelReceipt(Request $request)
    {
        $message = trans('sites.deleteFail');

        if (!$request->ajax() || !$request->id) {
            return $message;
        }

        $this->receiptRepository->delete($request->id);
        $message = trans('sites.deleteSuccess');

        return $message;

    }

    public function getEdit($id)
    {
        $foodies = $this->foodyRepository->findAllBy('id', 0);
        $units = $this->unitRepository->all();
        $receipt = $this->receiptRepository->find($id);
        $step = $this->receiptStepRepository->getReceiptId($receipt->id)->get();
        $recFoody = $this->receiptFoodyRepository->getReceiptId($receipt->id)->get();

        return view('users.pages.createReceipt', compact(
            'receipt',
            'step',
            'recFoody',
            'foodies',
            'units'
        ));
    }
}
