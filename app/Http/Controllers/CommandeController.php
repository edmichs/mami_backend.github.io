<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Repositories\CommandeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CommandeController extends AppBaseController
{
    /** @var  CommandeRepository */
    private $commandeRepository;

    public function __construct(CommandeRepository $commandeRepo)
    {
        $this->commandeRepository = $commandeRepo;
    }

    /**
     * Display a listing of the Commande.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $commandes = $this->commandeRepository->all();

        return view('commandes.index')
            ->with('commandes', $commandes);
    }

    /**
     * Show the form for creating a new Commande.
     *
     * @return Response
     */
    public function create()
    {
        return view('commandes.create');
    }

    /**
     * Store a newly created Commande in storage.
     *
     * @param CreateCommandeRequest $request
     *
     * @return Response
     */
    public function store(CreateCommandeRequest $request)
    {
        $input = $request->all();

        $commande = $this->commandeRepository->create($input);

        Flash::success('Commande saved successfully.');

        return redirect(route('commandes.index'));
    }

    /**
     * Display the specified Commande.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $commande = $this->commandeRepository->find($id);

        if (empty($commande)) {
            Flash::error('Commande not found');

            return redirect(route('commandes.index'));
        }

        return view('commandes.show')->with('commande', $commande);
    }

    /**
     * Show the form for editing the specified Commande.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $commande = $this->commandeRepository->find($id);

        if (empty($commande)) {
            Flash::error('Commande not found');

            return redirect(route('commandes.index'));
        }

        return view('commandes.edit')->with('commande', $commande);
    }

    /**
     * Update the specified Commande in storage.
     *
     * @param int $id
     * @param UpdateCommandeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommandeRequest $request)
    {
        $commande = $this->commandeRepository->find($id);

        if (empty($commande)) {
            Flash::error('Commande not found');

            return redirect(route('commandes.index'));
        }

        $commande = $this->commandeRepository->update($request->all(), $id);

        Flash::success('Commande updated successfully.');

        return redirect(route('commandes.index'));
    }

    /**
     * Remove the specified Commande from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $commande = $this->commandeRepository->find($id);

        if (empty($commande)) {
            Flash::error('Commande not found');

            return redirect(route('commandes.index'));
        }

        $this->commandeRepository->delete($id);

        Flash::success('Commande deleted successfully.');

        return redirect(route('commandes.index'));
    }
}
