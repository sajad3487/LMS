<?php


namespace Modules\Result\Http\Service;


use Modules\Result\Repository\MediaRepository;

class MediaService
{
    /**
     * @var MediaRepository
     */
    private $mediaRepository;

    public function __construct(
        MediaRepository $mediaRepository
    )
    {
        $this->mediaRepository = $mediaRepository;
    }

    public function uploadMedia ($file) {
        $destination = base_path() . '/public/media/video/';
        $filename = rand(1111111, 99999999);
        $newFileName = $filename . $file->getClientOriginalName();
        $file->move($destination, $newFileName);
        return '/media/video/' . $newFileName;
    }

    public function createMedia ($data){
        return $this->mediaRepository->create($data);
    }

}
