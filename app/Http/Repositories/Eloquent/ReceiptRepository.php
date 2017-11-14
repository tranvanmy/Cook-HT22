<?php
namespace App\Repositories\Eloquent;

use App\Models\Receipt;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use Auth,DB;

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

    public function getId($id)
    {
        return $this->model->where('id', $id);
    }

    public function editStatus($request)
    {
        $receipt = $this->model->find($request->id);
        $receipt->status = $request->status;
        $receipt->save();

        return $receipt;
    }

    public function getAllReceipt($with = [], $select = ['*'],$status = [], $paginate = 16)
    {
        $receipt = $this->model->select($select)
            ->with($with)->whereIn('status', $status)->paginate($paginate);

              return $receipt;
    }

    public function searchNormal($keyword)
    {
        return $this->model
            ->where('name', 'LIKE', $keyword)
            ->orWhere('description', 'LIKE', $keyword)
            ->where('status', config('const.Active'))
            ->paginate(16)->setPath("");
    }

    public function searchByAjax($keyword)
    {
        return $this->model->select('id','name', 'image')
            ->where('name', 'LIKE', $keyword)
            ->orWhere('description', 'LIKE', $keyword)
            ->where('status', config('const.Active'))
            ->take(8)->OrderByDESC('id')->get();
    }

    public function slider()
    {
        return $this->model->orderByRaw('RAND()')->where('status', config('const.Active'))->take(8)->get();
    }

    public function _6newReceipt()
    {
        return $this->model->where('status', config('const.Active'))->orderBy('id','DESC')->take(6)->get();
    }

    public function topChef($count)
    {
        return $this->model->select('user_id', DB::raw('COUNT(id) as count'))
            ->groupBy('user_id')
            ->orderBy('count','DESC')
            ->where('status', config('const.Active'))
            ->take($count)
            ->get();
    }

    public function top5Receipt($value, $count)
    {
        return $this->model->where('rate_point','>=', $value)->OrderByDESC('rate_point')->take($count)->get();
    }
}
