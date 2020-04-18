<?php

/**
 * Класс для автоматического отслеживания и порядка сортировки элементов
 *
 * TIP: отслежтваемую колонку не надо добавлять в rules()
 *
 * Usage:
 *
<pre>
public function behaviors()
{
    return [
        'orderingAttribute' => [
            'class'      => 'application.components.behaviors.OrderingValue',
            // колонка по которой осуществляется сортировка
            'columnName' => 'ordering',
            // на какое место ставится новый элемент
            'position'   => OrderingValue::POSITION_END
        ],
    ];
}
</pre>
 */
class OrderingValue extends CActiveRecordBehavior
{
    const POSITION_START = 0;
    const POSITION_END   = 1;

    /** @var string */
    public $columnName;

    /** @var int */
    public $position = self::POSITION_START;

    public function attach($owner)
    {
        $validator = CValidator::createValidator('numerical', $owner, $this->columnName, [
            'integerOnly' => true,
            'allowEmpty'  => false,
        ]);
        $owner->validatorList->add($validator);

        parent::attach($owner);
    }

    public function beforeValidate($event)
    {
        /** @var CActiveRecord $owner */
        $owner = $this->getOwner();

        if ($owner->getIsNewRecord()) {
            $fieldName = Yii::app()->db->quoteColumnName($this->columnName);
            $position  = Yii::app()->db->createCommand()
                ->select("MAX($fieldName)")
                ->from($owner->tableName())
                ->queryScalar();

            $owner->{$this->columnName} = $position + 1;
        }
    }

    public function afterSave($event)
    {
        /** @var CActiveRecord $owner */
        $owner = $this->getOwner();

        /**
         * POSITION_END set in validator
         */
        if ($owner->getIsNewRecord() && self::POSITION_START == $this->position) {
            $fieldName   = Yii::app()->db->quoteColumnName($this->columnName);
            $minPosition = Yii::app()->db->createCommand()
                ->select("MIN($fieldName)")
                ->from($owner->tableName())
                ->queryScalar();
            Yii::app()->db->createCommand()->update($owner->tableName(), [$this->columnName => new CDbExpression("{$fieldName} + 1")]);
            Yii::app()->db->createCommand()->update($owner->tableName(), [$this->columnName => $minPosition], 'id = :id', [':id' => $owner->id]);
        }
    }
}