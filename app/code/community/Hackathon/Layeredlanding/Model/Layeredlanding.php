<?php
 
class Hackathon_Layeredlanding_Model_Layeredlanding extends Mage_Core_Model_Abstract
{
	
    public function _construct()
    {
        parent::_construct();
        $this->_init('layeredlanding/layeredlanding');
    }
	
	public function getAttributes()
	{
		return Mage::getModel('layeredlanding/attributes')->getCollection()
					->addFieldToFilter('layeredlanding_id', $this->getId());
	}

    public function loadByUrl($url)
    {
        $collection = $this->getCollection()
            ->addFieldToFilter('page_url', array('eq' => $url));

        if ($collection->getSize()) {
            $this->load($collection->getFirstItem()->getId());
        }

        return $this;
    }
}