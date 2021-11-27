<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\FeedbackDTO;
use Domain\Training\Services\FeedbackService;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;

class UpdateFeedbackRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\FeedbackService
     */
    protected $feedbackService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\FeedbackService $feedbackService
     */
    public function __construct(FeedbackService $feedbackService)
    {
        parent::__construct();
        $this ->feedbackService = $feedbackService;
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
     * @return \Domain\Training\DataTransferObjects\FeedbackDTO
     */
    public function toDTO(): FeedbackDTO
    {
        return new FeedbackDTO([
            'rating_score'  => $this ->rating_score,
            'feedback_text' => $this ->feedback_text,
            'user'          => $this ->user,
            'enrollment'    => $this ->enrollment,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->feedbackService ->update($this ->toDTO(), $this ->route('id'));
    }
}
