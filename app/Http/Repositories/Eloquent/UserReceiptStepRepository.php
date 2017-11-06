<?php

namespace App\Repositories\Eloquent;

use App\Models\UserReceiptStep;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserReceiptStepRepositoryInterface;

class UserReceiptStepRepository extends Repository implements UserReceiptStepRepositoryInterface
{

    public function model()
    {
        return UserReceiptStep::class;
    }

    public function getReceiptForkId($id)
    {
        return $this->model->where('user_receipt_id', $id);
    }

    public function forkStep($receipt_steps, $user_receipt_id)
    {
        foreach($receipt_steps as $receipt_step)
        {
             $arrSteps = [];
             $arrSteps = array_add($arrSteps, 'user_receipt_id', $user_receipt_id);
             $arrSteps = array_add($arrSteps, 'image', $receipt_step->image);
             $arrSteps = array_add($arrSteps, 'content', $receipt_step->content);
             $arrSteps = array_add($arrSteps, 'step', $receipt_step->step);

             $this->model->create($arrSteps);
        }
    }

    public function createUserReceiptStep($request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $response = $this->model->create([
            'content' => $request->content,
            'image' => $file_name,
            'user_receipt_id' => $request->idReceipt,
            'step' => $request->step
        ]);
        $request->file('image')->move(config('custom.image.url'),$file_name);

        return $response;
    }

    public function updateUserReceiptStep($request)
    {
        $recStep = $this->model->find($request->idRecStep);
        if($request->file('image') == null){
            $recStep->content = $request->content;
            $recStep->save();
            return $recStep;
        }
        $file_name = $request->file('image')->getClientOriginalName();
        $recStep->content = $request->content;
        $recStep->image = $file_name;
        $recStep->step = $request->step;
        $request->file('image')->move(config('custom.image.url'), $file_name);
        $recStep->save();
    }
}
