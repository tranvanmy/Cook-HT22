<?php
namespace App\Repositories\Eloquent;

use App\Models\Receipt;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use Auth;
class ReceiptRepository extends Repository implements ReceiptRepositoryInterface{

	public function model()
	{
		return Receipt::class;
	}

	public function createReceipt($request)
    {
	    $file_name = $request->file('image')->getClientOriginalName();
	    $request->file('image')->move(config('custom.image.url'), $file_name);
        $receipt = $this->model->create([
            'name' => $request->name,
	        'time' => $request->time,
	        'ration' => $request->ration,
	        'complex' => $request->complex,
	        'description' => $request->description,
	        'image' => $file_name,
	        'status' => config('const.notYet'),
	        'user_id' => Auth::user()->id
        ]);

        return $receipt;
    }

    public function editReceipt($request)
    {
    	$receipt = $this->model->find($request->id);
        if ($request->file("image") != null) {
    		$file_name = $request->file('image')->getClientOriginalName();
        	$request->file('image')->move(config('custom.image.url'), $file_name);
        	$receipt->image = $file_name;
        } 
        $receipt->name = $request->name;
        $receipt->time = $request->time;
        $receipt->ration = $request->ration;
        $receipt->complex = $request->complex;
        $receipt->description = $request->description;
        $receipt->save();
        return $receipt;
    }

	public function getUserId($id)
	{
		return $this->model->where('user_id',$id);
	}

	public function getStatus($value)
	{
		return $this->model->where('status', $value);
	}
}
