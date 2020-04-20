<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Repositories\CommandeRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ClientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Client;
use Flash;
use Response;
use DB;

class CommandeController extends AppBaseController
{
    /** @var  CommandeRepository */
    private $commandeRepository;
    /** @var  ProductRepository */
    private $productRepository;
     /** @var  ClientRepository */
     private $clientRepository;

    public function __construct(CommandeRepository $commandeRepo, 
                                ProductRepository $productRepository,
                                ClientRepository $clientRepository)
    {
        $this->commandeRepository = $commandeRepo;
        $this->productRepository = $productRepository;
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
       $number = count($this->commandeRepository->all()) + 1;
       $numero_commande = mt_rand(1000, 100000) + $number;
       $products = $this->productRepository->all();
        return view('commandes.create', compact('numero_commande', 'products'));
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
        DB::beginTransaction();
        //try {
            $inputClient = $request->only('lastname','firstname','email', 'telephone');
            $client = Client::whereEmail($request->get('email'))->first();
            if(!$client){
                $client = $this->clientRepository->create($inputClient);
            }
            $commande = $this->commandeRepository->create([
                'client_id' => $client->id,
                'numero_commande' => $request->get('numero_commande')
            ]);
            $i = 0;
            foreach ($request->get('products') as $product) {
                
                $commande->products()->attach($product, [
                    'prix_unit' => $request->get('prix_unit')[$i],
                    'quantity' => $request->get('quantity')[$i]
                     ]);
                $i++; 
            }
            

            Flash::success('Commande saved successfully.');
            DB::commit();
            return redirect(route('commandes.index'));
        // } catch (\Throwable $th) {
        //  Flash::error('Error save commande.');

        //     DB::rollback();
        //     return  redirect()->back()->withInput();
        // }
       
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
        $products = $this->productRepository->all();
        if (empty($commande)) {
            Flash::error('Commande not found');

            return redirect(route('commandes.index'));
        }

        return view('commandes.edit', compact("commande","products"));
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
