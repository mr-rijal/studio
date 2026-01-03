<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFamilyAddressRequest;
use App\Http\Requests\UpdateFamilyAddressRequest;
use App\Models\Family;
use App\Models\FamilyAddress;
use App\Services\FamilyAddressService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FamilyAddressController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected FamilyAddressService $familyAddressService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filters = [
            'search' => $request->get('search'),
            'family_id' => $request->get('family_id'),
        ];

        $familyAddresses = $this->familyAddressService->paginate($filters, 15)
            ->withQueryString();

        $families = Family::orderBy('id')->get();

        return view('tenant.family-addresses.index', compact('familyAddresses', 'families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $familyAddress = null;
        $families = Family::orderBy('id')->get();

        return view('tenant.family-addresses.form', compact('familyAddress', 'families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamilyAddressRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->familyAddressService->create($data);

        return redirect()
            ->route('family-addresses.index')
            ->with('success', 'Family address created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyAddress $familyAddress): View
    {
        $familyAddress = $this->familyAddressService->findById($familyAddress->id);

        if (! $familyAddress) {
            abort(404);
        }

        return view('tenant.family-addresses.show', compact('familyAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyAddress $familyAddress): View
    {
        $familyAddress = $this->familyAddressService->findById($familyAddress->id);

        if (! $familyAddress) {
            abort(404);
        }

        $families = Family::orderBy('id')->get();

        return view('tenant.family-addresses.form', compact('familyAddress', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyAddressRequest $request, FamilyAddress $familyAddress): RedirectResponse
    {
        $data = $request->validated();

        $this->familyAddressService->update($familyAddress, $data);

        return redirect()
            ->route('family-addresses.index')
            ->with('success', 'Family address updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyAddress $familyAddress): RedirectResponse
    {
        $this->familyAddressService->delete($familyAddress);

        return redirect()
            ->route('family-addresses.index')
            ->with('success', 'Family address deleted successfully.');
    }

    /**
     * Bulk delete family addresses.
     */
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:family_addresses,id'],
        ]);

        $count = $this->familyAddressService->bulkDelete($request->ids);

        return redirect()
            ->route('family-addresses.index')
            ->with('success', "{$count} family address(es) deleted successfully.");
    }
}
