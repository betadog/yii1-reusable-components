# yii1-reusable-components

## MiniTrace.php

This behavior allow u get trace in any point of code: `echo Yii::app()->miniTrace();` 

Just add follow code into `./protected/config/main.php`

```
'behaviors'         => [
    'miniTrace' => [
        'class' => 'application.components.behaviors.MiniTrace',
    ],
],
```


## OrderingValue.php

Class allow u to automatic set value for ordering column for new elements. U need add behavior and set some params:

```
public function behaviors()
{
    return [
        'orderingAttribute' => [
            'class'      => 'application.components.behaviors.OrderingValue',
            'columnName' => 'ordering',                 // older column name
            'position'   => OrderingValue::POSITION_END // position for new element
        ],
    ];
}
``` 

## 