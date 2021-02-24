<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Result\Http\Service\MediaService;

class MediaController extends Controller
{
    /**
     * @var MediaService
     */
    private $mediaService;

    public function __construct(
        MediaService $mediaService
    )
    {
        $this->mediaService = $mediaService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['media_path'] = $this->mediaService->uploadMedia($request->file);
        unset($data['file']);
        $data['type'] = 'video';
        $media = $this->mediaService->createMedia($data);
        dd($media);
    }

    public function show($id)
    {
        return view('result::show');
    }

    public function edit($id)
    {
        return view('result::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
