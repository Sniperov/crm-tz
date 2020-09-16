<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderTask;
use App\Payment;
use App\Service;
use App\User;
use App\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function indexHistory()
    {
        return view('history', ['payments' => Payment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()]);
    }

    public function indexAddBalance()
    {
        return view('addBalance');
    }

    public function addBalance(Request $request)
    {
        $payment = new Payment();
        $payment->type = 'Пополнение баланса';
        $payment->value = $request->input('value');
        $payment->description = "Пополнение баланса";
        $payment->user_id = Auth::user()->id;
        $payment->save();

        $user = User::find(Auth::user()->id);
        $user->balance =$user->balance + $request->input('value');
        $user->update();

        return redirect('/home');
    }

    public function buyService(Request $request)
    {
        $service = Service::find($request->input('serviceId'));

        if (Auth::user()->balance - $service->price < 0) return back()->with('alert', "У вас не достаточно средств");

        $payment = new Payment();
        $payment->type = 'Оплата услуги';
        $payment->value = $service->price;
        $payment->description = "Покупка услуги" . ": " . $service->name;
        $payment->user_id = Auth::user()->id;
        $payment->save();

        $user = User::find(Auth::user()->id);
        $user->balance =$user->balance - $service->price;
        $user->update();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->service_id = $request->input('serviceId');
        $order->save();

        foreach ($service->tasks as $task)
        {
            $orderTask = new OrderTask();
            $orderTask->order_id = $order->id;
            $orderTask->task_id = $task->id;
            $orderTask->save();
        }

        return redirect('/services');
    }
}
