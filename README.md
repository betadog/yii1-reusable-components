# yii1-reusable-components

## MiniTrace

This behavior allow u get trace in any point of code: `echo Yii::app()->miniTrace();` 

Just add follow code into `./protected/config/main.php`

```
'behaviors'         => [
    'miniTrace' => [
        'class' => 'application.components.behaviors.MiniTrace',
    ],
],
```


