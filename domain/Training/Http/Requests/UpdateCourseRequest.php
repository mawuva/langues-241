<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\CourseDTO;
use Domain\Training\Models\Course;
use Domain\Training\Services\CourseService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class UpdateCourseRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\CourseService
     */
    protected $courseService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        parent::__construct();
        $this ->courseService = $courseService;
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
        $key = resolve_key_to_use(Course::class, $this ->route('id'));

        return [
            'title'             => 'required|string|max:255',
            'slug'              => [
                'string', 'max:255', Rule::unique('courses', 'slug') ->ignore($this ->route('id'), $key)
            ],
            'short_description' => 'string|nullable|max:255',
            'description'       => 'string|nullable',
            'fee'               => 'string|nullable',
            'is_free'           => 'string|nullable',
            'language'          => 'integer|nullable',
            'level'             => 'integer|nullable',
            'category'          => 'integer|nullable',
            'image'             => 'nullable|mimes:png,jpg,jpeg|max:2048'
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
     * @return \Domain\Training\DataTransferObjects\CourseDTO
     */
    public function toDTO(): CourseDTO
    {
        return new CourseDTO([
            'title'             => $this ->title,
            'slug'              => $this ->slug,
            'short_description' => $this ->short_description,
            'description'       => $this ->description,
            'fee'               => $this ->fee,
            'is_free'           => $this ->is_free,
            'language'          => $this ->language,
            'level'             => $this ->level,
            'grouping'          => $this ->category,
            'image'             => $this ->image,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->courseService ->update($this ->toDTO(), $this ->route('id'));
    }
}
