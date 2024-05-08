<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Orders_Items;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    // User

    // Wyświetlanie wszystkich zamówień
    public function index()
    {
        $orders = Orders::all();
        return response()->json($orders);
    }

    // Złożenie zamówienia
    public function create(Request $request)
    {
        $order = new Orders();
        $order->user_id = $request->input('user_id');
        $order->address_id = $request->input('address_id');
        $order->total_price = $request->input('total_price');
        $order->order_status = $request->input('order_status');
        $order->delivery_track = $request->input('delivery_track');
        $order->save();

        // Dodawanie pozycji zamówienia
        foreach ($request->input('items') as $item) {
            $orderItem = new Orders_Items();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->unit_price = $item['unit_price'];
            $orderItem->save();
        }

        return response()->json($order);
    }

    // Admin

    // Modyfikacja zamówienia
    public function update(Request $request, $id)
    {
        $order = Orders::findOrFail($id);
        $order->user_id = $request->input('user_id');
        $order->address_id = $request->input('address_id');
        $order->total_price = $request->input('total_price');
        $order->order_status = $request->input('order_status');
        $order->delivery_track = $request->input('delivery_track');
        $order->save();

        Orders_Items::where('order_id', $id)->delete();

        foreach ($request->input('items') as $item) {
            $orderItem = new Orders_Items();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->unit_price = $item['unit_price'];
            $orderItem->save();
        }

        return response()->json($order);
    }

    // Anulowanie zamówienia - Usuwanie
    public function destroy($id)
    {
        $order = Orders::destroy($id);
        return response()->json($order);
    }

    // Wyszukanie zamówienia
    public function find($id)
    {
        $order = Orders::findOrFail($id);
        return response()->json($order);
    }
}
?>