<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\LearningProgressDTO;
use Domain\Training\Services\LearningProgressService;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;

class UpdateLearningProgressRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\LearningProgressService
     */
    protected $learningProgressService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\LearningProgressService $learningProgressService
     */
    public function __construct(LearningProgressService $learningProgressService)
    {
        parent::__construct();
        $this ->learningProgressService = $learningProgressService;
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
            'status'                    => 'nullable|string',
            'course_chapter_content'    => 'nullable|integer',
            'enrollment'                => 'nullable|integer',
        ];
    }

    /**
     * Get sanitizers defined for form input
     *
     * @return array
     */
    public function sanitizers(): array
    {
        return [];
    }

    /**
     * Build and return a DTO
     *
     * @return \Domain\Training\DataTransferObjects\LearningProgressDTO
     */
    public function toDTO(): LearningProgressDTO
    {
        return new LearningProgressDTO([
            'status'                    => $this ->status,
            'course_chapter_content'    => $this ->course_chapter_content,
            'enrollment'                => $this ->enrollment,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->learningProgressService ->update($this ->toDTO(), $this ->route('id'));
    }
}
