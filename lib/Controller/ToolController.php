<?php

namespace OCA\ToolTracker\Controller;

use OCP\IRequest;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCA\ToolTracker\Service\ToolService;

class ToolController extends Controller {
	
	private $toolService;

	public function __construct($AppName, IRequest $request, ToolService $toolService){
		parent::__construct($AppName, $request);
		$this->toolService = $toolService;
	}

    /**
     * Affiche la liste des outils.
     */
    public function index() {
        // Récupérez la liste des outils depuis la base de données (à implémenter)
        $tools = $this->toolService->findAll();
        return new TemplateResponse('tooltracker', 'listtools', ['tools' => $tools]);
    }

    /**
     * Affiche le formulaire pour ajouter un nouvel outil.
     */
    public function add() {
        return new TemplateResponse('tooltracker', 'addtool');
    }

    /**
     * Sauvegarde un nouvel outil dans la base de données.
     */
    public function save($name, $description) {
        // Sauvegardez l'outil dans la base de données (à implémenter)
		$this->toolService->create($name, $description);
        return $this->index();
    }

    /**
     * Affiche le formulaire pour modifier un outil existant.
     */
    public function edit($id) {
        // Récupérez les détails de l'outil depuis la base de données (à implémenter)
        $tool = $this->toolService->find($id);
        return new TemplateResponse('tooltracker', 'edittool', ['tool' => $tool]);
    }

    /**
     * Met à jour un outil dans la base de données.
     */
    public function update($id, $name, $description) {
        // Mettez à jour l'outil dans la base de données (à implémenter)
		$this->toolService->update($id, $name, $description);
        return $this->index();
    }

    /**
     * Supprime un outil de la base de données.
     */
    public function delete($id) {
        // Supprimez l'outil de la base de données (à implémenter)
		$this->toolService->delete($id);
        return $this->index();
    }

    /**
     * Affiche la page de confirmation de suppression pour un outil.
     */
    public function confirmDelete($id) {
        // Récupérez les détails de l'outil depuis la base de données (à implémenter)
        $tool = $this->toolService->find($id);
        return new TemplateResponse('tooltracker', 'deletetool', ['tool' => $tool]);
    }
	
	public function scan() {
		return new TemplateResponse('tooltracker', 'scan');
	}

	public function updateStatus($id) {
		$currentUser = \OC::$server->getUserSession()->getUser();
		$tool = $this->toolService->find($id);

		if ($tool['status'] === 'available') {
			$this->toolService->updateToolStatus($id, 'borrowed', $currentUser->getUID());
		} else {
			$this->toolService->updateToolStatus($id, 'available', null);
		}

		return new JsonResponse(['status' => 'success']);
	}

}
