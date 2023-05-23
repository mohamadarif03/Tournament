<?php

namespace App\Traits\Datatables;

use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

trait TeamDatatable
{

    /**
     * Datatable mockup for customers
     *
     * @param mixed $collection
     *
     * @return JsonResponse
     * @throws Exception
     */

    public function TeamMockup(mixed $collection): JsonResponse
    {
        return DataTables::of($collection)
            ->addIndexColumn()
            ->setFilteredRecords(250)
            ->editColumn('logo', function ($data) {
                return view('pages.dashboard.team.datatables.logo', compact('data'));
            })
            // ->editColumn('status', function ($data) {
            //     return view('dashboard.pages.articles.datatables.status', compact('data'));
            // })
            ->editColumn('action', function ($data) {
                return view('pages.dashboard.team.datatables.action', compact('data'));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
