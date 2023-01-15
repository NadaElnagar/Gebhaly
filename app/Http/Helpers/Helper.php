<?php
if (!function_exists('responseWithSuccess')) {
    function responseWithSuccess($data)
    {
        $status = \Illuminate\Http\Response::HTTP_OK;
        $success['status'] = true;
        if ($data != null) $success['data'] = $data;
        return response()->json($success, $status);
    }
}

if (!function_exists('responseWithFailure')) {
    function responseWithFailure( $message,$status=null)
    {
        $fail['status'] = false;
        $status = !empty($status)? $status : 500;
        if ($message != null) $fail['message'] = $message;
        return response()->json($fail, $status);
    }
}
