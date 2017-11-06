<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserReceiptRepositoryInterface;
use App\Repositories\Contracts\UserReceiptIngredientRepositoryInterface;
use App\Repositories\Contracts\UserReceiptStepRepositoryInterface;
use App\Repositories\Contracts\UserReceiptFoodyRepositoryInterface;
use App\Repositories\Contracts\UnitRepositoryInterface;
use App\Repositories\Contracts\FoodyRepositoryInterface;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use App\Repositories\Contracts\IngredientRepositoryInterface;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;

class UserReceiptController extends Controller
{
    private $userReceiptRepository;
    private $userReceiptIngredientRepository;
    private $userReceiptStepRepositoy;
    private $userReceiptFoodyRepository;
    private $unitRepository;
    private $foodyRepository;
    private $receiptRepository;
    private $ingredientRepository;
    private $userReceiptStepRepository;
    private $receiptStepRepository;

    public function __construct(
        UserReceiptRepositoryInterface $userReceiptRepository,
        UserReceiptIngredientRepositoryInterface $userReceiptIngredientRepository,
        UserReceiptStepRepositoryInterface $userReceiptStepRepository,
        UserReceiptFoodyRepositoryInterface $userReceiptFoodyRepository,
        UnitRepositoryInterface $unitRepository,
        FoodyRepositoryInterface $foodyRepository,
        ReceiptRepositoryInterface $receiptRepository,
        IngredientRepositoryInterface $ingredientRepository,
        ReceiptStepRepositoryInterface $receiptStepRepository
    )
    {
        $this->userReceiptRepository = $userReceiptRepository;
        $this->userReceiptIngredientRepository = $userReceiptIngredientRepository;
        $this->userReceiptStepRepository = $userReceiptStepRepository;
        $this->userReceiptFoodyRepository = $userReceiptFoodyRepository;
        $this->unitRepository = $unitRepository;
        $this->foodyRepository = $foodyRepository;
        $this->receiptRepository = $receiptRepository;
        $this->ingredientRepository = $ingredientRepository;
        $this->receiptStepRepository = $receiptStepRepository;
    }

    public function fork(Request $request)
    {
        if(!$request->ajax()){
            return false;
        }
        $receiptCurrent = $this->receiptRepository->getId($request->receipt_id);
        $forked = $this->userReceiptRepository->findFork($request->assign_id, $request->receipt_id)->first();
        if($forked == null){
            $fork = $this->userReceiptRepository->fork($request,$receiptCurrent);

            return response($fork);
        }
        $fork = $forked;

        return response($fork);
    }

    public function show($receipt_id,$fork_id)
    {
        $fork = $this->userReceiptRepository->getId($fork_id)->first();
        $my_fork = $fork->receipt;
        $units = $this->unitRepository->all();
        $ur_ingredients = $this->userReceiptIngredientRepository->getReceiptForkId($fork->id)->get();
        $ur_foodies = $this->userReceiptFoodyRepository->getReceiptForkId($fork->id)->first();
        $ur_steps = $this->userReceiptStepRepository->getReceiptForkId($fork->id)->get();
        $countReceiptByAssign = $fork->user->receipts->count();

        return view('users.pages.fork',compact(
            'my_fork',
            'fork',
            'ur_ingredients',
            'ur_foodies',
            'countReceiptByAssign',
            'ur_steps',
            'units'
        ));
    }

    public function getEdit($receipt_id,$fork_id)
    { 
        $fork = $this->userReceiptRepository->getId($fork_id)->first();
        $receipt = $fork->receipt;
        $foodies = $this->foodyRepository->findAllBy('id', 0);
        $units = $this->unitRepository->all();
        $ur_ingredients = $fork->userReceiptIngredients;
        $step = $this->userReceiptStepRepository->getReceiptForkId($fork->id)->get();
        $ur_foodies = $fork->userReceiptFoodies;

        return view('users.pages.createReceipt', compact(
            'fork',
            'receipt',
            'step',
            'ur_ingredients',
            'ur_foodies',
            'foodies',
            'units'
        ));
    }

    public function postReceipt(Request $request){
        if(!$request->ajax()){
            return false;
        }
    }

    public function postAddIngredient(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $ingredient = $this->ingredientRepository->createIngredient($request);
        $userReceiptIngredient = $this->userReceiptIngredientRepository->createUserReceiptIngredient($request, $ingredient->id);
        $data["name"] = $ingredient->name;
        $data["unit"] = $ingredient->unit['name'];
        $data["qty"] = $userReceiptIngredient->quantity;
        $data["note"] = $userReceiptIngredient->note;
        $data["idIngre"] = $userReceiptIngredient->ingredient_id;
        $data["idRecIngre"] = $userReceiptIngredient->id;
        $data["idReceipt"] = $userReceiptIngredient->user_receipt_id;
        $data['fork'] = 'fork';

        return response($data);
    }

    public function postEditIngredient(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $this->ingredientRepository->updateIngreUser($request);
        $this->userReceiptIngredientRepository->updateUserReceiptIngredient($request);

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
        $response = $this->userReceiptStepRepository->createUserReceiptStep($request);
        $response['fork'] = 'fork';

        return response($response);
    }

    public function postEditStep(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $recStep = $this->userReceiptStepRepository->updateUserReceiptStep($request);

        return response($recStep);
    }

    public function postDelStep(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $recStep = $this->userReceiptStepRepository->delete($request->idRecStep);
        return response($recStep);
    }

    public function postReceiptCate(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        parse_str($request->data, $body);
        $getID = $this->userReceiptFoodyRepository->getReceiptForkId($request->idReceipt);
        if ($getID) {
            $getID->delete();
        }
        foreach ($body as $key => $value) {
            for ($i = 0; $i <= count($value); $i++) {
                $this->userReceiptFoodyRepository->create([
                    'user_receipt_id' => $request->idReceipt,
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
    }

    public function cancelReceipt(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $this->userReceiptRepository->getId($request->id)->delete();

        return 'Xóa fork thành công';
    }
}
