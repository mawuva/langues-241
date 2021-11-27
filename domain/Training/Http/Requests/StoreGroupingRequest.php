<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\GroupingDTO;
use Domain\Training\Services\GroupingService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class StoreGroupingRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\GroupingService
     */
    protected $groupingService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\GroupingService $groupingService
     */
    public function __construct(GroupingService $groupingService)
    {
        parent::__construct();
        $this ->groupingService = $groupingService;
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
            'name'          => 'required|string|max:255',
            'slug'          => [
                'string', 'max:255', Rule::unique('groupings', 'slug')
            ],
            'description'   => 'string|nullable',
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
            'name' => [
                Capitalize::class,
            ]
        ];
    }

    /**
     * Build and return a DTO
     *
     * @return \Domain\Training\DataTransferObjects\GroupingDTO
     */
    public function toDTO(): GroupingDTO
    {
        return new GroupingDTO([
            'name'          => $this ->name,
            'slug'          => $this ->slug,
            'description'   => $this ->description,
        ]);
    }

    /**
     * Fulfill the update account type request
     *
     * @return array
     */
    public function fulfill(): array
    {
        return $this ->groupingService ->create($this ->toDTO());
    }
}
