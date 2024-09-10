<?php
namespace Agriconecta\Trainee\Controller\Save;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Request\Http;
use Agriconecta\Trainee\Model\TraineeFactory; 
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\Result\Redirect;


class Save extends Action
{
    protected $traineeFactory;
    protected $request;
    protected $resultFactory;
    protected $messageManager;

    public function __construct(
        Context $context,
        TraineeFactory $traineeFactory, 
        Http $request,
        ResultFactory $resultFactory,
        ManagerInterface $messageManager
    ) {
        $this->traineeFactory = $traineeFactory;
        $this->request = $request;
        $this->resultFactory = $resultFactory;
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $dataForm = $this->request->getPostValue();

        if (!empty($dataForm)) {
            try {
                $traineeModel = $this->traineeFactory->create(); // Usa el factory para crear una instancia del modelo trainee
                $traineeModel->setData($dataForm);
                $traineeModel->save();

                $this->messageManager->addSuccessMessage(__('Datos Guardados Exitosamente')); // __ para manejar traducciones
            } catch (\Exception $exception) {
                $this->messageManager->addErrorMessage($exception->getMessage());
            }
        }

        /** @var Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('ejemplo/example');
        return $resultRedirect; 
    }
}
