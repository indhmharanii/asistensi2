<?php

namespace App\Http\Controllers;

use App\Models\HotelRoom;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    public function index()
    {
        return response()->json(
            HotelRoom::with('roomType')->get()
        );
    }

    public function store(Request $request)
    {
        $hotelRoom = HotelRoom::create($request->all());

        return response()->json($hotelRoom, 201);
    }

    public function show(string $id)
    {
        return response()->json(
            HotelRoom::with('roomType')->findOrFail($id)
        );
    }

    public function update(Request $request, string $id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);

        $hotelRoom->update($request->all());

        return response()->json($hotelRoom);
    }

    public function destroy(string $id)
    {
        HotelRoom::destroy($id);

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ]);
    }
}