<?php

namespace App\Repositories\Eloquent;

use App\Models\UserReceipt;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserReceiptRepositoryInterface;
use App\Repositories\Contracts\UserReceiptIngredientRepositoryInterface;
use App\Repositories\Contracts\UserReceiptStepRepositoryInterface;
use App\Repositories\Contracts\UserReceiptFoodyRepositoryInterface;
use App\Repositories\Contracts\ReceiptIngredientRepositoryInterface;
use App\Repositories\Contracts\ReceiptFoodyRepositoryInterface;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;

class UserReceiptRepository extends Repository implements UserReceiptRepositoryInterface
{
    private $userReceiptIngredientRepository;
    private $userReceiptFoodyRepository;
    private $userReceiptStepRepository;
    private $receiptIngredientRepository;
    private $receiptStepRepository;
    private $receiptFoodyRepository;

    public function __construct(
        UserReceiptFoodyRepositoryInterface $userReceiptFoodyRepository,
        UserReceiptStepRepositoryInterface $userReceiptStepRepository,
        UserReceiptIngredientRepositoryInterface $userReceiptIngredientRepository,
        ReceiptIngredientRepository $receiptIngredientRepository,
        ReceiptFoodyRepositoryInterface $receiptFoodyRepository,
        ReceiptStepRepository $receiptStepRepository
    )
    {
        $this->receiptIngredientRepository = $receiptIngredientRepository;
        $this->userReceiptIngredientRepository = $userReceiptIngredientRepository;
        $this->receiptStepRepository = $receiptStepRepository;
        $this->userReceiptStepRepository = $userReceiptStepRepository;
        $this->receiptFoodyRepository = $receiptFoodyRepository;
        $this->userReceiptFoodyRepository = $userReceiptFoodyRepository;
    }
    public function model()
    {
        return UserReceipt::class;
    }

    public function getId($id)
    {
        return UserReceipt::where('id', $id);
    }

    public function findFork($assign_id, $receipt_id)
    {
        return UserReceipt::where('user_id', $assign_id)->where('receipt_id', $receipt_id);
    }

    public function fork($request,$receipt)
    {
        $user_receipt = UserReceipt::create([
            'user_id' => $request->assign_id,
            'receipt_id' => $request->receipt_id
        ]);
        $receipt_ingredients = $this->receiptIngredientRepository->getReceiptId($request->receipt_id)->get();
        $this->userReceiptIngredientRepository->forkIngredient($receipt_ingredients,$user_receipt->id);

        $receipt_foody = $this->receiptFoodyRepository->getReceiptId($request->receipt_id)->get();
        $this->userReceiptFoodyRepository->forkFoody($receipt_foody, $user_receipt->id);

        $receipt_step = $this->receiptStepRepository->getReceiptId($request->receipt_id)->get();
        $this->userReceiptStepRepository->forkStep($receipt_step, $user_receipt->id);

        return $user_receipt;
    }

    public function getByAssignId($id)
    {
        return UserReceipt::where('user_id', $id);
    }
}
