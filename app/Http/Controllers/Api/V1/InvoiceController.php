<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\V1\InvoiceCollection;
use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\InvoiceResource;
use App\Filters\V1\InvoicesFilter;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoicesFilter();
        $filterItems = $filter->transform($request);

        if (is_countable($filterItems) && count($filterItems) == 0) {
            return new InvoiceCollection(Invoice::paginate());
        } else {
            $invoices = Invoice::where($filterItems)->paginate();

            return new InvoiceCollection($invoices->appends($request->query()));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
