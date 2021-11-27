<?php

namespace App\Http\Controllers;

use Domain\Training\Services\CourseService;
use Domain\Training\Services\LanguageService;

class PagesController extends Controller
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
     * Create new controller instance
     *
     * @param \Domain\Training\Services\CourseService $courseService
     */
    public function __construct(CourseService $courseService, LanguageService $languageService)
    {
        $this ->courseService = $courseService;
        $this ->languageService = $languageService;
    }

    /**
     * Home page
     *
     * @return void
     */
    public function home()
    {
        $response = $this ->courseService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, [
                                'id', '_id', 'title', 'slug', 'fee', 
                                'language_id', 'level_id', 'grouping_id'
                            ], [
                                'image' =>function ($query) {
                                    $query ->select('filename', 'url', 'url_md', 'url_lg', 'imageable_id', 'imageable_type');
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

        $languages = $this ->languageService 
                            ->fromRepo()
                            ->getRecordsWithoutTrashed(false, false, null, ['id', 'name']);

        return view('home', [
            'courses' =>$response['data'],
            'languages' =>$languages['data'],
        ]);
    }

    /**
     * About page
     *
     * @return void
     */
    public function about()
    {
        return view('about');
    }
}
