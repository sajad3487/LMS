<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Result\Http\Service\MediaService;
use Modules\Result\Http\Service\ResultService;

class MediaController extends Controller
{
    /**
     * @var MediaService
     */
    private $mediaService;
    /**
     * @var ResultService
     */
    private $resultService;

    public function __construct(
        MediaService $mediaService,
        ResultService $resultService
    )
    {
        $this->mediaService = $mediaService;
        $this->resultService = $resultService;
    }

    public function store(Request $request,$segment_id)
    {
        $data = $request->all();
        $data['media_path'] = $this->mediaService->uploadMedia($request->file);
        unset($data['file']);
        $data['type'] = 'video';
        $media = $this->mediaService->createMedia($data);
        $segment = $this->resultService->getSegment($segment_id);
        $segment->media()->attach($media->id);
        return back();
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

    public function destroy(Request $request,$segment_id)
    {
        $segment = $this->resultService->getSegment($segment_id);
        $segment->media()->detach($request->media_id);
        return back();
    }
}
