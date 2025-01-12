<?php

namespace App\Http\Controllers;

use App\DTOs\ClassificationDTO;
use App\Http\Requests\ClassificationRequest;
use App\Models\Classification;
use App\Services\ClassificationService;
use Throwable;

class ClassificationController extends Controller
{
    public function __construct(
        private readonly ClassificationService $service
    )
    {
    }


    public function index()
    {
        return view('pages.classification.index', [
            'classifications' => Classification::paginate(10)
        ]);

    }

    public function create()
    {
        return view('pages.classification.create');
    }

    public function store(ClassificationRequest $request)
    {
        try {
            $this->service->store(ClassificationDTO::fromRequest($request));
            return redirect()->route('classification.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function edit(Classification $classification)
    {
        return view('pages.classification.edit', compact('classification'));
    }

    public function update(ClassificationRequest $request, Classification $classification)
    {
        try {
            $this->service->update(ClassificationDTO::fromRequest($request), $classification);
            return redirect()->route('classification.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }

    public function destroy(Classification $classification)
    {
        try {
            $this->service->destroy($classification);
            return redirect()->route('classification.index');
        } catch (Throwable $exception) {
            return back()->withInput()->withErrors($exception->getMessage());
        }
    }
}
