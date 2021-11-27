<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\CourseChapterDTO;
use Domain\Training\Models\CourseChapter;
use Domain\Training\Services\CourseChapterService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class UpdateCourseChapterRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\CourseChapterService
     */
    protected $courseChapterService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\CourseChapterService $courseChapterService
     */
    public function __construct(CourseChapterService $courseChapterService)
    {
        parent::__construct();
        $this ->courseChapterService = $courseChapterService;
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
        $key = resolve_key_to_use(CourseChapter::class, $this ->route('chapter_id'));

        return [
            'title'         => 'required|string|max:255',
            'slug'          => [
                'string', 'max:255', Rule::unique('course_chapters', 'slug') ->ignore($this ->route('id'), $key)
            ],
            'description'   => 'string|nullable',
            'course'        => 'integer|nullable',
            'level'         => 'integer|nullable',
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
     * @return \Domain\Training\DataTransferObjects\CourseChapterDTO
     */
    public function toDTO(): CourseChapterDTO
    {
        return new CourseChapterDTO([
            'title'         => $this ->title,
            'slug'          => $this ->slug,
            'description'   => $this ->description,
            'course'        => $this ->course,
            'level'         => $this ->level,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->courseChapterService ->update($this ->toDTO(), $this ->route('chapter_id'));
    }
}
