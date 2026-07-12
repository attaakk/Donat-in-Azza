<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('dashboard_donatinazza', compact('menus'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'required|integer',
            'service_type' => 'required|string',
            'notes' => 'nullable|string',
            'phone_number' => 'nullable|string'
        ]);

        $menu = Menu::find($request->menu_id);
        $totalPrice = ($menu->base_price + ($menu->extra_price * $request->size)) * $request->quantity;

        // Generate Invoice ID
        $lastOrder = Order::orderBy('id', 'desc')->first();
        $nextId = $lastOrder ? $lastOrder->id + 1 : 1;
        $invoiceId = 'INV-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        Order::create([
            'invoice_id' => $invoiceId,
            'user_id' => Auth::id(),
            'menu_id' => $menu->id,
            'quantity' => $request->quantity,
            'size' => $request->size,
            'total_price' => $totalPrice,
            'service_type' => $request->service_type,
            'notes' => $request->notes,
            'status' => 'Proses'
        ]);

        if ($request->filled('phone_number')) {
            $user = Auth::user();
            $user->phone_number = $request->phone_number;
            $user->save();
        }

        return redirect()->route('customer.dashboard')->with('success_profile', 'Pesanan berhasil dibuat!');
    }
}
