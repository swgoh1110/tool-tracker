<?php

namespace OCA\ToolTracker\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\Bootstrap\IBootstrap;
use OCP\AppFramework\Bootstrap\IBootContext;
use OCP\INavigationManager;
use OCP\AppFramework\Bootstrap\IRegistrationContext;

class Application extends App implements IBootstrap {
    public function __construct(array $urlParams = []) {
        parent::__construct('tooltracker', $urlParams);
    }

    public function boot(\OCP\AppFramework\Bootstrap\IBootContext $context): void {
        $context->injectFn([$this, 'registerNavigationEntry']);
    }

    public function registerNavigationEntry(INavigationManager $navigationManager): void {
        $navigationManager->add([
            'id' => 'tooltracker',
            'order' => 10,
            'href' => $this->getContainer()->getServer()->getURLGenerator()->linkToRoute('tooltracker.tool.index'),
            'icon' => $this->getContainer()->getServer()->getURLGenerator()->imagePath('tooltracker', 'app.svg'),
            'name' => $this->getContainer()->getServer()->getL10N('tooltracker')->t('Tool Tracker'),
        ]);
    }
	
	public function register(IRegistrationContext $context): void {
		// Ici, vous pouvez enregistrer des services, des écouteurs d'événements, etc.
		// Si vous n'avez rien à enregistrer, laissez cette méthode vide.
	}
}