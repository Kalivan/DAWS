<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property string $Codigo_usuario
 * @property string $Nombre_usuario
 * @property string $Contraseña
 * @property integer $Telefono_usuario
 * @property string $Email_usuario
 * @property string $Direccion
 *
 * @property Eventos[] $eventos
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre_usuario', 'Contraseña', 'Email_usuario'], 'required'],
            [['Telefono_usuario'], 'integer'],
            [['Nombre_usuario', 'Contraseña'], 'string', 'max' => 45],
            [['Email_usuario'], 'string', 'max' => 63],
            [['Direccion'], 'string', 'max' => 127]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Codigo_usuario' => 'Codigo Usuario',
            'Nombre_usuario' => 'Nombre Usuario',
            'Contraseña' => 'Contraseña',
            'Telefono_usuario' => 'Telefono Usuario',
            'Email_usuario' => 'Email Usuario',
            'Direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventos()
    {
        return $this->hasMany(Eventos::className(), ['Cod_usuario' => 'Codigo_usuario']);
    }
}
