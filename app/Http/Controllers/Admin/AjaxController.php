<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class AjaxController extends Controller
{
    public function deleteImage(Request $request){
        $data = $request->all();

        $image = Image::where([['id','=',$data['imageId']],
            ['model_id','=',$data['editId']]
            ])->first();
        ImageSaver::deleteImage($image->path);
        $image->delete();

        return response('',200);
    }


    /**
     * @param Request $request
     *
     * @return array|\Illuminate\Http\RedirectResponse
     * Включить/выключить запись в переданной таблице
     */
    public function active(Request $request) {
        $data = [
            'status'  => 'error',
            'message' => 'Переданы не все нужные данные',
        ];
        if ( $request->has('table') AND $request->has('id') ) {
            $primary = $request->get('primary_key') ?? 'id';
            $table = $request->table;
            $id = $request->id;
            $record = DB::table($table)->where($primary, $id)->first();
            if ( isset($record->active) ) {
                $active = (int) ! $record->active;
                if ( Schema::hasTable($table) AND Schema::hasColumn($table, 'active') ) {
                    try {
                        DB::table($table)->where($primary, $id)->update([ 'active' => $active ]);
                        $data[ 'status' ] = 'success';
                        $data[ 'message' ] = 'Активность записи обновлена';
                    } catch ( \Exception $e ) {
                        $data[ 'message' ] = $e->getMessage();
                    }
                }
            }
        }

        return $data;
    }

    /**
     * @param Request $request
     *
     * @return array
     * Сортировка фотографий по переданным таблице и id записи
     */
    public
    function sort(
        Request $request
    ) {
        $data = [
            'status'  => 'error',
            'message' => 'Переданы не все нужные данные',
        ];
        $table = $request->table;
        $sort = json_decode($request->sort);
        $primary = $request->get('primary_key') ?? 'id';
        if ( $table AND $sort ) {
            try {

                if ( Schema::hasTable($table) AND Schema::hasColumn($table, 'sort') ) {
                    foreach( $sort as $sort => $id ) {
                        \DB::table($table)->where($primary, $id)->update([ 'sort' => $sort ]);
                    }
                    $data[ 'status' ] = 'success';
                    $data[ 'message' ] = 'Порядок сортировки успешно обновлен';
                }
            } catch ( \Exception $e ) {
                $data[ 'message' ] = $e->getMessage();
            }
        }

        return $data;
    }
    public function group(Request $request)
    {
        $data = [
            'status'  => 'error',
            'message' => 'Переданы не все нужные данные',
        ];

        $childTable = $request->get('childTable');
        $parentTable = $request->get('parentTable');
        $parentId = $request->has('parentId')?$request->get('parentId'):null;
        $dataId = is_array($request->get('dataId'))?$request->get('dataId'):[];

        if ( $childTable AND $parentTable) {
            try {

                if ( Schema::hasTable($childTable) AND Schema::hasTable($parentTable) ) {
                    foreach( $dataId as $id ) {
                        \DB::table($childTable)->where('id', $id)->update([ 'poster_group_id' => $parentId ]);
                    }
                    $data[ 'status' ] = 'success';
                    $data[ 'message' ] = 'Тур успешно изменен!';
                }
            } catch ( \Exception $e ) {
                $data[ 'message' ] = $e->getMessage();
            }
        }

        return $data;

    }
}
