<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /*cash on delivery*/
    public function cashOnDelivery()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $data = Cart::where('user_id', $user_id)->get();

        foreach ($data as $item) {
            $order = new Order;
            $order->user_id = $user_id;
            $order->name = $item->name;
            $order->email = $item->email;
            $order->phone = $item->phone;
            $order->address = $item->address;
            $order->product_id = $item->product_id;
            $order->product_name = $item->product_name;
            $order->product_quantity = $item->product_quantity;
            $order->product_price = $item->product_price;
            $order->photo = $item->photo;
            $order->payment_status = 'Cash On Delivery';
            $order->delivery_status = 'Processing';

            $order->save();
            $cart_id = $item->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with(['type' => 'success', 'message' => 'Order  success']);
    }

    /*card on delivery*/
    public function stripe($totalPrice)
    {
        $totalPrice = base64_decode($totalPrice);

        return view('home.payment.stripe', compact('totalPrice'));
    }

    /*order function*/
    public function order()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('admin.order.order', compact('orders'));
    }

    /*delivered*/
    public function delivered($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delivery_status = 'Delivered';
            $order->payment_status = 'Paid';
            $order->save();
            return redirect()->back()->with(['type' => 'success', 'message' => 'Order Delivered success']);
        } else {
            return redirect()->back();
        }
    }

    /*pdf*/
    public function pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf.pdf', compact('order'));
        return $pdf->download('details.pdf');
    }

    /*mailView*/
    public function mailView($id)
    {
        $order = Order::find($id);
        if ($order) {
            return view('admin.email.email',compact('order'));
        } else {
            return redirect()->back();
        }
    }
    /*mail*/
    public function mail(Request $request, $id)
    {
        $order = Order::find($id);
        $email = $order->email;
        $status = $order->payment_status;
        $data = [
            'greeting'=>$request->greeting,
            'subject'=>$request->subject,
            'text'=>$request->message,
            'status'=> $status,
            'email'=>$email
        ];


        $user['to'] = $email;
        $user['subject'] = $data['subject'];
        Mail::send('admin.email.send-mail',$data,function ($message) use ($user){
            $message->to($user['to']);
            $message->subject($user['subject']);
        });

        return redirect()->back()->with(['message'=>'Mail send success','type'=>'success']);

    }


}
