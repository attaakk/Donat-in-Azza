<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('id', 'desc')->get();
        // Get orders with user and menu details
        $ordersRaw = Order::with(['user', 'menu'])->orderBy('created_at', 'desc')->get();
        
        $orders = $ordersRaw->map(function($order) {
            return [
                'id' => $order->invoice_id,
                'date' => $order->created_at->format('Y-m-d\TH:i:s'),
                'customer' => $order->user->name,
                'wa' => $order->user->phone_number ?? '0800000000',
                'product' => $order->menu->name,
                'qty' => $order->quantity,
                'size' => $order->size,
                'total' => $order->total_price,
                'method' => $order->service_type,
                'notes' => $order->notes ?? '-',
                'status' => $order->status,
                'db_id' => $order->id, // Real database ID
            ];
        });

        // Format menus to match JS structure
        $menusFormatted = $menus->map(function($menu) {
            return [
                'id' => $menu->id,
                'name' => $menu->name,
                'desc' => $menu->description,
                'basePrice' => $menu->base_price,
                'extraPrice' => $menu->extra_price,
                'img' => $menu->image_path,
            ];
        });

        $appData = [
            'menus' => $menusFormatted,
            'orders' => $orders
        ];

        return view('dashboard_admin', compact('appData'));
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'basePrice' => 'required|integer',
            'extraPrice' => 'required|integer',
            'img' => 'required|string' // base64 or emoji
        ]);

        $menu = Menu::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'description' => $request->desc,
                'base_price' => $request->basePrice,
                'extra_price' => $request->extraPrice,
                'image_path' => $request->img,
            ]
        );

        return response()->json(['success' => true, 'menu' => $menu]);
    }

    public function destroyMenu($id)
    {
        Menu::destroy($id);
        return response()->json(['success' => true]);
    }

    public function updateOrderStatus(Request $request, $id)
    {
        // the ID passed here is the invoice_id because that's what the JS uses
        $order = Order::where('invoice_id', $id)->firstOrFail();
        $order->status = $request->status;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function destroyOrder($id)
    {
        // the ID passed here is the invoice_id
        Order::where('invoice_id', $id)->delete();
        return response()->json(['success' => true]);
    }
}
