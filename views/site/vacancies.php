<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = 'Vacancies';
?>


<div class="site-vacancies">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Currently there are couple positions available in our company:
    </p>
    <div>
        <ul>
            <?php foreach ($arrayInView as $item): ?>
                <li>
                    <?php
                    Modal::begin([
                        'header' => Html::encode($item->name),
                        'toggleButton' => [
                            'label' => Html::encode($item->name),
                            //'tag' =>
                            'class' => 'btn-link',
                        ],
                        'footer' => Html::a('Apply Now!', ["site/apply/$item->id"], ['class' => 'btn btn-primary']),
                    ]);

                    echo $item->description;
                    echo "<br/>\n";
                    echo "<br/>\n";
                    echo 'This vacancy is active since: ' . Yii::$app->formatter->asDatetime($item->date);
                    Modal::end();
                    ?>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
