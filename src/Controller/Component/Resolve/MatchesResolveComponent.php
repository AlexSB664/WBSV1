<?php
namespace App\Controller\Component\Resolve;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * BattlesResolver component
 */
class MatchesResolveComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function battles($controller){
        $arr = json_decode(base64_decode($controller->request->getData('data')));
        foreach($arr as $battle){
            echo $battle->winner;
        }
        dd($arr);
    }
}
