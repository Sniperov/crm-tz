<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderTask;
use App\Service;
use App\Task;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function indexServices()
    {
        return view('service', ['services' => Service::all()]);
    }

    public function singleService($id)
    {
        $service = Service::where('id', $id)->with('tasks')->first();
        return view('singleService', ['service' => $service]);
    }

    public function indexActive()
    {
        $services = Order::where('user_id', Auth::user()->id)->with('service')->get();
        return view('activeService', ["services" => $services]);
    }

    public function singleActive($id)
    {
        $order = Order::where('id', $id)->with('service')->first();
        if ($order->user_id != Auth::user()->id) return back();
        $orderTasks = OrderTask::where('order_id', $order->id)->with('task')->get();
        return view('singleActive', ['order' => $order->service,
                                        'orderTasks' => $orderTasks]);
    }

    public function indexAddService()
    {
        return view('addService', ['tasks' => Task::all()]);
    }

    public function indexEditService($id)
    {
        return view('editService', ['tasks' => Task::all(),
                                        'service' => Service::find($id)]);
    }

    public function addService(Request $request)
    {
        $tasks = Task::whereIn('id', $request->input('tasksId'))->get();
        $service = new Service();
        $service->name = $request->input('name');
        $service->description = $request->input('description');

        $price = 0;

        foreach ($tasks as $task){
            $price = $price + $task->price;
        }

        $service->price = $price;
        $service->save();

        $service->tasks()->attach($request->input('tasksId'));

        return redirect('/services');
    }

    public function editService(Request $request, $id)
    {
        $tasks = Task::whereIn('id', $request->input('tasksId'))->get();

        $service = Service::find($id);
        $service->name = $request->input('name');
        $service->description = $request->input('description');

        $price = 0;

        foreach ($tasks as $task){
            $price = $price + $task->price;
        }

        $service->price = $price;
        $service->update();

        $service->tasks()->sync($request->input('tasksId'));

        return redirect('/services');
    }
}
