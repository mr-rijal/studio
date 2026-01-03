<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Branch;
use App\Services\BranchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BranchController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected BranchService $branchService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filters = [
            'search' => $request->get('search'),
            'status' => $request->get('status'),
        ];

        $branches = $this->branchService->paginate($filters, 15)
            ->withQueryString();

        return view('tenant.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $branch = null;

        return view('tenant.branches.form', compact('branch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? (bool) $request->status : true;

        $this->branchService->create($data);

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch): View
    {
        $branch = $this->branchService->findById($branch->id);

        if (! $branch) {
            abort(404);
        }

        return view('tenant.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch): View
    {
        $branch = $this->branchService->findById($branch->id);

        if (! $branch) {
            abort(404);
        }

        return view('tenant.branches.form', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, Branch $branch): RedirectResponse
    {
        $data = $request->validated();

        if ($request->has('status')) {
            $data['status'] = (bool) $request->status;
        }

        $this->branchService->update($branch, $data);

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch): RedirectResponse
    {
        $this->branchService->delete($branch);

        return redirect()
            ->route('branches.index')
            ->with('success', 'Branch deleted successfully.');
    }

    /**
     * Bulk delete branches.
     */
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:branches,id'],
        ]);

        $count = $this->branchService->bulkDelete($request->ids);

        return redirect()
            ->route('branches.index')
            ->with('success', "{$count} branch(s) deleted successfully.");
    }
}
