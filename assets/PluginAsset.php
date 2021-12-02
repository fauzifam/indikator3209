<?php
namespace app\assets;

use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

    public $depends = [
        'hail812\adminlte3\assets\BaseAsset'
    ];

    public static $pluginMap = [
        'fontawesome' => [
            'css' => 'fontawesome-free/css/all.min.css'
        ],
        'icheck-bootstrap' => [
            'css' => ['icheck-bootstrap/icheck-bootstrap.css']
        ],
        'dataTable' => [
            'css' => [
                'datatables-bs4/css/dataTables.bootstrap4.min.css',
                'datatables-responsive/css/responsive.bootstrap4.min.css',
            ],
            'js' => [
                'datatables/jquery.dataTables.min.js',
                'datatables-bs4/js/dataTables.bootstrap4.min.js',
                'datatables-responsive/js/dataTables.responsive.min.js',
                'datatables-responsive/js/responsive.bootstrap4.min.js',
            ]
        ],
        'chartJs' => [
            'css' => ['chart.js/Chart.min.css'],
            'js' => ['chart.js/Chart.min.js']
        ],
        'sweetAlert' => [
            'css' => ['sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'],
            'js' => ['sweetalert2/sweetalert2.min.js']
        ],
        'select2' => [
            'css' => ['select2/css/select2.min.css', 'select2-bootstrap4-theme/select2-bootstrap4.min.css'],
            'js' => ['select2/js/select2.full.min.js'],
        ],
        'bs-stepper' => [
            'css' => ['bs-stepper/css/bs-stepper.min.css'],
            'js' => ['bs-stepper/js/bs-stepper.min.js']
        ],
        'toastr' => [
            'css' => ['toastr/toastr.min.css'],
            'js' => ['toastr/toastr.min.js'],
        ],
        'dataTable-select' => [
            'css' => ['datatables-select/css/select.bootstrap4.min.css'],
            'js' => ['datatables-select/js/select.bootstrap4/min.js', 'dataTables.select.min.js'],
        ],
    ];

    /**
     * add a plugin dynamically
     * @param $pluginName
     * @return $this
     */
    public function add($pluginName)
    {
        $pluginName = (array) $pluginName;

        foreach ($pluginName as $name) {
            $plugin = $this->getPluginConfig($name);
            if (isset($plugin['css'])) {
                foreach ((array) $plugin['css'] as $v) {
                    $this->css[] = $v;
                }
            }
            if (isset($plugin['js'])) {
                foreach ((array) $plugin['js'] as $v) {
                    $this->js[] = $v;
                }
            }
        }

        return $this;
    }

    /**
     * @param $name plugin name
     * @return array|null
     */
    private function getPluginConfig($name)
    {
        return self::$pluginMap[$name] ?? \Yii::$app->params['hail812/yii2-adminlte3']['pluginMap'][$name] ?? null;
    }
}