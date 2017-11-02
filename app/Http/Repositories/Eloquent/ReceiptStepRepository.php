<?php
namespace App\Repositories\Eloquent;

use App\Models\ReceiptStep;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;

class ReceiptStepRepository extends Repository implements ReceiptStepRepositoryInterface{

    public function model()
    {
        return ReceiptStep::class;
    }

    public function getReceiptId($id)
    {
        return $this->model->where('receipt_id', $id);
    }

    public function createReceiptStep($request)
    {
        $file_name = $request->file('image')->getClientOriginalName();
        $response = $this->model->create([
            'content' => $request->content,
            'image' => $file_name,
            'receipt_id' => $request->idReceipt,
            'step' => $request->step
        ]);
        $request->file('image')->move('upload/images/',$file_name);
        return $response;
    }

    public function updateReceiptStep($request)
    {
        $recStep = $this->model->find($request->idReceipt);
        if($request->file('image') == null){
            $recStep->content = $request->content;
            $recStep->save();
            return $recStep;
        }
        $file_name = $request->file('image')->getClientOriginalName();
        $recStep->content = $request->content;
        $recStep->image = $file_name;
        $recStep->step = $request->step;
        $request->file('image')->move('upload/images/', $file_name);
        $recStep->save();
    }
}
