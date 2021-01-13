<?php

namespace Modules\Quiz\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Quiz\Http\Service\OptionService;

class OptionController extends Controller
{
    /**
     * @var OptionService
     */
    private $optionService;

    public function __construct(
        OptionService $optionService
    )
    {
        $this->optionService = $optionService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $option = $this->optionService->createOption($data);
        return back();
    }

    public function update(Request $request, $id)
    {
        $data =$request->all();
        $this->optionService->updateOption($data,$id);
        return back();
    }

    public function destroy($id)
    {
        //
    }
}
