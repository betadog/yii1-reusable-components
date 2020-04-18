# yii1-reusable-components

This package provide some behaviors:

* `MiniTrace` - allow get minitrace anywere in application
* `OrderingValueBehavior` - allows automatically assign a value to ordering column
  
## MiniTrace.php

Allow writes `echo Yii::app()->miniTrace();`   
Just add follow code into `./protected/config/main.php`

```
'behaviors'         => [
    'miniTrace' => [
        'class' => 'application.components.behaviors.MiniTraceBehavior',
    ],
],
```


## OrderingValue.php

Class allow u to automatically set value for ordering column for new elements. Just add behavior 
to your `CActiveRecord` model and define column name:

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

## to be continued