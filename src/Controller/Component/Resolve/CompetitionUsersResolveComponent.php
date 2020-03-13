<?php

namespace App\Controller\Component\Resolve;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Routing\Router;

/**
 * CompetitionUsersResolve component
 */
class CompetitionUsersResolveComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function resolveLazyAdd($controller)
    {
        $data = $controller->request->getData();
        if (empty($data['users_id'])) {
            $controller->Flash->error('No hay usuarios que suscribir a la competencia intenta de nuevo.');
            return $controller->redirect($controller->referer());
        }
        foreach ($data['users_id'] as $index => $value) {
            $dataTmp = [];
            $dataTmp['competitions_id'] = $data['competitions_id'];
            $dataTmp['users_id'] = $value;
            $dataTmp['assistance'] = $data['assistance'];
            $competitionsTmp = $controller->CompetitionsUsers->newEntity();
            $competitionsTmp = $controller->CompetitionsUsers->patchEntity($competitionsTmp, $dataTmp);
            if ($controller->CompetitionsUsers->save($competitionsTmp)) {
                if ($index === array_key_last($data['users_id'])) {
                    $controller->Flash->success(__('The competitions user has been saved.'));
                    return $controller->redirect(Router::url($controller->getLastUrl(), true));
                }
            }
            if ($index === array_key_last($data['users_id'])) {
                $controller->Flash->error(__('The competitions user could not be saved. Please, try again.'));
                return $controller->redirect(Router::url($controller->getLastUrl(), true));
            }
        }
    }
}
