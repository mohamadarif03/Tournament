<?php

namespace App\Traits\Datatables;

use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait TournamentDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function TournamentMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->setFilteredRecords(250)
            ->editColumn('live_image_url', function ($data) {
                return view('pages.dashboard.tournament.datatables.live_image_url', compact('data'));
            })
            ->editColumn('completed_at', function ($data) {
                return Carbon::parse($data->completed_at)->isoFormat('DD MMMM YYYY');
            })
            ->editColumn('price_pool', function ($data) {
                $formattedPrice = number_format($data->price_pool, 0, ',', '.');
                return 'Rp ' . $formattedPrice;
            })            
            ->editColumn('slot', function ($data) {
                return $data->slot. ' Slot';
            })            
            ->editColumn('action', function ($data) {
                return view('pages.dashboard.tournament.datatables.action', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
