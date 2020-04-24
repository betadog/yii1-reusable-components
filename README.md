# yii1-reusable-components

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/badges/build.png?b=master)](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/build-status/master)
[![Build Status](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/badges/build.png?b=master)](https://scrutinizer-ci.com/g/betadog/yii1-reusable-components/build-status/master)

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