<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\EnrollmentDTO;
use Domain\Training\Services\EnrollmentService;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;

class UpdateEnrollmentRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\EnrollmentService
     */
    protected $enrollmentService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\EnrollmentService $enrollmentService
     */
    public function __construct(EnrollmentService $enrollmentService)
    {
        parent::__construct();
        $this ->enrollmentService = $enrollmentService;
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
            'is_paid'   => 'nullable|string',
            'user'      => 'nullable|integer',
            'course'    => 'nullable|integer',
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
     * @return \Domain\Training\DataTransferObjects\EnrollmentDTO
     */
    public function toDTO(): EnrollmentDTO
    {
        return new EnrollmentDTO([
            'is_paid'   => $this ->is_paid,
            'user'      => $this ->user,
            'course'    => $this ->course,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->enrollmentService ->update($this ->toDTO(), $this ->route('id'));
    }
}
