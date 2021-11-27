<?php

namespace Domain\Training\Http\Requests;

use Domain\Training\DataTransferObjects\LevelDTO;
use Domain\Training\Services\LevelService;
use Illuminate\Validation\Rule;
use Mawuekom\RequestCustomizer\FormRequestCustomizer;
use Mawuekom\RequestSanitizer\Sanitizers\Capitalize;

class StoreLevelRequest extends FormRequestCustomizer
{
    /**
     * @var \Domain\Training\Services\levelService
     */
    protected $levelService;

    /**
     * Create new form request instance.
     *
     * @param \Domain\Training\Services\LevelService $levelService
     */
    public function __construct(LevelService $levelService)
    {
        parent::__construct();
        $this ->levelService = $levelService;
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
                'string', 'max:255', Rule::unique('levels', 'slug')
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
     * @return \Domain\Training\DataTransferObjects\LevelDTO
     */
    public function toDTO(): LevelDTO
    {
        return new LevelDTO([
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
        return $this ->levelService ->create($this ->toDTO());
    }
}
