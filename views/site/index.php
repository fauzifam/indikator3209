<?php
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = 'Beranda';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php 
                        echo Highcharts::widget([
                            // 'scripts' => [
                            //     'modules/exporting',
                            //     'themes/grid-light',
                            // ],
                            'options' => [
                                'title' => [
                                    'text' => 'Combination chart',
                                ],
                                'xAxis' => [
                                    'categories' => ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'],
                                ],
                                'labels' => [
                                    'items' => [
                                        [
                                            'html' => 'Total fruit consumption',
                                            'style' => [
                                                'left' => '50px',
                                                'top' => '18px',
                                                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                            ],
                                        ],
                                    ],
                                ],
                                'series' => [
                                    [
                                        'type' => 'spline',
                                        'name' => 'Average',
                                        'data' => [3, 2.67, 3, 6.33, 3.33],
                                        'marker' => [
                                            'lineWidth' => 2,
                                            'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                                            'fillColor' => 'white',
                                        ],
                                    ],
                                ],
                            ]
                        ]);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php 
                    echo \miloschuman\highcharts\Highcharts::widget([
                        'options' => [
                            'title' => ['text' => 'Fruit Consumption'],
                            'xAxis' => [
                                'categories' => ['Apples', 'Bananas', 'Oranges']
                            ],
                            'yAxis' => [
                                'title' => ['text' => 'Fruit eaten']
                            ],
                            'series' => [
                                ['name' => 'Jane', 'data' => [1, 0, 4]],
                                ['name' => 'John', 'data' => [5, 7, 3]]
                            ]
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>