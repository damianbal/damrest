<?php

namespace damrest\Core;

use damrest\Core\Http\Request;
use damianbal\DamValidator\Validator;


class Utils
{
    /**
     * Transform array of objects to an associative array
     *
     * @param [mixed] $objs
     * @param [array] $fields
     * @return void
     */
    public static function transform( $objs, $fields ) {
        
        $data = [];

        foreach($objs as  $obj) {
            $obj_data = [];

            foreach($fields as $f) {
                $obj_data[$f] = $obj->{$f};
            }

            $data[] = $obj_data;
        }

        return $data;
    }

    /**
     * Validate request
     *
     * @param Validator $validator
     * @param Request $request
     * @param array $rules
     * @return boolean
     */
    public static function validateRequest( Validator $validator, Request $request, $rules ) : bool
    {
        return $validator->validate($request->getInputs(), $rules);
    }
 }