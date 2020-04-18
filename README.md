# yii1-reusable-components

## MiniTrace.php

This behavior allow u get trace in any point of code: `echo Yii::app()->miniTrace();` 

Just add follow code into `./protected/config/main.php`

```
'behaviors'         => [
    'miniTrace' => [
        'class' => 'application.components.behaviors.MiniTraceBehavior',
    ],
],
```


## OrderingValue.php

Class allow u to automatic set value for ordering column for new elements. U need add behavior 
to your CActiveRecord model and define some params:

```
public function behaviors()
{
    return [
        'orderingAttribute' => [
            'class'      => 'application.components.behaviors.OrderingValueBehavior',
            'columnName' => 'ordering',                 // order column name
            'position'   => OrderingValue::POSITION_END // position for new element
        ],
    ];
}
``` 

## 