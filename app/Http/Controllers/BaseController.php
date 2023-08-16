<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
  protected $model;
  protected $userId = 0;

  public function __construct($model)
  {
      $this->model = $model;
      $this->userId = Auth::id();
  }

  public function index()
  {
    try {
      $items = $this->get();
      return response()->json($items);
    } catch (\Exception $e) {
      return $this->respondError($e->getMessage());
    }
  }

  public function show($id)
  {
    try {
      $item = $this->model::findOrFail($id);
      return response()->json($item);
    } catch (\Exception $e) {
      return $this->respondError($e->getMessage());
    }
  }

  public function store(Request $request)
  {
    try {
      $item = $this->model::create($request->all());
      return response()->json($item, 201);
    } catch (\Exception $e) {
      return $this->respondError($e->getMessage());
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $item = $this->model::findOrFail($id);
      $item->update($request->all());
      return response()->json($item);
    } catch (\Exception $e) {
      return $this->respondError($e->getMessage());
    }
  }

  public function destroy($id)
  {
    try {
      $item = $this->model::findOrFail($id);
      $item->delete();
      return response()->json(null, 204);
    } catch (\Exception $e) {
      return $this->respondError($e->getMessage());
    }
  }

  protected function respondSuccess($data = [], $message = 'Operación exitosa')
  {
    return response()->json(['success' => true, 'message' => $message, 'data' => $data]);
  }

  protected function respondError($message = 'Error en la operación', $status = 400)
  {
    return response()->json(['success' => false, 'message' => $message], $status);
  }
}
