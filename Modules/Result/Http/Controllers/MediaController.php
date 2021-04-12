<?php

namespace Modules\Result\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Result\Http\Requests\MediaDeleteRequest;
use Modules\Result\Http\Requests\MediaRequest;
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

    public function store(MediaRequest $request,$segment_id)
    {
        $data = $request->all();
//        $data['media_path'] = $this->mediaService->uploadMedia($request->file);
//        unset($data['file']);
        $data['type'] = 'video';
        $media = $this->mediaService->createMedia($data);
        $segment = $this->resultService->getSegment($segment_id);
        $segment->media()->attach($media->id);
        return back();
    }

    public function destroy(MediaDeleteRequest $request,$segment_id)
    {
        $segment = $this->resultService->getSegment($segment_id);
        $segment->media()->detach($request->media_id);
        return back();
    }
}
