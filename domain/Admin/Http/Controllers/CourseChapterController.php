<?php

namespace Domain\Admin\Http\Controllers;

use Domain\Training\Http\Requests\StoreCourseChapterRequest;
use Domain\Training\Http\Requests\UpdateCourseChapterRequest;
use Domain\Training\Services\CourseChapterService;
use Domain\Training\Services\CourseService;
use Domain\Training\Services\LevelService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class CourseChapterController extends Controller
{
    /**
     * @var \Domain\Training\Services\CourseService
     */
    protected $courseService;

    /**
     * @var \Domain\Training\Services\CourseChapterService
     */
    protected $courseChapterService;

    /**
     * @var \Domain\Training\Services\LevelService
     */
    protected $levelService;

    /**
     * @var array
     */
    protected $course;

    /**
     * Create new controller instance
     *
     * @param \Domain\Training\Services\CourseService $courseService
     */
    public function __construct(CourseService $courseService, CourseChapterService $courseChapterService,
                                LevelService $levelService, Request $request)
    {
        $this ->courseService = $courseService;
        $this ->courseChapterService = $courseChapterService;
        $this ->levelService = $levelService;

        $id = $request->id;

        $this ->course = $this ->courseService ->getById($id, false, [
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
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $chapters = $this->courseChapterService
                        ->getRecordsByFieldValue('course_id', $this ->course['data'] ->id, false, [
                            'id', '_id', 'title', 'slug', 'course_id', 'level_id'
                        ], [
                            'course' => function ($query) {
                                    $query ->select('id', '_id', 'title');
                            },

                            'level' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                            },
                        ]);

        return view('admin::course-chapter.index', [
            'course' => $this ->course['data'],
            'chapters' =>$chapters['data']
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function deleted()
    {
        $chapters = $this->courseChapterService
                        ->getTrashedRecordsByFieldValue('course_id', $this ->course['data'] ->id, [
                            'id', '_id', 'title', 'slug', 'course_id', 'level_id'
                        ], [
                            'course' => function ($query) {
                                    $query ->select('id', '_id', 'title');
                            },

                            'level' => function ($query) {
                                    $query ->select('id', '_id', 'name');
                            },
                        ]);

        return view('admin::course-chapter.deleted', [
            'course' => $this ->course['data'],
            'chapters' =>$chapters['data']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $levels = $this ->levelService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);

        return view('admin::course-chapter.create', [
            'course' => $this ->course['data'],
            'levels' => $levels['data'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreCourseChapterRequest $request, $id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.course-chapters.index', ['id' => $id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id, $chapter_id)
    {
        $response = $this ->courseChapterService ->getById($chapter_id, false, [
                        'id', '_id', 'title', 'slug', 'description',
                        'course_id', 'level_id'
                    ], [
                        'level' =>function ($query) {
                            $query ->select('id', '_id', 'name', 'slug', 'description');
                        }
                    ]);

        return view('admin::course-chapter.show', [
            'course'    => $this ->course['data'],
            'chapter'   => $response['data']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, $chapter_id)
    {
        $levels = $this ->levelService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);
        
        $response = $this ->courseChapterService ->getById($chapter_id, false, [
                        'id', '_id', 'title', 'slug', 'description',
                        'course_id', 'level_id'
                    ], [
                        'level' =>function ($query) {
                            $query ->select('id', '_id', 'name', 'slug', 'description');
                        }
                    ]);

        return view('admin::course-chapter.edit', [
            'course' => $this ->course['data'],
            'levels' => $levels['data'],
            'chapter'   => $response['data']
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCourseChapterRequest $request, $id, $chapter_id)
    {
        $response = $request ->fulfill();

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.course-chapters.edit', [
            'id' => $id, 'chapter_id' => $chapter_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id, $chapter_id)
    {
        $response = $this ->courseChapterService ->delete($chapter_id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.course-chapters.deleted', [
            'id' => $id, 'chapter_id' => $chapter_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function restore($id, $chapter_id)
    {
        $response = $this ->courseChapterService ->restore($chapter_id);

        notiflash_toast($response['status'], $response['message']);

        return redirect()->route('app.admin.course-chapters.index', [
            'id' => $id, 'chapter_id' => $chapter_id
        ]);
    }

    /**
     * Remove defenitly the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function remove($id, $chapter_id)
    {
        $response = $this ->courseChapterService ->destroy($chapter_id);

        notiflash_toast($response['status'], $response['message']);

        return redirect() ->route('app.admin.course-chapters.deleted', [
            'id' => $id, 'chapter_id' => $chapter_id
        ]);
    }
}
