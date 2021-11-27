<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\CourseChapterContentDTO;
use Domain\Training\Services\CourseChapterContentService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class StoreCourseChapterContentRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\CourseChapterContentService
     */
    protected $courseChapterContentService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\CourseChapterContentService $courseChapterContentService
     */
    public function __construct(CourseChapterContentService $courseChapterContentService)
    {
        parent::__construct();
        $this ->courseChapterContentService = $courseChapterContentService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'             => 'required|string|max:255',
            'slug'              => [
                'string', 'max:255', Rule::unique('course_chapter_contents', 'slug')
            ],
            'description'       => 'string|nullable',
            'is_mandatory'      => 'string|nullable',
            'is_open_for_free'  => 'string|nullable',
            'course'            => 'integer|nullable',
            'level'             => 'integer|nullable',
            'file'              => 'nullable|mimes:png,jpg,jpeg,pdf,doc,docx,mp4,mp3|max:2048'
        ];
    }

    /**
     * Get sanitizers defined for form input
     *
     * @return array
     */
    public function sanitizers(): array
    {
        return [
            'title' => [
                Capitalize::class,
            ]
        ];
    }

    /**
     * Build and return a DTO
     *
     * @return \Domain\Training\DataTransferObjects\CourseChapterContentDTO
     */
    public function toDTO(): CourseChapterContentDTO
    {
        return new CourseChapterContentDTO([
            'title'             => $this ->title,
            'slug'              => $this ->slug,
            'description'       => $this ->description,
            'is_mandatory'      => $this ->is_mandatory,
            'is_open_for_free'  => $this ->is_open_for_free,
            'course_chapter'    => $this ->course_chapter,
            'content_type'      => $this ->content_type,
            'file'              => $this ->file,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->courseChapterContentService ->create($this ->toDTO());
    }
}
