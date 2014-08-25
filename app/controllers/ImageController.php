<?php

class ImageController extends BaseController {

    public function getUploadForm() {
        return View::make('image/upload-form');
    }

    public function postUpload() {
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = Validator::make($input, $rules);
        if ( $validator->fails() )
        {
            return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

        }
        else {
            $destinationPath = 'uploads/';
            $filename = $file->getClientOriginalName();
            Input::file('image')->move($destinationPath, $filename);
            return Response::json(['success' => true, 'file' => asset($destinationPath.$filename)]);
        }

    }
}