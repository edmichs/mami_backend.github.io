<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecetteRequest;
use App\Http\Requests\UpdateRecetteRequest;
use App\Repositories\RecetteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class RecetteController extends AppBaseController
{
    /** @var  RecetteRepository */
    private $recetteRepository;

    public function __construct(RecetteRepository $recetteRepo)
    {
        $this->recetteRepository = $recetteRepo;
    }

    /**
     * Display a listing of the Recette.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $recettes = $this->recetteRepository->all();

        return view('recettes.index')
            ->with('recettes', $recettes);
    }

    /**
     * Show the form for creating a new Recette.
     *
     * @return Response
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Store a newly created Recette in storage.
     *
     * @param CreateRecetteRequest $request
     *
     * @return Response
     */
    public function store(CreateRecetteRequest $request)
    {
        $input = $request->all();

        $recette = $this->recetteRepository->create($input);

        Flash::success('Recette saved successfully.');

        return redirect(route('recettes.index'));
    }

    /**
     * Display the specified Recette.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recette = $this->recetteRepository->find($id);

        if (empty($recette)) {
            Flash::error('Recette not found');

            return redirect(route('recettes.index'));
        }

        return view('recettes.show')->with('recette', $recette);
    }

    /**
     * Show the form for editing the specified Recette.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recette = $this->recetteRepository->find($id);

        if (empty($recette)) {
            Flash::error('Recette not found');

            return redirect(route('recettes.index'));
        }

        return view('recettes.edit')->with('recette', $recette);
    }

    /**
     * Update the specified Recette in storage.
     *
     * @param int $id
     * @param UpdateRecetteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecetteRequest $request)
    {
        $recette = $this->recetteRepository->find($id);

        if (empty($recette)) {
            Flash::error('Recette not found');

            return redirect(route('recettes.index'));
        }

        $recette = $this->recetteRepository->update($request->all(), $id);

        Flash::success('Recette updated successfully.');

        return redirect(route('recettes.index'));
    }

    /**
     * Remove the specified Recette from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recette = $this->recetteRepository->find($id);

        if (empty($recette)) {
            Flash::error('Recette not found');

            return redirect(route('recettes.index'));
        }

        $this->recetteRepository->delete($id);

        Flash::success('Recette deleted successfully.');

        return redirect(route('recettes.index'));
    }
}
