<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreCourseRequest;
use Domain\Training\Http\Requests\UpdateCourseRequest;
use Domain\Training\Services\CourseChapterService;
use Domain\Training\Services\CourseService;
use Domain\Training\Services\GroupingService;
use Domain\Training\Services\LanguageService;
use Domain\Training\Services\LevelService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CourseController extends Controller
{
    /**
     * @var \Domain\Training\Services\CourseService
     */
    protected $courseService;

    /**
     * @var \Domain\Training\Services\LanguageService
     */
    protected $languageService;

    /**
     * @var \Domain\Training\Services\LevelService
     */
    protected $levelService;

    /**
     * @var \Domain\Training\Services\GroupingService
     */
    protected $groupingService;

    /**
     * @var \Domain\Training\Services\CourseChapterService
     */
    protected $courseChapterService;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\CourseService $courseService
     */
    public function __construct(CourseService $courseService, LanguageService $languageService,
                                LevelService $levelService, GroupingService $groupService, 
                                CourseChapterService $courseChapterService)
    {
        $this ->courseService = $courseService;
        $this ->languageService = $languageService;
        $this ->levelService = $levelService;
        $this ->groupingService = $groupService;
        $this ->courseChapterService = $courseChapterService;
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $response = $this ->courseService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, [
                                'id', '_id', 'title', 'slug', 'fee', 
                                'language_id', 'level_id', 'grouping_id'
                            ], [
                                'image' =>function ($query) {
                                    $query ->select('filename', 'url_sm', 'imageable_id', 'imageable_type');
                                },

                                'language' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },

                                'level' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },

                                'grouping' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },
                            ]);

        return view('admin::course.index', ['courses' =>$response['data']]);
    }

    /**
     * Display a listing of the deleted resource.
     * @return Renderable
     */
    public function deleted()
    {
        $response = $this ->courseService 
                            ->fromRepo()
                            ->getOnlyTrashedRecords(false, false, null, [
                                'id', '_id', 'title', 'slug', 'fee', 
                                'language_id', 'level_id', 'grouping_id'
                            ], [
                                'image' =>function ($query) {
                                    $query ->select('filename', 'url_sm', 'imageable_id', 'imageable_type');
                                },

                                'language' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },

                                'level' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },

                                'grouping' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                                },
                            ]);

        return view('admin::course.deleted', ['courses' =>$response['data']]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $languages = $this ->languageService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);
        
        $levels = $this ->levelService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);

        $groupings = $this ->groupingService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);

        return view('admin::course.create', [
            'languages' => $languages['data'],
            'levels'    => $levels['data'],
            'groupings' => $groupings['data'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreCourseRequest $request)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.courses.index');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $response = $this ->courseService ->getById($id, false, [
                        'id', '_id', 'title', 'slug', 'short_description', 'description',
                        'language_id', 'level_id', 'grouping_id'
                    ], [
                        'image' =>function ($query) {
                            $query ->select('filename', 'url_lg', 'imageable_id', 'imageable_type');
                        },

                        'language' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },

                        'level' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },

                        'grouping' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },
                    ]);

        $chapters = $this->courseChapterService
                        ->getRecordsByFieldValue('course_id', $response['data'] ->id, false, [
                            'id', '_id', 'title', 'slug', 'course_id', 'level_id'
                        ], [
                            'course' => function ($query) {
                                    $query ->select('id', '_id', 'title');
                            },

                            'level' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                            },
                        ]);

        return view('admin::course.show', [
            'course' => $response['data'],
            'chapters' =>$chapters['data']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $languages = $this ->languageService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);
        
        $levels = $this ->levelService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);

        $groupings = $this ->groupingService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);
                            
        $response = $this ->courseService ->getById($id, false, [
                        'id', '_id', 'title', 'slug', 'short_description', 'description', 'fee',
                        'language_id', 'level_id', 'grouping_id'
                    ], [
                        'image' =>function ($query) {
                            $query ->select('filename', 'url_lg', 'imageable_id', 'imageable_type');
                        },
                        'language' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },

                        'level' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },

                        'grouping' => function ($query) {
                            $query ->select('id', '_id', 'name');
                        },
                    ]);

        return view('admin::course.edit', [
            'course'    => $response['data'],
            'languages' => $languages['data'],
            'levels'    => $levels['data'],
            'groupings' => $groupings['data'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.courses.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $response = $this ->courseService ->delete($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.courses.deleted');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id)
    {
        $response = $this ->courseService ->restore($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.courses.index');
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id)
    {
        $response = $this ->courseService ->destroy($id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.courses.deleted');
    }
}
