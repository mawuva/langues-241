<?php

namespace App\Http\Controllers;

use Domain\Training\Models\Enrollment;
use Domain\Training\Services\CourseChapterService;
use Domain\Training\Services\CourseService;
use Domain\Training\Services\GroupingService;
use Domain\Training\Services\LanguageService;
use Domain\Training\Services\LevelService;
use Illuminate\Http\Request;

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
     * Index
     *
     * @return void
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

        return view('course.index', ['courses' =>$response['data']]);
    }

    /**
     * Category view
     *
     * @return void
     */
    public function category($category_id)
    {
        $courses = $this->courseService
                        ->getRecordsByFieldValue('category_id', $category_id, false, [
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

        return view('course.category', ['courses' =>$courses['data']]);
    }

    /**
     * Category view
     *
     * @return void
     */
    public function level($level_id)
    {
        $levels = $this->courseService
                        ->getRecordsByFieldValue('level_id', $level_id, false, [
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

        return view('course.category', ['courses' =>$levels['data']]);
    }

    /**
     * Category view
     *
     * @return void
     */
    public function language($language_id)
    {
        $levels = $this->courseService
                        ->getRecordsByFieldValue('language_id', $language_id, false, [
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

        return view('course.language', ['courses' =>$levels['data']]);
    }

    /**
     * Category view
     *
     * @return void
     */
    public function show($id)
    {
        $response = $this ->courseService ->getById($id, false, [
                        'id', '_id', 'title', 'slug', 'fee', 'short_description', 'description',
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

        return view('course.show', [
            'course' => $response['data'],
            'chapters' =>$chapters['data']
        ]);
    }

    public function enroll($id)
    {
        Enrollment::create([
            'course_id' => $id,
            'user_id' => auth() ->user() ->id
        ]);

        return redirect() ->route('app.user.dashboard');
    }

    public function info()
    {
        dd(file_get_contents('php://input'));
    }
}
