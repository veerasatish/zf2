<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ArtistController extends AbstractActionController {
    protected $artisttable;
    public function indexAction() {
        
        
         return new ViewModel(array(
            'artist' => $this->getArtistTable()->fetchAll(),
        ));
    }
    public function addAction() {
        echo "beverse";
        exit;
    }
    public function editAction() {
        
    }
    public function deleteAction() {
        
    }
    public function getArtistTable()
    {
        if (!$this->artisttable) {
            $sm = $this->getServiceLocator();
            $this->artisttable = $sm->get('Album\Model\ArtistTable');
        }
        return $this->artisttable;
    }
}

