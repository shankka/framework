<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'account', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 自动更新操作排除字段
     */
    public $autoUpdateHandleExcept = ['id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * 更新模型赋值操作
     */
    public function updateHandle(Request $request, $params = null)
    {
        $requestData = $request->all();
        $fields = $this->getFields($params);

        foreach ($requestData as $key => $value) {
            if (in_array($key, $fields)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * 获取模型所有的字段
     */
    public function getFields($params = null)
    {
        $fields = Schema::getColumnListing($this->getTable());
        $fields = array_flip($fields);

        if (isset($params['only'])) {
            $only = $params['only'];
            $fields = Arr::only($fields, $only);
        } else {
            $except = [];
            if (isset($params['except'])) $except = $params['except'];
            $except = array_merge($except, $this->autoUpdateHandleExcept);

            $fields = Arr::except($fields, $except);
        }

        $fields = array_flip($fields);
        $fields = array_values($fields);
        return $fields;
    }
}
